# ChargeType Enum <DocsBadge path="sell/fulfillment/types/sol:ChargeTypeEnum" />

This enumeration type contains the type of charges that may be returned under the charges array.

| Value              | Description                        |
| ------------------ | ---------------------------------- |
| `BUYER_PROTECTION` | This enumeration value indicates that the buyer was charged a Buyer Protection fee. This fee applies only when a buyer purchases an item from a private seller on the eBay UK marketplace and includes both the fee and applicable tax against the fee. |

## Example

```php
use Rat\eBaySDK\Enums\ChargeType;

ChargeType::BUYER_PROTECTION;
```
