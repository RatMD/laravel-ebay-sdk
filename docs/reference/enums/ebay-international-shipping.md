# EbayInternationalShipping Enum <DocsBadge path="sell/fulfillment/types/sel:EbayInternationalShipping" />

This type is used to provide details about an order line item being managed through eBay
International Shipping.

| Value              | Description                        |
| ------------------ | ---------------------------------- |
| `returnsManagedBy` | The value returned in this field indicates the party that is responsible for managing returns of the order line item. Valid value: EBAY |

## Example

```php
use Rat\eBaySDK\Enums\EbayInternationalShipping;

EbayInternationalShipping::returnsManagedBy;
```
