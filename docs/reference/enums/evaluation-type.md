# EvaluationType Enum <DocsBadge path="sell/analytics/types/api:EvaluationTypeEnum" />

This enum type defines the different available values for the type of evaluation you want to retrieve.

| Value       | Description                                                                                                                                     |
| ----------- | ----------------------------------------------------------------------------------------------------------------------------------------------- |
| `CURRENT`   | This is a monthly evaluation that occurs on 20th of every month.                                                                                |
| `PROJECTED` | This is a daily evaluation that provides a projection of how the seller is currently performing with regards to the upcoming evaluation period. |

## Example

```php
use Rat\eBaySDK\Enums\EvaluationType;

EvaluationType::CURRENT;
```
