<?php declare(strict_types=1);

namespace Rat\eBaySDK\Notifications;

/**
 * This notification is sent to a subscribed seller when the duration of an eBay
 * listing has been extended.
 *
 * @see https://developer.ebay.com/devzone/xml/docs/reference/ebay/types/NotificationEventTypeCodeType.html
 */
class ItemExtended
{
    /**
     * Create a new event instance.
     */
    public function __construct(
        public readonly array $headers,
        public readonly array $payload,
	) { }
}
