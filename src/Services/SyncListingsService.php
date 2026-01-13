<?php declare(strict_types=1);

namespace Rat\eBaySDK\Services;

use DateTimeImmutable;
use DateTimeInterface;
use DateTimeZone;
use InvalidArgumentException;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\RateLimiter;
use Rat\eBaySDK\Abstracts\SyncListingsHandler;
use Rat\eBaySDK\API\TraditionalAPI\Listing\GetSellerList;
use Rat\eBaySDK\Client;
use Rat\eBaySDK\Context\SyncListingsContext;
use Rat\eBaySDK\Jobs\SyncListingsJob;
use Throwable;

class SyncListingsService
{
    /**
     *
     * @var DateTimeImmutable
     */
    private DateTimeImmutable $from;

    /**
     *
     * @var DateTimeImmutable
     */
    private DateTimeImmutable $to;

    /**
     *
     * @var int
     */
    private int $limit = 200;

    /**
     *
     * @var string
     */
    private string $interval = '+119 days 23 hours 59 minutes 59 seconds';

    /**
     *
     * @var string
     */
    private ?string $handler = null;

    /**
     *
     * @var int
     */
    private int $timeout = 180;

    /**
     *
     * @var bool
     */
    private bool $failOnTimeout = true;

    /**
     * Make a new instance.
     * @return self
     */
    static public function make(): self
    {
        /** @var self $self */
        $self = app(self::class);
        return $self;
    }

    /**
     * Create a new instance.
     * @param Client $client
     */
    public function __construct(
        private readonly Client $client,
    ) {
        $tz = new DateTimeZone('UTC');
        $year = intval(date('Y')) - 1;
        $this->from = new DateTimeImmutable("{$year}-01-01T00:00:00.000Z", $tz);
        $this->to = new DateTimeImmutable('now', $tz);
        $this->limit = 200;
    }

    /**
     *
     * @param string|DateTimeInterface $date
     * @return DateTimeImmutable
     */
    private function toUtcImmutable(string|\DateTimeInterface $date): DateTimeImmutable
    {
        $c = is_string($date)
            ? Carbon::parse($date, 'UTC')
            : Carbon::instance($date)->setTimezone('UTC');

        return DateTimeImmutable::createFromMutable($c->toDateTime());
    }

    /**
     *
     * @param int $seconds
     * @param bool $failOnTimeout
     * @return self
     */
    public function timeout(int $seconds, bool $failOnTimeout = false): self
    {
        $this->timeout = $seconds;
        $this->failOnTimeout = $failOnTimeout;
        return $this;
    }

    /**
     *
     * @param string|DateTimeInterface $date
     * @return self
     */
    public function from(string|\DateTimeInterface $date): self
    {
        $this->from = $this->toUtcImmutable($date);
        return $this;
    }

    /**
     *
     * @param string|DateTimeInterface $date
     * @return self
     */
    public function to(string|\DateTimeInterface $date): self
    {
        $this->to = $this->toUtcImmutable($date);
        return $this;
    }

    /**
     *
     * @param int $limit
     * @return self
     */
    public function limit(int $limit): self
    {
        if ($limit < 1 || $limit > 200) {
            throw new InvalidArgumentException('limit must be between 1 and 200 for GetSellerList.');
        }
        $this->limit = $limit;
        return $this;
    }

    /**
     *
     * @param string $interval
     * @return self
     */
    public function interval(string $interval = "+119 days 23 hours 59 minutes 59 seconds"): self
    {
        $this->interval = $interval;
        return $this;
    }


    /**
     *
     * @param class-string<T> $handler
     * @return self
     */
    public function handler(string $handler): self
    {
        $this->handler = $handler;
        return $this;
    }

    /**
     *
     * @param string $queue
     * @return self
     */
    public function dispatch(?string $queue = null): self
    {
        if (!$this->handler) {
            throw new InvalidArgumentException('A handler class-string is required.');
        }

        $from = $this->from->format('Y-m-d\TH:i:s.v\Z');
        $to = $this->to->format('Y-m-d\TH:i:s.v\Z');
        SyncListingsJob::dispatch(
            from: $from,
            to: $to,
            limit: $this->limit,
            interval: $this->interval,
            handler: $this->handler,
            cacheKey: 'ebay-sdk:sync-offers:' . md5($from . ':' . $to . ':' . $this->handler),
            timeout: $this->timeout,
            failOnTimeout: $this->failOnTimeout,
        )->onQueue($queue);
        return $this;
    }

