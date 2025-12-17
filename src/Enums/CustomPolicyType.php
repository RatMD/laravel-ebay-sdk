<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/account/types/api:CustomPolicyTypeEnum
 */
enum CustomerServiceMetricType: string
{
    /**
     * This enumeration value indicates that the custom policy is a product compliance policy.
     */
    case PRODUCT_COMPLIANCE = "PRODUCT_COMPLIANCE";

    /**
     * This enumeration value indicates that the custom policy is a product takeback policy.
     */
    case TAKE_BACK = "TAKE_BACK";
}
