<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/inventory/types/slr:LengthUnitOfMeasureEnum
 */
enum LengthUnitOfMeasure: string
{
    /**
     * This enumeration value indicates that the dimensions of the shipping package is being
     * measured in inches.
     */
    case INCH = "INCH";

    /**
     * This enumeration value indicates that the dimensions of the shipping package is being
     * measured in feet.
     */
    case FEET = "FEET";

    /**
     * This enumeration value indicates that the dimensions of the shipping package is being
     * measured in centimeters.
     */
    case CENTIMETER = "CENTIMETER";

    /**
     * This enumeration value indicates that the dimensions of the shipping package is being
     * measured in meters.
     */
    case METER = "METER";
}
