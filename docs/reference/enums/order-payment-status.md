# OrderPaymentStatus Enum <DocsBadge path="sell/fulfillment/types/sel:OrderPaymentStatusEnum" />

This enumeration type contains the possible payment states of an order, or in case of a refund 
request, the possible states of a buyer refund.

| Value                | Description                        |
| -------------------- | ---------------------------------- |
| `FAILED`             | This enumeration value indicates that buyer payment or refund has failed. |
| `FULLY_REFUNDED`     | This enumeration value indicates that the full amount of the order has been refunded to the buyer. This value is only applicable to return requests or order cancellations. |
| `PAID`               | This enumeration value indicates that the order has been paid in full. Once this PAID value is returned in an order management call, it is safe for the seller to ship the order to the buyer. |
| `PARTIALLY_REFUNDED` | This enumeration value indicates that a partial amount of the order has been refunded to the buyer. |
| `PENDING`            | This enumeration value indicates that buyer payment or a refund from the seller is in the pending state. |

## Example

```php
use Rat\eBaySDK\Enums\OrderPaymentStatus;

OrderPaymentStatus::FAILED;
```
