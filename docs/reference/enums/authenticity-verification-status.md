# AuthenticityVerificationStatus Enum <DocsBadge path="sell/fulfillment/types/sel:AuthenticityVerificationStatusEnum" />

This enumerated type defines all possible statuses of an order line item going through an 
authenticity verification inspection.

| Value                   | Description                        |
| ----------------------- | ---------------------------------- |
| `PENDING`               | This enumerated value indicates that the authentication status is PENDING. The item's authenticity is still unknown. |
| `PASSED`                | This enumerated value indicates that the authentication status has PASSED. The item is authentic. |
| `FAILED`                | This enumerated value indicates that the authentication has FAILED. The items's authenticity could not be verified. |
| `PASSED_WITH_EXCEPTION` | This enumerated value indicates that the authentication status has PASSED_WITH_EXCEPTION. There may be legal reasons or requirements such that the item cannot be labeled authentic. |

## Example

```php
use Rat\eBaySDK\Enums\AuthenticityVerificationStatus;

AuthenticityVerificationStatus::PENDING;
```
