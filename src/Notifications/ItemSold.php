<?php declare(strict_types=1);

namespace Rat\eBaySDK\Notifications;

/**
 * This seller-facing notification is sent when an eBay listing ends in a sale.
 *
 * This notification will appear in the GetItem call response. See ItemSold for
 * additional information about this notification.
 *
 * @see https://developer.ebay.com/devzone/xml/docs/reference/ebay/types/NotificationEventTypeCodeType.html
 */
class ItemSold
{
    /**
     * Create a new event instance.
     */
    public function __construct(
        public readonly array $headers,
        public readonly array $payload,
	) { }
}
