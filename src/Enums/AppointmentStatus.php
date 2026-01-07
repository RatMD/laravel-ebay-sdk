<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:AppointmentStatusEnum
 */
enum AppointmentStatus: string
{
    /**
     * The appointment is on hold.
     */
    case ON_HOLD = "ON_HOLD";

    /**
     * The appointment has been confirmed.
     */
    case CONFIRMED = "CONFIRMED";

    /**
     * The appointment has been canceled by the customer.
     */
    case CANCELLED = "CANCELLED";

    /**
     * The appointment has been completed.
     */
    case FULFILLED = "FULFILLED";
}
