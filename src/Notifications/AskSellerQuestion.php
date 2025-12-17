<?php declare(strict_types=1);

namespace Rat\eBaySDK\Notifications;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;

/**
 * This is a seller-facing notification that is sent when an eBay user has used the
 * Ask a Question feature on the seller's active listing. An eBay user does not
 * have to be an active bidder on an auction listing to ask a seller a question.
 *
 * This notification will appear in the GetMemberMessages call response. See
 * AskSellerQuestion for additional information about this notification.
 *
 * @see https://developer.ebay.com/devzone/xml/docs/reference/ebay/types/NotificationEventTypeCodeType.html
 */
class AskSellerQuestion
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
