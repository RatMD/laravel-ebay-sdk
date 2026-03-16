<?php declare(strict_types=1);

namespace Rat\eBaySDK\Notifications;

/**
 * This notification is sent to a subscribed seller when the quantity of a
 * multiple-quantity, Good 'Til Cancelled, fixed-price listing has reached '0'.
 * This notification will only be sent if the seller has the out-of-stock feature
 * turned on in My eBay Preferences.
 *
 * @see https://developer.ebay.com/devzone/xml/docs/reference/ebay/types/NotificationEventTypeCodeType.html
 */
class ItemOutOfStock
{
    /**
     * Create a new event instance.
     */
    public function __construct(
        public readonly array $headers,
        public readonly array $payload,
	) { }
}
