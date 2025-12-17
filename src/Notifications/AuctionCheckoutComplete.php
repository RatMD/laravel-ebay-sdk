<?php declare(strict_types=1);

namespace Rat\eBaySDK\Notifications;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;

/**
 * This seller-facing notification is sent when the winning bidder or buyer has
 * paid for the auction or fixed-price item and completed the checkout process. For
 * multiple line item orders, an AuctionCheckoutComplete notification is only
 * generated for one of the line items in the order.
 *
 * This notification will appear in the GetItemTransactions call response. See
 * AuctionCheckoutComplete for additional information about this notification.
 *
 * @see https://developer.ebay.com/devzone/xml/docs/reference/ebay/types/NotificationEventTypeCodeType.html
 */
class AuctionCheckoutComplete
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
