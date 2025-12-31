# ReportType Enum <DocsBadge path="sell/marketing/types/plr:ReportTypeEnum" />

An enum that defines the type of reports you can generate.

> [!NOTE]
> For details about which report types can be used for Promoted Listings general strategy ad 
> campaigns or Promoted Listings priority strategy ad campaigns, see 
> [Promoted Listings reporting](https://developer.ebay.com/api-docs/sell/static/marketing/pl-reports.html).

| Value           | Description           |
| --------------- | --------------------- |
| `ACCOUNT_PERFORMANCE_REPORT` | This enum value indicates that the report is based on the account performance. This report offers a daily view of the seller's Promoted Listings performance. |
| `ALL_CAMPAIGN_PERFORMANCE_SUMMARY_REPORT` | This enum value indicates that the report is based on campaign performance. This report provides performance data for all of a seller's campaigns. |
| `CAMPAIGN_PERFORMANCE_REPORT` | This enum value indicates that the report is a detailed item-based campaign performance report. This report offers an item-level view of the performance of specific ad campaigns. |
| `CAMPAIGN_PERFORMANCE_SUMMARY_REPORT` | This enum value indicates that the report is a summary campaign performance report. This report offers a daily summary view of the performance of specific ad campaigns. |
| `INVENTORY_PERFORMANCE_REPORT` | This enum value indicates that the report is an inventory performance report. This report offers a listing view of the performance of all the seller's Promoted Listings. Note: The Inventory Performance Summary report is not currently available; availability date is pending. |
| `LISTING_PERFORMANCE_REPORT` | This enum value indicates that the report is based on listings. This report offers a daily view of the performance of each listing. |
| `KEYWORD_PERFORMANCE_REPORT` | This enum value indicates that the report is a keyword performance report. This report provides keyword performance data for a specific campaign. |
| `TRANSACTION_REPORT` | This enum value indicates that the report is a transaction report. This report provides transaction-level details to sellers for both general strategy ad campaigns or priority strategy ad campaigns. |
| `SEARCH_QUERY_PERFORMANCE_REPORT` | This enum value indicates that the report is a search query performance report. This report offers details that help sellers understand buyer search patterns and behaviors, including which search queries led to impressions, clicks, or sales. This data can be used to choose more relevant keywords and negative keywords. |

## Example

```php
use Rat\eBaySDK\Enums\ReportType;

ReportType::ACCOUNT_PERFORMANCE_REPORT;
```
