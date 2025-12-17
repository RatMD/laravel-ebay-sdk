<?php declare(strict_types=1);

namespace Rat\eBaySDK\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;

/**
 * This notification is applicable to both buyers and sellers and is sent as soon
 * as an auction listing ends with or without a winning bidder. This notification
 * will also be sent if the auction ends as a result of a buyer using the auction
 * listing's Buy It Now feature. This notification is only applicable for auction
 * listings.
 *
 * This notification will appear in the GetItemTransactions call response. See
 * EndOfAuction for additional information about this notification.
 *
 * @see https://developer.ebay.com/devzone/xml/docs/reference/ebay/types/NotificationEventTypeCodeType.html
 */
class EndOfAuction
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
