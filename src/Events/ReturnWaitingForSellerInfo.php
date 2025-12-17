<?php declare(strict_types=1);

namespace Rat\eBaySDK\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;

/**
 * This seller-facing notification is sent when a return request is waiting for
 * information from the seller, like a Return Merchandise Authorization (RMA)
 * number or a correct return address.
 *
 * IThis notification will appear in the getReturnDetail call response. See
 * ReturnWaitingForSellerInfo for additional information about this notification.
 *
 * @see https://developer.ebay.com/devzone/xml/docs/reference/ebay/types/NotificationEventTypeCodeType.html
 */
class ReturnWaitingForSellerInfo
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
