<?php declare(strict_types=1);

namespace Rat\eBaySDK\Notifications;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;

class UnknownNotification
{
    use Dispatchable;
    use InteractsWithSockets;

    /**
     * Create a new event instance.
     */
    public function __construct(
        public readonly string $eventName,
        public readonly array $headers,
        public readonly array $payload,
        public readonly string $raw,
	) { }
}
