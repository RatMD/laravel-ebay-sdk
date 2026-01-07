# SoldOn Enum <DocsBadge path="sell/inventory/types/slr:SoldOnEnum" />

eBay sites (by the country in which each resides) on which a user is registered and on which items 
can be listed through the Trading API.


| Value             | Description                                                   |
| ----------------- | ------------------------------------------------------------- |
| `ON_EBAY`         | This enumeration value indicates that the product was sold for the price in the originalRetailPrice field on an eBay site.                 |
| `OFF_EBAY`        | This enumeration value indicates that the product was sold for the originalRetailPrice through a third-party retailer.                     |
| `ON_AND_OFF_EBAY` | This enumeration value indicates that the product was sold for the originalRetailPrice on an eBay site and through a third-party retailer. |

## Example

```php
use Rat\eBaySDK\Enums\SoldOn;

SoldOn::ON_AND_OFF_EBAY;
```
