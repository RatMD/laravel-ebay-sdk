# AvailabilityType Enum <DocsBadge path="sell/inventory/types/slr:AvailabilityTypeEnum" />

This enumeration type is used to indicate whether an inventory item has quantity available for 
purchase at the merchant's store indicated in the pickupAtLocationAvailability.merchantLocationKey 
field. This type is only applicable to inventory available for In-Store Pickup orders.

| Value           | Description                        |
| --------------- | ---------------------------------- |
| `IN_STOCK`      | This enumeration value indicates that the inventory item has quantity available for purchase at the merchant's store indicated in the pickupAtLocationAvailability.merchantLocationKey field. The quantity available for purchase is shown in the pickupAtLocationAvailability.quantity field. If the product is "In Stock", the corresponding pickupAtLocationAvailability.Quantity value should be an integer value greater than 0. |
| `OUT_OF_STOCK`  | This enumeration value indicates that the inventory item is out of stock at the merchant's store indicated in the pickupAtLocationAvailability.merchantLocationKey field. If the product is "Out of Stock", the corresponding pickupAtLocationAvailability.Quantity value should be 0. |
| `SHIP_TO_STORE` | This enumeration value indicates that the merchant's store (indicated in the pickupAtLocationAvailability.merchantLocationKey field) is temporarily out of stock of the product, but some inventory of the product is being shipped from a warehouse to that store. The quantity being shipped is shown in the pickupAtLocationAvailability.quantity field, and this value should be an integer value greater than 0. |

## Example

```php
use Rat\eBaySDK\Enums\AvailabilityType;

AvailabilityType::IN_STOCK;
```
