# FormatType Enum <DocsBadge path="sell/inventory/types/slr:FormatTypeEnum" />

This enumeration type is used to indicate the listing format of the offer.

> [!NOTE]
> When creating an auction offer, one of the available quantities for the inventory item are 
> reserved for the auction offer. If the offer ends without a bid, the allocated quantity will be 
> released and available for fixed-price offers.

| Value         | Description                                                                           |
| ------------- | ------------------------------------------------------------------------------------- |
| `AUCTION`     | This enumeration value indicates that the listing format of the offer is auction.     |
| `FIXED_PRICE` | This enumeration value indicates that the listing format of the offer is fixed-price. |

## Example

```php
use Rat\eBaySDK\Enums\FormatType;

FormatType::AUCTION;
```
