<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/inventory/types/slr:PackageTypeEnum
 */
enum PackageType: string
{
    /**
     * This enumeration value indicates that the package type used to ship the inventory item is a
     * letter.
     */
    case LETTER = "LETTER";

    /**
     * This enumeration value indicates that the inventory item is considered a "bulky good".
     */
    case BULKY_GOODS = "BULKY_GOODS";

    /**
     * This enumeration value indicates that the package type used to ship the inventory item is a
     * caravan.
     */
    case CARAVAN = "CARAVAN";

    /**
     * This enumeration value indicates that the inventory item is a car
     */
    case CARS = "CARS";

    /**
     * This enumeration value indicates that the package type used to ship the inventory item is a
     * Euro pallet.
     */
    case EUROPALLET = "EUROPALLET";

    /**
     * This enumeration value indicates that the package type used to ship the inventory item is an
     * expandable tough bag.
     */
    case EXPANDABLE_TOUGH_BAGS = "EXPANDABLE_TOUGH_BAGS";

    /**
     * This enumeration value indicates that the package type used to ship the inventory item is an
     * extra large pack.
     */
    case EXTRA_LARGE_PACK = "EXTRA_LARGE_PACK";

    /**
     * This enumeration value indicates that the inventory item is a furniture item.
     */
    case FURNITURE = "FURNITURE";

    /**
     * This enumeration value indicates that the inventory item is an industry vehicle.
     */
    case INDUSTRY_VEHICLES = "INDUSTRY_VEHICLES";

    /**
     * This enumeration value indicates that the package type used to ship the inventory item is a
     * Canada Post large box.
     */
    case LARGE_CANADA_POSTBOX = "LARGE_CANADA_POSTBOX";

    /**
     * This enumeration value indicates that the package type used to ship the inventory item is a
     * Canada Post large bubble mailer.
     */
    case LARGE_CANADA_POST_BUBBLE_MAILER = "LARGE_CANADA_POST_BUBBLE_MAILER";

    /**
     * This enumeration value indicates that the package type used to ship the inventory item is a
     * large envelope.
     */
    case LARGE_ENVELOPE = "LARGE_ENVELOPE";

    /**
     * This enumeration value indicates that the package type used to ship the inventory item is a
     * standard mailing box.
     */
    case MAILING_BOX = "MAILING_BOX";

    /**
     * This enumeration value indicates that the package type used to ship the inventory item is a
     * medium Canada Post box.
     */
    case MEDIUM_CANADA_POST_BOX = "MEDIUM_CANADA_POST_BOX";

    /**
     * This enumeration value indicates that the package type used to ship the inventory item is a
     * medium Canada Post bubble mailer.
     */
    case MEDIUM_CANADA_POST_BUBBLE_MAILER = "MEDIUM_CANADA_POST_BUBBLE_MAILER";

    /**
     * This enumeration value indicates that the inventory item is a motorcycle.
     */
    case MOTORBIKES = "MOTORBIKES";

    /**
     * This enumeration value indicates that the package type used to ship the inventory item is a
     * one-way pallet.
     */
    case ONE_WAY_PALLET = "ONE_WAY_PALLET";

    /**
     * This enumeration value indicates that the package type used to ship the inventory item is an
     * thick envelope.
     */
    case PACKAGE_THICK_ENVELOPE = "PACKAGE_THICK_ENVELOPE";

    /**
     * This enumeration value indicates that the package type used to ship the inventory item is a
     * padded bag.
     */
    case PADDED_BAGS = "PADDED_BAGS";

    /**
     * This enumeration value indicates that the package type used to ship the inventory item is a
     * parcel or a padded envelope.
     */
    case PARCEL_OR_PADDED_ENVELOPE = "PARCEL_OR_PADDED_ENVELOPE";

    /**
     * This enumeration value indicates that the package type used to ship the inventory item is a
     * roll.
     */
    case ROLL = "ROLL";

    /**
     * This enumeration value indicates that the package type used to ship the inventory item is a
     * small Canada Post box.
     */
    case SMALL_CANADA_POST_BOX = "SMALL_CANADA_POST_BOX";

    /**
     * This enumeration value indicates that the package type used to ship the inventory item is a
     * small Canada Post bubble mailer.
     */
    case SMALL_CANADA_POST_BUBBLE_MAILER = "SMALL_CANADA_POST_BUBBLE_MAILER";

    /**
     * This enumeration value indicates that the package type used to ship the inventory item is a
     * tough bag.
     */
    case TOUGH_BAGS = "TOUGH_BAGS";

    /**
     * This enumeration value indicates that the package type used to ship the inventory item is a
     * UPS letter.
     */
    case UPS_LETTER = "UPS_LETTER";

    /**
     * This enumeration value indicates that the package type used to ship the inventory item is a
     * USPS flat-rate envelope.
     */
    case USPS_FLAT_RATE_ENVELOPE = "USPS_FLAT_RATE_ENVELOPE";

    /**
     * This enumeration value indicates that the package type used to ship the inventory item is a
     * USPS large pack.
     */
    case USPS_LARGE_PACK = "USPS_LARGE_PACK";

    /**
     * This enumeration value indicates that the package type used to ship the inventory item is a
     * USPS very large pack.
     */
    case VERY_LARGE_PACK = "VERY_LARGE_PACK";

    /**
     * This enumeration value indicates that the package type used to ship the inventory item is a
     * wine pak.
     */
    case WINE_PAK = "WINE_PAK";
}
