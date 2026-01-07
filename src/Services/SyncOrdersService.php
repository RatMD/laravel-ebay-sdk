<?php declare(strict_types=1);

namespace Rat\eBaySDK\Services;

use Rat\eBaySDK\Client;

class SyncOrdersService
{
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
    }
}
