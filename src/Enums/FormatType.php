<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/inventory/types/slr:FormatTypeEnum
 */
enum FormatType: string
{
    /**
     * This enumeration value indicates that the listing format of the offer is auction.
     */
    case AUCTION = "AUCTION";

    /**
     * This enumeration value indicates that the listing format of the offer is fixed-price.
     */
    case FIXED_PRICE = "FIXED_PRICE";
}
