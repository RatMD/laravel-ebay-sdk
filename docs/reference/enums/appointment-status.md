# AppointmentStatus Enum <DocsBadge path="sell/fulfillment/types/sel:AppointmentStatusEnum" />

An enumerated type for the appointment status of tire installation values.

| Value       | Description                                        |
| ----------- | -------------------------------------------------- |
| `ON_HOLD`   | The appointment is on hold.                        |
| `CONFIRMED` | The appointment has been confirmed.                |
| `CANCELLED` | The appointment has been canceled by the customer. |
| `FULFILLED` | The appointment has been completed.                |

## Example

```php
use Rat\eBaySDK\Enums\AppointmentStatus;

AppointmentStatus::ON_HOLD;
```
