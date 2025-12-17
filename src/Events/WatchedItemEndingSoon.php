<?php declare(strict_types=1);

namespace Rat\eBaySDK\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;

/**
 * This buyer-facing notification is sent when a listing that the buyer is watching
 * is ending soon. This event has a TimeLeft property that defines the 'ending
 * soon' threshold value.
 *
 * This notification will appear in the GetItem call response. See
 * WatchedItemEndingSoon for additional information about this notification.
 *
 * @see https://developer.ebay.com/devzone/xml/docs/reference/ebay/types/NotificationEventTypeCodeType.html
 */
class WatchedItemEndingSoon
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
