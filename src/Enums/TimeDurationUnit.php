<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/inventory/types/slr:TimeDurationUnitEnum
 */
enum TimeDurationUnit: string
{
    /**
     * Time duration is based on a number of years.
     */
    case YEAR = "YEAR";

    /**
     * Time duration is based on a number of months
     */
    case MONTH = "MONTH";

    /**
     * Time duration is based on a number of days.
     */
    case DAY = "DAY";

    /**
     * Time duration is based on a number of hours.
     */
    case HOUR = "HOUR";

    /**
     * Time duration is based on a number of calendar days, including Saturday and Sunday. This time
     * duration does not exclude holidays.
     */
    case CALENDAR_DAY = "CALENDAR_DAY";

    /**
     * Time duration is based on a number of business days, or 'working days' (normally Monday
     * through Friday). This excludes Sunday and all holidays in the time duration and, depending on
     * the location, can include or exclude Saturday.
     */
    case BUSINESS_DAY = "BUSINESS_DAY";

    /**
     * Time duration is based on a number of minutes.
     */
    case MINUTE = "MINUTE";

    /**
     * Time duration is based on a number of seconds.
     */
    case SECOND = "SECOND";

    /**
     * Time duration is based on a number of milliseconds.
     */
    case MILLISECOND = "MILLISECOND";
}
