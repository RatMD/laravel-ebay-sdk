# ListingFormat Enum <DocsBadge path="sell/inventory/types/slr:FormatTypeEnum" />

This enumeration type is used to indicate the listing format of the offer.

> [!NOTE]
> When creating an auction offer, one of the available quantities for the inventory item are 
> reserved for the auction offer. If the offer ends without a bid, the allocated quantity will be 
> released and available for fixed-price offers.

| Value         | Description                                                   |
| ------------- | ------------------------------------------------------------- |
| `AUCTION`     | This enumeration value indicates an AUCTION buying option.    |
| `FIXED_PRICE` | This enumeration value indicates a FIXED_PRICE buying option. |

## Example

```php
use Rat\eBaySDK\Enums\ListingFormat;

ListingFormat::FIXED_PRICE;
```
