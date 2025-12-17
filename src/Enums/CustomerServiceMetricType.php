<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/feed/types/api:CustomerServiceMetricTypeEnum
 */
enum CustomerServiceMetricType: string
{
    /**
     * The metric rating is based on Item not as described (SNAD) transactions.
     */
    case ITEM_NOT_AS_DESCRIBED = "ITEM_NOT_AS_DESCRIBED";

    /**
     * The metric rating is based on Item not received (INR) transactions.
     */
    case ITEM_NOT_RECEIVED = "ITEM_NOT_RECEIVED";
}
