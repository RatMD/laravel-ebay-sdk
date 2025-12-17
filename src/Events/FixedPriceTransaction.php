<?php declare(strict_types=1);

namespace Rat\eBaySDK\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;

/**
 * This seller-facing notification is sent each time a buyer purchases an item in a
 * single or multiple-quantity, fixed-price listing. This notification is only
 * applicable for fixed-price listings.
 *
 * This notification will appear in the GetFeedback call response. See
 * GetItemTransactions for additional information about this notification.
 *
 * @see https://developer.ebay.com/devzone/xml/docs/reference/ebay/types/NotificationEventTypeCodeType.html
 */
class FixedPriceTransaction
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
