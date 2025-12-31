<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/analytics/resources/traffic_report/methods/getTrafficReport#h3-uri-parameters
 */
enum TrafficReportDimension: string
{
    /**
     * Generate Traffic Report by Days
     */
    case DAY = 'DAY';

    /**
     * Generate Traffic Report by Listing
     */
    case LISTING = 'LISTING';
}
