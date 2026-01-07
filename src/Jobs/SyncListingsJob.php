<?php declare(strict_types=1);

namespace Rat\eBaySDK\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUniqueUntilProcessing;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Rat\eBaySDK\Services\SyncListingsService;

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
     * @return void
     */
    public function __construct(
        private readonly string $from,
        private readonly string $to,
        private readonly int $limit,
        private readonly string $interval,
        private readonly string $handler,
        private readonly string $cacheKey,
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
            ->run($this->cacheKey, $this->queue);
    }
}
