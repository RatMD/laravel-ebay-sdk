# CancelState Enum <DocsBadge path="sell/fulfillment/types/sel:CancelStateEnum" />

This type contains information about any requests that have been made to cancel an order.

| Value            | Description                                                         |
| ---------------- | ------------------------------------------------------------------- |
| `CANCELED`       | The order has been cancelled.                                       |
| `IN_PROGRESS`    | One or more cancellation requests have been made against the order. |
| `NONE_REQUESTED` | No cancellation requests have been made against the order.          |

## Example

```php
use Rat\eBaySDK\Enums\CancelState;

CancelState::CANCELED;
```
