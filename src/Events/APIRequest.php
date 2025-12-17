<?php declare(strict_types=1);

namespace Rat\eBaySDK\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Psr\Http\Message\RequestInterface;

class APIRequest
{
    use Dispatchable;
    use InteractsWithSockets;

    /**
     * Create a new event instance.
     */
    public function __construct(
        public readonly RequestInterface $request,
        public readonly array $options
    ) { }
}
