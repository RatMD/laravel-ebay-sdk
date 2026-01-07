# LineItemFulfillmentStatus Enum <DocsBadge path="sell/fulfillment/types/sel:LineItemFulfillmentStatusEnum" />

The current status of all activity required to complete fulfillment of a line item.

| Value         | Description                        |
| ------------- | ---------------------------------- |
| `FULFILLED`   | The line item has been processed, packaged, and shipped. Note: A line item is considered fulfilled as soon as any one unit or component of the line item is assigned to a fulfillment. |
| `IN_PROGRESS` | Applies only to orders with more than one line item. Indicates the seller has begun packaging and shipping one or more line items from the order, but not all line items have been shipped. |
| `NOT_STARTED` | The seller has not yet begun packaging the line item. |

## Example

```php
use Rat\eBaySDK\Enums\LineItemFulfillmentStatus;

LineItemFulfillmentStatus::FULFILLED;
```
