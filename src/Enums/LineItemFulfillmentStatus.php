<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:LineItemFulfillmentStatusEnum
 */
enum LineItemFulfillmentStatus: string
{
    /**
     * The line item has been processed, packaged, and shipped.
     *
     *
     * Note: A line item is considered fulfilled as soon as any one unit or component of the
     * line item is assigned to a fulfillment.
     */
    case FULFILLED = "FULFILLED";

    /**
     * Applies only to orders with more than one line item. Indicates the seller has begun packaging
     * and shipping one or more line items from the order, but not all line items have been shipped.
     */
    case IN_PROGRESS = "IN_PROGRESS";

    /**
     * The seller has not yet begun packaging the line item.
     */
    case NOT_STARTED = "NOT_STARTED";
}
