<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/fulfillment/types/sol:ChargeTypeEnum
 */
enum ChargeType: string
{
    /**
     * This enumeration value indicates that the buyer was charged a Buyer Protection fee. This fee
     * applies only when a buyer purchases an item from a private seller on the eBay UK marketplace
     * and includes both the fee and applicable tax against the fee.
     */
    case BUYER_PROTECTION = "BUYER_PROTECTION";
}
