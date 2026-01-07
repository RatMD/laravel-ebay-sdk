# AuthenticityVerificationReason Enum <DocsBadge path="sell/fulfillment/types/sel:AuthenticityVerificationReasonEnum" />

This enumerated type lists the possible outcomes of an authentication verification inspection on an 
order line item.

| Value                     | Description                        |
| ------------------------- | ---------------------------------- |
| `NOT_AUTHENTIC`           | This enumerated value indicates that the order line item could not be authenticated. This means that the order line item has failed the authenticity verification inspection. |
| `NOT_AS_DESCRIBED`        | This enumeration value indicates that the order line item is not as described. This means that the order line item has failed the authenticity verification inspection because the order line item does not match the order line item's description. |
| `CUSTOMIZED`              | This enumeration value indicates that the order line item is customized and will be sent to the buyer. This means that the order line item has been altered or customized, and cannot be labeled as authentic. |
| `MISCATEGORIZED`          | This enumeration value indicates that the order line item is miscategorized and will be sent to the buyer. This means that the item was in the wrong eBay category, and cannot be labeled as authentic. |
| `NOT_AUTHENTIC_NO_RETURN` | This enumeration value indicates that the order line item was found as counterfeit and cannot be returned to the seller because of legal constraints. |

## Example

```php
use Rat\eBaySDK\Enums\AuthenticityVerificationReason;

AuthenticityVerificationReason::NOT_AUTHENTIC;
```
