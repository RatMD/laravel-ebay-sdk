<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:PaymentStatusEnum
 */
enum PaymentStatus: string
{
    /**
     * This enumeration value indicates that the buyer attempted to pay for the order, but the
     * payment has failed.
     */
    case FAILED = "FAILED";

    /**
     * This enumeration value indicates that the item has been paid in full. Once this PAID value is
     * returned in an order management call, it is safe for the seller to ship the item to the
     * buyer.
     */
    case PAID = "PAID";

    /**
     * This enumeration value indicates that payment on the order is still in the pending state, and
     * has not completed.
     */
    case PENDING = "PENDING";
}
