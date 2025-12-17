<?php declare(strict_types=1);

namespace Rat\eBaySDK\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;

/**
 * This notification is applicable to both buyers an sellers and is sent when an
 * eBay Money Back Guarantee case is escalated to eBay customer support. This
 * notification is also sent to a subscribed seller when an Item Not Received
 * inquiry against an order line item has been escalated to an eBay Money Back
 * Guarantee case.
 *
 * This notification will appear in the getEBPCaseDetail call response. See
 * EBPEscalatedCase for additional information about this notification.
 *
 * @see https://developer.ebay.com/devzone/xml/docs/reference/ebay/types/NotificationEventTypeCodeType.html
 */
class EBPEscalatedCase
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
