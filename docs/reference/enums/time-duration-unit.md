# TimeDurationUnit Enum <DocsBadge path="ell/inventory/types/slr:TimeDurationUnitEnum" />

This enumeration type is used by the fulfillmentTime field of the PickupAtLocationAvailability type 
to specify the time unit that is used to indicate the fulfillment time, which is how soon an 
In-Store Pickup order will be ready for pickup at the store identified in the corresponding 
merchantLocationKey field. Typically, the unit value will be HOUR.

| Value          | Description                        |
| -------------- | ---------------------------------- |
| `YEAR`         | Time duration is based on a number of years. |
| `MONTH`        | Time duration is based on a number of months |
| `DAY`          | Time duration is based on a number of days. |
| `HOUR`         | Time duration is based on a number of hours. |
| `CALENDAR_DAY` | Time duration is based on a number of calendar days, including Saturday and Sunday. This time duration does not exclude holidays. |
| `BUSINESS_DAY` | Time duration is based on a number of business days, or 'working days' (normally Monday through Friday). This excludes Sunday and all holidays in the time duration and, depending on the location, can include or exclude Saturday. |
| `MINUTE`       | Time duration is based on a number of minutes. |
| `SECOND`       | Time duration is based on a number of seconds. |
| `MILLISECOND`  | Time duration is based on a number of milliseconds. |

## Example

```php
use Rat\eBaySDK\Enums\TimeDurationUnit;

TimeDurationUnit::YEAR;
```
