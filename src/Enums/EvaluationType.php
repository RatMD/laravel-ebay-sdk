<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/analytics/types/api:EvaluationTypeEnum
 */
enum EvaluationType: string
{
    /**
     * This is a monthly evaluation that occurs on 20th of every month.
     */
    case CURRENT = "CURRENT";

    /**
     * This is a daily evaluation that provides a projection of how the seller is currently
     * performing with regards to the upcoming evaluation period.
     */
    case PROJECTED = "PROJECTED";
}
