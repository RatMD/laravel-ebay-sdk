# TrafficReportMetric Enum <DocsBadge path="sell/static/performance/traffic-report.html#metric-parameters" />

To specify different metrics returned in the report, specify one or more metrics in a comma-separated
list. 

| Value           | Description           |
| --------------- | --------------------- |
| `CLICK_THROUGH_RATE` | The number of times an item displays on the search results page divided by the number of times buyers clicked through to its View Item page. Localized name: Click through rate. |
| `LISTING_IMPRESSION_SEARCH_RESULTS_PAGE` | The number of times the seller's listings displayed on the search results page. The listing might not have been visible to the buyer due to its position on the page. Localized name: Listing impressions from the search results page. |
| `LISTING_IMPRESSION_STORE` | The number of times the seller's listings displayed on the seller's store. The listing might not have been visible to the buyer due to its position on the page. Localized name: Listing impressions from your Store. |
| `LISTING_IMPRESSION_TOTAL` | The total number of times the seller's listings displayed on the search results page or in the seller's store. Each display is counted, even if not visible. This value equals LISTING_IMPRESSION_SEARCH_RESULTS_PAGE + LISTING_IMPRESSION_STORE. Localized name: Total listing impressions. Note: Use TOTAL_IMPRESSION_TOTAL to retrieve impressions across all pages and flows. |
| `LISTING_VIEWS_SOURCE_DIRECT` | The number of times a View Item page was directly accessed, such as via a bookmark. This metric supports a two-year query range. Localized name: Direct views. |
| `LISTING_VIEWS_SOURCE_OFF_EBAY` | The number of times a View Item page was accessed via a site other than eBay, such as a search engine. Localized name: Off eBay views. |
| `LISTING_VIEWS_SOURCE_OTHER_EBAY` | The number of times a View Item page was accessed from an eBay page that is not the search results page or the seller's store. Localized name: Views from non-search and non-store pages within eBay. |
| `LISTING_VIEWS_SOURCE_SEARCH_RESULTS_PAGE` | The number of times the item displayed on the search results page. Localized name: Views on the search results page. |
| `LISTING_VIEWS_SOURCE_STORE` | The number of times a View Item page was accessed via the seller's store. Localized name: Views from your Store. |
| `LISTING_VIEWS_TOTAL` | The total number of listing views. This value equals the sum of direct, off eBay, other eBay, search results page, and store views. Localized name: Total views. |
| `SALES_CONVERSION_RATE` | The number of completed transactions divided by the number of View Item page views (TRANSACTION / LISTING_VIEWS_TOTAL). Sorting on this metric is not supported. Localized name: Sales conversion rate. |
| `TOTAL_IMPRESSION_TOTAL` | The total number of times the seller's listings displayed on any page or flow. This value matches the Seller Hub performance/traffic page and includes LISTING_IMPRESSION_TOTAL plus all other impressions. Note: If values do not match Seller Hub, ensure the correct time zone is set in the date range filter. Localized name: Total impressions. |
| `TRANSACTION` | The total number of completed transactions. Sorting is only supported in descending order. Localized name: Transaction count. |

## Example

```php
use Rat\eBaySDK\Enums\TrafficReportMetric;

TrafficReportMetric::TRANSACTION;
```