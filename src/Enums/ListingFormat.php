<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/inventory/types/slr:FormatTypeEnum
 */
enum ListingFormat: string
{
    /**
     * This enumeration value indicates an AUCTION buying option.
     */
    case AUCTION = "AUCTION";

    /**
     * This enumeration value indicates a FIXED_PRICE buying option.
     */
    case FIXED_PRICE = "FIXED_PRICE";
}
