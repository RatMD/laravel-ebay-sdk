<?php declare(strict_types=1);

namespace Rat\eBaySDK\Notifications;

/**
 * This buyer-facing notification is sent when a seller makes a counter offer to
 * the buyer's Best Offer on an item.
 *
 * This notification will appear in the GetBestOffers call response. See
 * CounterOfferReceived for additional information about this notification.
 *
 * @see https://developer.ebay.com/devzone/xml/docs/reference/ebay/types/NotificationEventTypeCodeType.html
 */
class CounterOfferReceived
{
    /**
     * Create a new event instance.
     */
    public function __construct(
        public readonly array $headers,
        public readonly array $payload,
	) { }
}
