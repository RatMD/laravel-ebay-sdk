<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:OrderFulfillmentStatus
 */
enum OrderFulfillmentStatus: string
{
    /**
     * The entire order has been shipped.
     *
     *
     * Note: When any quantity of a line item is assigned to a fulfillment, that line item is
     * marked as FULFILLED, even if the total quantity of the line item has not yet shipped.
     */
    case FULFILLED = "FULFILLED";

    /**
     * Applies only to orders with more than one line item. Indicates the seller has begun packaging
     * and shipping line items from the order, but not all line items have been shipped.
     */
    case IN_PROGRESS = "IN_PROGRESS";

    /**
     * The seller has not yet begun packaging any line items from the order.
     */
    case NOT_STARTED = "NOT_STARTED";
}
