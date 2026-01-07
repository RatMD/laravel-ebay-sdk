<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/inventory/types/slr:SoldOnEnum
 */
enum SoldOn: string
{
    /**
     * This enumeration value indicates that the product was sold for the price in the
     * originalRetailPrice field on an eBay site.
     */
    case ON_EBAY = 'ON_EBAY';

    /**
     * This enumeration value indicates that the product was sold for the originalRetailPrice
     * through a third-party retailer.
     */
    case OFF_EBAY = 'OFF_EBAY';

    /**
     * This enumeration value indicates that the product was sold for the originalRetailPrice on an
     * eBay site and through a third-party retailer.
     */
    case ON_AND_OFF_EBAY = 'ON_AND_OFF_EBAY';
}