    /**
     * Execute API call and dispatch next one, if needed.
     * @param string $cacheKey
     * @param null|string $queue
     * @return self
     */
    public function run(string $cacheKey, ?string $queue = null): self
    {
        $checkpoint = Cache::get($cacheKey, [
            'page'      => 1,
            'window'    => null,
            'calls'     => 0,
        ]);

        // Get Time-Window
        $windowFrom = is_string($checkpoint['window'])
            ? new DateTimeImmutable($checkpoint['window'])
            : $this->from;
        $windowTo = $windowFrom->modify($this->interval);
        $windowTo = $windowTo > $this->to ? $this->to : $windowTo;

        /** @var SyncListingsHandler $handler */
        $handler = app($this->handler);
        $page = $checkpoint['page'];
        $total = 1;

        // Create Payload + Context
        $payload = [
            'StartTimeFrom' => $windowFrom->format('Y-m-d\TH:i:s.v\Z'),
            'StartTimeTo'   => $windowTo->format('Y-m-d\TH:i:s.v\Z'),
            'Pagination' => [
                'EntriesPerPage' => $this->limit,
                'PageNumber' => $page,
            ],
        ];
        $context = new SyncListingsContext(
            from: $this->from->format('Y-m-d\TH:i:s.v\Z'),
            to: $this->to->format('Y-m-d\TH:i:s.v\Z'),
            limit: $this->limit,
            interval: $this->interval,
            handler: $this->handler,
            cacheKey: $cacheKey,
            queue: $queue ?? 'default',
            payload: $payload
        );

        // Execute Request
        if ($checkpoint['calls'] === 0) {
            try {
                $handler->onPrepare($context);
            } catch (Throwable $exception) {
                report($exception);
            }
        }
        do {
            if (RateLimiter::tooManyAttempts($cacheKey . ':limiter', 30)) {
                $seconds = RateLimiter::availableIn($cacheKey . ':limiter');
                SyncListingsJob::dispatch(
                    from: $this->from->format('Y-m-d\TH:i:s.v\Z'),
                    to: $this->to->format('Y-m-d\TH:i:s.v\Z'),
                    limit: $this->limit,
                    interval: $this->interval,
                    handler: $this->handler,
                    cacheKey: $cacheKey,
                    timeout: $this->timeout,
                    failOnTimeout: $this->failOnTimeout,
                )->onQueue($queue)->delay($seconds + 5);
                return $this;
            }
            RateLimiter::increment($cacheKey . ':limiter');

            // Execute Request
            $payload = $handler->onBefore($payload, $context);
            $response = $this->client->execute($request = new GetSellerList($payload));
            $content = $response->content();
            $handler->onAfter($request, $response, $context);

            // Parse Request
            $total = (int) ($content['PaginationResult']['TotalNumberOfPages'] ?? 1);
            $items = $content['ItemArray']['Item'] ?? [];
            if (empty($items)) {
                break;
            }
            if (isset($items['ItemID'])) {
                $items = [$items];
            }

            // Execute Handler
            $handler->onChunk($items, $context);
            foreach ($items AS $item) {
                $handler->onItem($item, $context);
            }

            // Checkpoint
            Cache::put($cacheKey, [
                'page'      => ++$page,
                'window'    => $windowFrom->format('Y-m-d\TH:i:s.v\Z'),
                'calls'     => ++$checkpoint['calls'],
            ], now()->addMinutes(120));
        } while ($page <= $total);

        // Checkpoint
        $nextWindowFrom = $windowTo->modify('+1 second');
        if ($nextWindowFrom <= $this->to) {
            Cache::put($cacheKey, [
                'page'      => 1,
                'window'    => $nextWindowFrom->format('Y-m-d\TH:i:s.v\Z'),
                'calls'     => ++$checkpoint['calls'],
            ], now()->addMinutes(120));

            SyncListingsJob::dispatch(
                from: $this->from->format('Y-m-d\TH:i:s.v\Z'),
                to: $this->to->format('Y-m-d\TH:i:s.v\Z'),
                limit: $this->limit,
                interval: $this->interval,
                handler: $this->handler,
                cacheKey: $cacheKey,
                timeout: $this->timeout,
                failOnTimeout: $this->failOnTimeout,
            )->onQueue($queue);
        } else {
            try {
                $handler->onFinish($context);
            } catch (Throwable $exception) {
                report($exception);
            } finally {
                Cache::forget($cacheKey);
                RateLimiter::clear($cacheKey . ':limiter');
            }
        }
        return $this;
    }
}
