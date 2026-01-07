<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:RefundStatusEnum
 */
enum RefundStatus: string
{
    /**
     * This enumeration value indicates that the refund process was initiated by the seller, but was
     * not successful. If this value is returned in the issueRefund response, it indicates that the
     * issueRefund operation was not successful at issuing the buyer refund. Any returned error
     * codes may give more insight on why the operation failed.
     */
    case FAILED = "FAILED";

    /**
     * This enumeration value indicates that the refund process has been initiated by the seller,
     * but not yet completed. This value is returned in the issueRefund response if the issueRefund
     * operation was successful. Buyer refunds initiated through the issueRefund operation are
     * processed asynchronously, so the seller can track the status of the refund by using the
     * getOrder operation.
     */
    case PENDING = "PENDING";

    /**
     * This enumeration value indicates that the refund has been successfully submitted to the
     * buyer. This value should never be returned in the issueRefund response since buyer refunds
     * initiated through the issueRefund operation are processed asynchronously.
     */
    case REFUNDED = "REFUNDED";
}
