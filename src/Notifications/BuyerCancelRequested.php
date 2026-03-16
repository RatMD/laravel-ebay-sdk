<?php declare(strict_types=1);

namespace Rat\eBaySDK\Notifications;

/**
 * This notification is sent to a subscribed seller when a buyer has requested an
 * order cancellation.
 *
 * @see https://developer.ebay.com/devzone/xml/docs/reference/ebay/types/NotificationEventTypeCodeType.html
 */
class BuyerCancelRequested
{
    /**
     * Create a new event instance.
     */
    public function __construct(
        public readonly array $headers,
        public readonly array $payload,
	) { }
}
