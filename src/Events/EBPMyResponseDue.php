<?php declare(strict_types=1);

namespace Rat\eBaySDK\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;

/**
 * This notification is applicable to both buyers and sellers and is sent when a
 * response to the eBay Money Back Guarantee case is due from that user. When an
 * eBay Money Back Guarantee case is opened, this notification is only sent to the
 * seller involved in the case and not the buyer.
 *
 * This notification is also sent to a subscribed seller when the buyer has
 * opened up either of the following:
 * an Item Not Received inquiry against an order line item
 * an Item Not Received case against that seller.
 * This notification will appear in the getEBPCaseDetail call response. See
 * EBPMyResponseDue for additional information about this notification.
 *
 * @see https://developer.ebay.com/devzone/xml/docs/reference/ebay/types/NotificationEventTypeCodeType.html
 */
class EBPMyResponseDue
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
