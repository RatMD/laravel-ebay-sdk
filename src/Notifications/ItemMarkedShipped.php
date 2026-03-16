<?php declare(strict_types=1);

namespace Rat\eBaySDK\Notifications;

/**
 * This notification is sent to a subscribed buyer and seller when that seller has
 * marked an item as 'shipped'.
 *
 * @see https://developer.ebay.com/devzone/xml/docs/reference/ebay/types/NotificationEventTypeCodeType.html
 */
class ItemMarkedShipped
{
    /**
     * Create a new event instance.
     */
    public function __construct(
        public readonly array $headers,
        public readonly array $payload,
	) { }
}
