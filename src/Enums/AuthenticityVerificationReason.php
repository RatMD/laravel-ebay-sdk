<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:AuthenticityVerificationReasonEnum
 */
enum AuthenticityVerificationReason: string
{
    /**
     * This enumerated value indicates that the order line item could not be authenticated. This
     * means that the order line item has failed the authenticity verification inspection.
     */
    case NOT_AUTHENTIC = "NOT_AUTHENTIC";

    /**
     * This enumeration value indicates that the order line item is not as described. This means
     * that the order line item has failed the authenticity verification inspection because the
     * order line item does not match the order line item's description.
     */
    case NOT_AS_DESCRIBED = "NOT_AS_DESCRIBED";

    /**
     * This enumeration value indicates that the order line item is customized and will be sent to
     * the buyer. This means that the order line item has been altered or customized, and cannot be
     * labeled as authentic.
     */
    case CUSTOMIZED = "CUSTOMIZED";

    /**
     * This enumeration value indicates that the order line item is miscategorized and will be sent
     * to the buyer. This means that the item was in the wrong eBay category, and cannot be labeled
     * as authentic.
     */
    case MISCATEGORIZED = "MISCATEGORIZED";

    /**
     * This enumeration value indicates that the order line item was found as counterfeit and cannot
     * be returned to the seller because of legal constraints.
     */
    case NOT_AUTHENTIC_NO_RETURN = "NOT_AUTHENTIC_NO_RETURN";
}
