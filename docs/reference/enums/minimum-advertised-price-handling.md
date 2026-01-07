# MinimumAdvertisedPriceHandling Enum <DocsBadge path="sell/inventory/types/slr:MinimumAdvertisedPriceHandlingEnum" />

This type is used to control how/when the Minimum Advertised Price is shown for an offer. The 
Minimum Advertised Price (MAP) feature is only available on the US site.

| Value             | Description                                                   |
| ----------------- | ------------------------------------------------------------- |
| `NONE`            | This enumeration value is used if the seller does not wish to include the Minimum Advertised Price in the offer. |
| `PRE_CHECKOUT`    | This enumeration value is used if the seller wish to display the Minimum Advertised Price to prospective buyers prior to checkout. |
| `DURING_CHECKOUT` | This enumeration value is used if the seller wish to display the Minimum Advertised Price after the buyer already commits to buy the item. |

## Example

```php
use Rat\eBaySDK\Enums\MinimumAdvertisedPriceHandling;

MinimumAdvertisedPriceHandling::NONE;
```
