<?php declare(strict_types=1);

namespace Rat\eBaySDK\Events;

class OAuthSuccess
{
    /**
     * Create a new event instance.
     */
    public function __construct(
        public readonly array $tokens,
	) { }
}
