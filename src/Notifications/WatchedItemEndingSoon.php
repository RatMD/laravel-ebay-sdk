<?php declare(strict_types=1);

namespace Rat\eBaySDK\Notifications;

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
    /**
     * Create a new event instance.
     */
    public function __construct(
        public readonly array $headers,
        public readonly array $payload,
	) { }
}
