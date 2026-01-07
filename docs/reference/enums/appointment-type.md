# AppointmentType Enum <DocsBadge path="sell/fulfillment/types/sel:AppointmentTypeEnum" />

An enumerated type for appointment values.

| Value       | Description                        |
| ----------- | ---------------------------------- |
| `TIME_SLOT` | Indicates this appointment has both start and end date-time. |
| `MACRO`     | Indicates this appointment has both start date-time (appointmentStartTime) and may have a service provider appointment date (serviceProviderAppointmentDate). |

## Example

```php
use Rat\eBaySDK\Enums\AppointmentType;

AppointmentType::TIME_SLOT;
```
