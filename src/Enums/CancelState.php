<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:CancelStateEnum
 */
enum CancelState: string
{
    /**
     * The order has been cancelled.
     */
    case CANCELED = "CANCELED";

    /**
     * One or more cancellation requests have been made against the order.
     */
    case IN_PROGRESS = "IN_PROGRESS";

    /**
     * No cancellation requests have been made against the order.
     */
    case NONE_REQUESTED = "NONE_REQUESTED";
}
