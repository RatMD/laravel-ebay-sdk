<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:CancelRequestStateEnum
 */
enum CancelRequestState: string
{
    /**
     * This enumeration value indicates that the order cancellation request was successfully
     * processed and completed.
     */
    case COMPLETED = "COMPLETED";

    /**
     * This enumeration value indicates that the buyer's request to cancel the order has been
     * rejected by the seller.
     */
    case REJECTED = "REJECTED";

    /**
     * This enumeration value indicates that the buyer has requested that a particular order be
     * cancelled, but the seller has yet to accept or reject the cancellation request.
     */
    case REQUESTED = "REQUESTED";
}
