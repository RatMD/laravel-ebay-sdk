<?php declare(strict_types=1);

namespace Rat\eBaySDK\Notifications;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;

/**
 * This seller-facing notification is sent when payment (to eBay or buyer) related
 * to the outcome of an eBay Money Back Guarantee case is due.
 *
 * This notification will appear in the getEBPCaseDetail call response. See
 * EBPMyPaymentDue for additional information about this notification.
 *
 * @see https://developer.ebay.com/devzone/xml/docs/reference/ebay/types/NotificationEventTypeCodeType.html
 */
class EBPMyPaymentDue
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
