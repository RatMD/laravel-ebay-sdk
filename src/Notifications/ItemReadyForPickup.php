<?php declare(strict_types=1);

namespace Rat\eBaySDK\Notifications;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;

/**
 * This notification is sent to a subscribed buyer when an In-Store Pickup or Click
 * and Collect order is ready to be picked up at the merchant's store.
 *
 * @see https://developer.ebay.com/devzone/xml/docs/reference/ebay/types/NotificationEventTypeCodeType.html
 */
class ItemReadyForPickup
{
    use Dispatchable;
    use InteractsWithSockets;

    /**
     * Create a new event instance.
     */
    public function __construct(
        public readonly array $headers,
        public readonly array $payload,
	) { }
}
