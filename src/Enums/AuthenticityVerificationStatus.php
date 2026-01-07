<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:AuthenticityVerificationStatusEnum
 */
enum AuthenticityVerificationStatus: string
{
    /**
     * This enumerated value indicates that the authentication status is PENDING. The item's
     * authenticity is still unknown.
     */
    case PENDING = "PENDING";

    /**
     * This enumerated value indicates that the authentication status has PASSED. The item is
     * authentic.
     */
    case PASSED = "PASSED";

    /**
     * This enumerated value indicates that the authentication has FAILED. The items's authenticity
     * could not be verified.
     */
    case FAILED = "FAILED";

    /**
     * This enumerated value indicates that the authentication status has PASSED_WITH_EXCEPTION.
     * There may be legal reasons or requirements such that the item cannot be labeled authentic.
     */
    case PASSED_WITH_EXCEPTION = "PASSED_WITH_EXCEPTION";
}
