<?php declare(strict_types=1);

namespace Rat\eBaySDK\Events;

use Psr\Http\Message\RequestInterface;

class APIRequest
{
    /**
     * Create a new event instance.
     */
    public function __construct(
        public readonly RequestInterface $request,
        public readonly array $options
    ) { }
}
