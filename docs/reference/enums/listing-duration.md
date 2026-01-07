# ListingDuration Enum <DocsBadge path="sell/inventory/types/slr:ListingDurationEnum" />

This enumerated type defines listing duration periods.

> [!NOTE]
> The GTC value is valid and applicable only to fixed-price listings; the DAYS_nn values are 
> applicable to auction listings.

| Value     | Description                                                   |
| --------- | ------------------------------------------------------------- |
| `DAYS_1`  | This enum value indicates that the auction listing offer is valid for 1 day, after which time unsold inventory will move to the common pool that is shared between active fixed-price listings and new offers. |
| `DAYS_3`  | This enum value indicates that the auction listing offer is valid for 3 days, after which time unsold inventory will move to the common pool that is shared between active fixed-price listings and new offers. |
| `DAYS_5`  | This enum value indicates that the auction listing offer is valid for 5 days, after which time unsold inventory will move to the common pool that is shared between active fixed-price listings and new offers. |
| `DAYS_7`  | This enum value indicates that the auction listing offer is valid for 7 days, after which time unsold inventory will move to the common pool that is shared between active fixed-price listings and new offers. |
| `DAYS_10` | This enum value indicates that the auction listing offer is valid for 10 days, after which time unsold inventory will move to the common pool that is shared between active fixed-price listings and new offers. |
| `DAYS_21` | This enum value indicates that the auction listing offer is valid for 21 days, after which time unsold inventory will move to the common pool that is shared between active fixed-price listings and new offers. |
| `DAYS_30` | This enum value indicates that the auction listing offer is valid for 30 days, after which time unsold inventory will move to the common pool that is shared between active fixed-price listings and new offers. |
| `GTC`     | This enum value indicates that the listing is a fixed-price offer. 'GTC' stands for *Good 'Til Cancelled*, which means that a fixed-price listing will remain active until the seller cancels/ends the listing. 'GTC' listings are automatically renewed every calendar month. For example, if a GTC listing is created July 5, the next monthly renewal date will be August 5. If a GTC listing is created on the 31st of the month, but the following month only has 30 days, the renewal will happen on the 30th in the following month. Finally, if a GTC listing is created on January 29-31, the renewal will happen on February 28th (or 29th during a 'Leap Year'). **Note**: The GTC value is currently the only supported listing duration for fixed-price listings. |

## Example

```php
use Rat\eBaySDK\Enums\ListingDuration;

ListingDuration::GTC;
```
