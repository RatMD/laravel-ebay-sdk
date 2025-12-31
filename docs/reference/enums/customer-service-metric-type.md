# CustomerServiceMetricType Enum <DocsBadge path="sell/feed/types/api:CustomerServiceMetricTypeEnum" />

This enumerated type lists the Customer Service Metric types that are available for Customer Service 
Metric reports generated with Feed API.

| Value                   | Description                                                              |
| ----------------------- | ------------------------------------------------------------------------ |
| `ITEM_NOT_AS_DESCRIBED` | The metric rating is based on Item not as described (SNAD) transactions. |
| `ITEM_NOT_RECEIVED`     | The metric rating is based on Item not received (INR) transactions.      |

## Example

```php
use Rat\eBaySDK\Enums\CustomerServiceMetricType;

CustomerServiceMetricType::ITEM_NOT_AS_DESCRIBED;
```