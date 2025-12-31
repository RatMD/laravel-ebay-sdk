# CategoryType Enum <DocsBadge path="sell/account/types/api:CategoryTypeEnum" />

An enum type that describes the category type (motor vehicles or non-motor vehicles).

| Value                           | Description                                                                                   |
| ------------------------------- | --------------------------------------------------------------------------------------------- |
| `MOTORS_VEHICLES`               | Indicates that the business policy applies **only to motor vehicle listings**.                |
| `ALL_EXCLUDING_MOTORS_VEHICLES` | Indicates that the business policy applies to **all listings except motor vehicle listings**. |

## Example

```php
use Rat\eBaySDK\Enums\CategoryType;

CategoryType::MOTORS_VEHICLES;
```