<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:EbayFulfillmentProgram
 */
enum EbayFulfillmentProgram: string
{
    /**
     * The value returned in this field indicates the party that is handling fulfillment of the
     * order line item.
     *
     * Valid value: EBAY
     */
    case fulfilledBy = "fulfilledBy";
}
