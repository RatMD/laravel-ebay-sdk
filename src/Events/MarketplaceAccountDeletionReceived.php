<?php declare(strict_types=1);

namespace Rat\eBaySDK\Events;

class MarketplaceAccountDeletionReceived
{
    /**
     *
     * @param array $payload
     * @param array $headers
     * @param string $raw
     * @return void
     */
    public function __construct(
        public readonly array $payload,
        public readonly array $headers = [],
        public readonly string $raw = '',
    ) {}
}
