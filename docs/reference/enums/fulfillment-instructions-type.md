# FulfillmentInstructionsType Enum <DocsBadge path="sell/fulfillment/types/sel:FulfillmentInstructionsType" />

This enumerated type lists the available methods of fulfillment for a set of line items.

| Value                | Description                        |
| -------------------- | ---------------------------------- |
| `DIGITAL`            | This enumeration value indicates the order contains one or more digital gift card line items that are sent to the recipient by email. |
| `PREPARE_FOR_PICKUP` | This enumeration value indicates that the order is an In-Store Pickup order or a Click and Collect order. If this value is returned for an In-Store Pickup order, the seller can look at the pickupStep container to see the specific store where the buyer will pick up the order. If this value is returned for a Click and Collect order, the seller will look at the shippingStep container to see which store the buyer will pick up the item. The seller is then responsible for shipping the order to that store location. |
| `SELLER_DEFINED`     | This enumeration value indicates that the seller will determine how to deliver these line items to the buyer. |
| `SHIP_TO`            | This enumeration value indicates that the seller will package and ship these line items. If this value is returned, the seller can look at the shippingStep container to see the specific shipping details, including the shipping address and the shipping service option that will be used. |
| `FULFILLED_BY_EBAY`  | This enumeration value indicates that eBay will package and ship an order as specified by fulfillmentType. |

## Example

```php
use Rat\eBaySDK\Enums\FulfillmentInstructionsType;

FulfillmentInstructionsType::DIGITAL;
```
