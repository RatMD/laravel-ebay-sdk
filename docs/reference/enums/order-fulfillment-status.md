# OrderFulfillmentStatus Enum <DocsBadge path="sell/fulfillment/types/sel:OrderFulfillmentStatus" />

The current status of all activity required to complete fulfillment of an order.

| Value         | Description                        |
| ------------- | ---------------------------------- |
| `FULFILLED`   | The entire order has been shipped. Note: When any quantity of a line item is assigned to a fulfillment, that line item is marked as FULFILLED, even if the total quantity of the line item has not yet shipped. |
| `IN_PROGRESS` | Applies only to orders with more than one line item. Indicates the seller has begun packaging and shipping line items from the order, but not all line items have been shipped. |
| `NOT_STARTED` | The seller has not yet begun packaging any line items from the order. |

## Example

```php
use Rat\eBaySDK\Enums\OrderFulfillmentStatus;

OrderFulfillmentStatus::FULFILLED;
```
