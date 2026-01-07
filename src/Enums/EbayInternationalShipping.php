<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:EbayInternationalShipping
 */
enum EbayInternationalShipping: string
{
    /**
     * The value returned in this field indicates the party that is responsible for managing returns
     * of the order line item.
     *
     * Valid value: EBAY
     */
    case returnsManagedBy = "returnsManagedBy";
}
