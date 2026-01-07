# PaymentStatus Enum <DocsBadge path="sell/fulfillment/types/sel:PaymentStatusEnum" />

This enumerated type defines all possible order payment states.

| Value     | Description                        |
| --------- | ---------------------------------- |
| `FAILED`  | This enumeration value indicates that the buyer attempted to pay for the order, but the payment has failed. |
| `PAID`    | This enumeration value indicates that the item has been paid in full. Once this PAID value is returned in an order management call, it is safe for the seller to ship the item to the buyer. |
| `PENDING` | This enumeration value indicates that payment on the order is still in the pending state, and has not completed. |

## Example

```php
use Rat\eBaySDK\Enums\PaymentStatus;

PaymentStatus::FAILED;
```
