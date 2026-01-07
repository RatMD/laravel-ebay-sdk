<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:AppointmentWindowEnum
 */
enum AppointmentWindow: string
{
    /**
     * Appointment window starts before noon.
     */
    case MORNING = "MORNING";

    /**
     * Appointment window starts after noon.
     */
    case EVENING = "EVENING";
}
