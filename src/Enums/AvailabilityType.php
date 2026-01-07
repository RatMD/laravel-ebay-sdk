<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/inventory/types/slr:AvailabilityTypeEnum
 */
enum AvailabilityType: string
{
    /**
     * This enumeration value indicates that the inventory item has quantity available for purchase
     * at the merchant's store indicated in the pickupAtLocationAvailability.merchantLocationKey
     * field. The quantity available for purchase is shown in the
     * pickupAtLocationAvailability.quantity field. If the product is "In Stock", the corresponding
     * pickupAtLocationAvailability.Quantity value should be an integer value greater than 0.
     */
    case IN_STOCK = "IN_STOCK";

    /**
     * This enumeration value indicates that the inventory item is out of stock at the merchant's
     * store indicated in the pickupAtLocationAvailability.merchantLocationKey field. If the product
     * is "Out of Stock", the corresponding pickupAtLocationAvailability.Quantity value should be 0.
     */
    case OUT_OF_STOCK = "OUT_OF_STOCK";

    /**
     * This enumeration value indicates that the merchant's store (indicated in the
     * pickupAtLocationAvailability.merchantLocationKey field) is temporarily out of stock of the
     * product, but some inventory of the product is being shipped from a warehouse to that store.
     * The quantity being shipped is shown in the pickupAtLocationAvailability.quantity field, and
     * this value should be an integer value greater than 0.
     */
    case SHIP_TO_STORE = "SHIP_TO_STORE";
}
