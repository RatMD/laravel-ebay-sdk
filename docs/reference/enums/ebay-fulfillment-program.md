# EbayFulfillmentProgram Enum <DocsBadge path="sell/fulfillment/types/sel:EbayFulfillmentProgram" />

This type is used to provide details about an order line item being fulfilled by eBay or an eBay
fulfillment partner.

| Value         | Description                        |
| ------------- | ---------------------------------- |
| `fulfilledBy` | The value returned in this field indicates the party that is handling fulfillment of the order line item. Valid value: EBAY |

## Example

```php
use Rat\eBaySDK\Enums\EbayFulfillmentProgram;

EbayFulfillmentProgram::fulfilledBy;
```
