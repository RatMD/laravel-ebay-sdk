<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:AppointmentTypeEnum
 */
enum AppointmentType: string
{
    /**
     * Indicates this appointment has both start and end date-time.
     */
    case TIME_SLOT = "TIME_SLOT";

    /**
     * Indicates this appointment has both start date-time (appointmentStartTime) and may have a
     * service provider appointment date (serviceProviderAppointmentDate).
     */
    case MACRO = "MACRO";
}
