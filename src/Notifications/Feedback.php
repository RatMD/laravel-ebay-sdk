<?php declare(strict_types=1);

namespace Rat\eBaySDK\Notifications;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;

/**
 * This notification is applicable to both buyers and sellers and is sent when that
 * buyer or seller has left Feedback for the other party in the order, or has
 * received Feedback from the other party in the order. Feedback is given at the
 * order line item level.
 *
 * This notification will appear in the GetFeedback call response. See Feedback
 * for additional information about this notification.
 *
 * @see https://developer.ebay.com/devzone/xml/docs/reference/ebay/types/NotificationEventTypeCodeType.html
 */
class Feedback
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
