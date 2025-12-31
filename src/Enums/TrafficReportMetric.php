<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/static/performance/traffic-report.html#metric-parameters
 */
enum TrafficReportMetric: string
{
    /**
     * The number of times an item displays on the search results page divided by
     * the number of times buyers clicked through to its View Item page.
     *
     * Localized name: Click through rate
     */
    case CLICK_THROUGH_RATE = 'CLICK_THROUGH_RATE';

    /**
     * The number of times the seller's listings displayed on the search results page.
     * The listing might not have been visible due to its position on the page.
     *
     * Localized name: Listing impressions from the search results page
     */
    case LISTING_IMPRESSION_SEARCH_RESULTS_PAGE = 'LISTING_IMPRESSION_SEARCH_RESULTS_PAGE';

    /**
     * The number of times the seller's listings displayed on the seller's store.
     * The listing might not have been visible due to its position on the page.
     *
     * Localized name: Listing impressions from your Store
     */
    case LISTING_IMPRESSION_STORE = 'LISTING_IMPRESSION_STORE';

    /**
     * The total number of times the seller's listings displayed on the search results page
     * or in the seller's store.
     *
     * This value equals:
     * LISTING_IMPRESSION_SEARCH_RESULTS_PAGE + LISTING_IMPRESSION_STORE
     *
     * Localized name: Total listing impressions
     *
     * Note: Use TOTAL_IMPRESSION_TOTAL to retrieve impressions across all pages and flows.
     */
    case LISTING_IMPRESSION_TOTAL = 'LISTING_IMPRESSION_TOTAL';

    /**
     * The number of times a View Item page was directly accessed, such as via a bookmark.
     * This metric supports a two-year query range.
     *
     * Localized name: Direct views
     */
    case LISTING_VIEWS_SOURCE_DIRECT = 'LISTING_VIEWS_SOURCE_DIRECT';

    /**
     * The number of times a View Item page was accessed via a site other than eBay.
     *
     * Localized name: Off eBay views
     */
    case LISTING_VIEWS_SOURCE_OFF_EBAY = 'LISTING_VIEWS_SOURCE_OFF_EBAY';

    /**
     * The number of times a View Item page was accessed from an eBay page that is not
     * the search results page or the seller's store.
     *
     * Localized name: Views from non-search and non-store pages within eBay
     */
    case LISTING_VIEWS_SOURCE_OTHER_EBAY = 'LISTING_VIEWS_SOURCE_OTHER_EBAY';

    /**
     * The number of times the item displayed on the search results page.
     *
     * Localized name: Views on the search results page
     */
    case LISTING_VIEWS_SOURCE_SEARCH_RESULTS_PAGE = 'LISTING_VIEWS_SOURCE_SEARCH_RESULTS_PAGE';

    /**
     * The number of times a View Item page was accessed via the seller's store.
     *
     * Localized name: Views from your Store
     */
    case LISTING_VIEWS_SOURCE_STORE = 'LISTING_VIEWS_SOURCE_STORE';

    /**
     * The total number of listing views.
     *
     * This value equals the sum of all listing view sources.
     *
     * Localized name: Total views
     */
    case LISTING_VIEWS_TOTAL = 'LISTING_VIEWS_TOTAL';

    /**
     * The number of completed transactions divided by the number of View Item page views.
     *
     * TRANSACTION / LISTING_VIEWS_TOTAL
     *
     * Note: Sorting on this metric is not supported.
     *
     * Localized name: Sales conversion rate
     */
    case SALES_CONVERSION_RATE = 'SALES_CONVERSION_RATE';

    /**
     * The total number of times the seller's listings displayed on any page or flow.
     * This value matches the Seller Hub performance/traffic page.
     *
     * Note: If values do not match Seller Hub, ensure the correct time zone is set.
     *
     * Localized name: Total impressions
     */
    case TOTAL_IMPRESSION_TOTAL = 'TOTAL_IMPRESSION_TOTAL';

    /**
     * The total number of completed transactions.
     *
     * Note: Sorting is only supported in descending order.
     *
     * Localized name: Transaction count
     */
    case TRANSACTION = 'TRANSACTION';
}
