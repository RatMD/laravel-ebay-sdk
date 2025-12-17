<?php declare(strict_types=1);

namespace Rat\eBaySDK\Notifications;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;

/**
 * This seller-facing notification is sent when a buyer/winning bidder is
 * requesting a total price before paying for the item. This notification is
 * applicable for auction listings and for fixed-price listings that do not require
 * immediate payment.
 *
 * This notification will appear in the GetItemTransactions call response. See
 * CheckoutBuyerRequestsTotal for additional information about this notification.
 *
 * @see https://developer.ebay.com/devzone/xml/docs/reference/ebay/types/NotificationEventTypeCodeType.html
 */
class CheckoutBuyerRequestsTotal
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
