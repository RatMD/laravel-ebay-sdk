<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/account/types/api:CategoryTypeEnum
 */
enum CategoryType: string
{
    /**
     * This values indicates that the business policy applies to motor vehicle listings.
     */
    case MOTORS_VEHICLES = "MOTORS_VEHICLES";

    /**
     * This values indicates that the business policy applies to all listings besides motor vehicle listings.
     */
    case ALL_EXCLUDING_MOTORS_VEHICLES = "ALL_EXCLUDING_MOTORS_VEHICLES";
}
