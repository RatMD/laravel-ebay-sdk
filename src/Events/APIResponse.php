<?php declare(strict_types=1);

namespace Rat\eBaySDK\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class APIResponse
{
    use Dispatchable;
    use InteractsWithSockets;

    /**
     * Create a new event instance.
     */
    public function __construct(
        public readonly RequestInterface $request,
        public readonly array $options,
        public readonly ResponseInterface $response
    ) { }
}
