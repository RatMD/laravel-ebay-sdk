<?php declare(strict_types=1);

namespace Rat\eBaySDK\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUniqueUntilProcessing;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\RateLimiter;
use Rat\eBaySDK\Abstracts\SyncListingsHandler;
use Rat\eBaySDK\Context\SyncListingsContext;
use Rat\eBaySDK\Services\SyncListingsService;
use Throwable;

class SyncListingsJob implements ShouldQueue, ShouldBeUniqueUntilProcessing
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     *
     * @param string $from
     * @param string $to
     * @param int $limit
     * @param string $interval
     * @param string $handler
     * @param string $cacheKey
     * @param int $timeout
     * @param bool $failOnTimeout
     * @return void
     */
    public function __construct(
        private readonly string $from,
        private readonly string $to,
        private readonly int $limit,
        private readonly string $interval,
        private readonly string $handler,
        private readonly string $cacheKey,
        public int $timeout = 180,
        public bool $failOnTimeout = true,
    )
    { }

    /**
     * Get the unique ID for the job.
     */
    public function uniqueId(): string
    {
        return $this->cacheKey;
    }

    /**
     *
     * @param SyncListingsService $syncListings
     * @return void
     */
    public function handle(
        SyncListingsService $syncListings
    ) {
        $syncListings->from($this->from)
            ->to($this->to)
            ->limit($this->limit)
            ->interval($this->interval)
            ->handler($this->handler)
            ->timeout($this->timeout, $this->failOnTimeout)
            ->run($this->cacheKey, $this->queue);
    }

    /**
     * Handle a job failure.
     * @param null|Throwable $exception
     * @return void
     */
    public function failed(?Throwable $exception): void
    {
        $context = new SyncListingsContext(
            from: $this->from,
            to: $this->to,
            limit: $this->limit,
            interval: $this->interval,
            handler: $this->handler,
            cacheKey: $this->cacheKey,
            queue: $this->queue ?? 'default',
            payload: []
        );

        try {
            /** @var SyncListingsHandler $handler */
            $handler = app($this->handler);
            $handler->onFailed($exception, $context);
        } catch (\Exception $exception) {
            report($exception);
        } finally {
            Cache::forget($this->cacheKey);
            RateLimiter::clear($this->cacheKey . ':limiter');
        }
    }
}
