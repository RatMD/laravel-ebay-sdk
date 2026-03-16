<?php declare(strict_types=1);

namespace Rat\eBaySDK\Notifications;

/**
 * This notification is applicable to both buyers and sellers and is sent when the
 * buyer has shipped a return item back to the seller.
 *
 * This notification will appear in the getReturnDetail call response. See
 * ReturnShipped for additional information about this notification.
 *
 * @see https://developer.ebay.com/devzone/xml/docs/reference/ebay/types/NotificationEventTypeCodeType.html
 */
class ReturnShipped
{
    /**
     * Create a new event instance.
     */
    public function __construct(
        public readonly array $headers,
        public readonly array $payload,
	) { }
}
