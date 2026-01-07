# CancelRequestState Enum <DocsBadge path="sell/fulfillment/types/sel:CancelRequestStateEnum" />

This enumeration type defines the possible status of a order cancellation request.

| Value       | Description                        |
| ----------- | ---------------------------------- |
| `COMPLETED` | This enumeration value indicates that the order cancellation request was successfully processed and completed. |
| `REJECTED`  | This enumeration value indicates that the buyer's request to cancel the order has been rejected by the seller. |
| `REQUESTED` | This enumeration value indicates that the buyer has requested that a particular order be cancelled, but the seller has yet to accept or reject the cancellation request. |

## Example

```php
use Rat\eBaySDK\Enums\CancelRequestState;

CancelRequestState::COMPLETED;
```
