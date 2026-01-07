<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:OrderPaymentStatusEnum
 */
enum OrderPaymentStatus: string
{
    /**
     * This enumeration value indicates that buyer payment or refund has failed.
     */
    case FAILED = "FAILED";

    /**
     * This enumeration value indicates that the full amount of the order has been refunded to the
     * buyer. This value is only applicable to return requests or order cancellations.
     */
    case FULLY_REFUNDED = "FULLY_REFUNDED";

    /**
     * This enumeration value indicates that the order has been paid in full. Once this PAID value
     * is returned in an order management call, it is safe for the seller to ship the order to the
     * buyer.
     */
    case PAID = "PAID";

    /**
     * This enumeration value indicates that a partial amount of the order has been refunded to the
     * buyer.
     */
    case PARTIALLY_REFUNDED = "PARTIALLY_REFUNDED";

    /**
     * This enumeration value indicates that buyer payment or a refund from the seller is in the
     * pending state.
     */
    case PENDING = "PENDING";
}
