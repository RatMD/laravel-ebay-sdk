<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/analytics/types/ssp:CycleTypeEnum
 */
enum CycleType: string
{
    /**
     * Indicates the evaluation that determines your currently effective seller level.
     */
    case CURRENT = "CURRENT";

    /**
     * Indicates the seller's profile level that will take effect on the next evaluation period, as
     * calculated at the time of the request.
     */
    case PROJECTED = "PROJECTED";
}
