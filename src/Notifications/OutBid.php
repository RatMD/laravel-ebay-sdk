<?php declare(strict_types=1);

namespace Rat\eBaySDK\Notifications;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;

/**
 * This buyer-facing notification is sent when another buyer has outbid (placed a
 * higher bid) the subscribed buyer on an auction listing, and the subscribed buyer
 * is no longer the current high bidder. This notification is only applicable for
 * auction listings.
 *
 * This notification will appear in the GetItem call response. See OutBid for
 * additional information about this notification.
 *
 * @see https://developer.ebay.com/devzone/xml/docs/reference/ebay/types/NotificationEventTypeCodeType.html
 */
class OutBid
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
