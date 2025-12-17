<?php declare(strict_types=1);

namespace Rat\eBaySDK\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;

/**
 * This notification is is applicable to both buyers and sellers and is sent when
 * an eBay Money Back Guarantee case has been closed.
 *
 * This notification can also be sent to the subscribed seller when the buyer
 * has closed either of the following:
 * an Item Not Received inquiry against an order line item
 * an Item Not Received case opened by that buyer
 * This notification will appear in the getEBPCaseDetail call response. See
 * EBPClosedCase for additional information about this notification.
 *
 * @see https://developer.ebay.com/devzone/xml/docs/reference/ebay/types/NotificationEventTypeCodeType.html
 */
class EBPClosedCase
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
