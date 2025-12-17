<?php declare(strict_types=1);

namespace Rat\eBaySDK\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;

/**
 * This notification is sent to a subscribed buyer or seller when eBay sends a
 * message to that user's InBox.
 *
 * If subscribed to by a buyer or seller, and when applicable, this notification
 * will appear in the GetMyMessages call response. For this notification to be
 * returned in GetMyMessages, the DetailLevel value in the GetMyMessages request
 * must be set to ReturnMessages.
 *
 * MyMessageseBayMessageHeader and MyMessageseBayMessage cannot be subscribed to
 * at the same time or specified in the same call.
 *
 * @see https://developer.ebay.com/devzone/xml/docs/reference/ebay/types/NotificationEventTypeCodeType.html
 */
class MyMessageseBayMessage
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
