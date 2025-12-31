# CycleType Enum <DocsBadge path="sell/analytics/types/ssp:CycleTypeEnum" />

An enum that defines the allowable cycle types.

| Value       | Description                                                                                                                         |
| ----------- | ----------------------------------------------------------------------------------------------------------------------------------- |
| `CURRENT`   | Indicates the evaluation that determines your currently effective seller level.                                                     |
| `PROJECTED` | Indicates the seller's profile level that will take effect on the next evaluation period, as calculated at the time of the request. |

## Example

```php
use Rat\eBaySDK\Enums\CycleType;

CycleType::CURRENT;
```
