<?php declare(strict_types=1);

namespace Rat\eBaySDK\Context;

class SyncListingsContext
{
    /**
     *
     * @param string $from
     * @param string $to
     * @param int $limit
     * @param string $interval
     * @param string $handler
     * @param string $cacheKey
     * @param string $queue
     * @param array $payload
     * @return void
     */
    public function __construct(
        public readonly string $from,
        public readonly string $to,
        public readonly int $limit,
        public readonly string $interval,
        public readonly string $handler,
        public readonly string $cacheKey,
        public readonly string $queue,
        public readonly array $payload,
    ){ }
}
