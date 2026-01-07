# WeightUnitOfMeasure Enum <DocsBadge path="sell/inventory/types/slr:WeightUnitOfMeasureEnum" />

This enumerated type is used to indicate what unit of measurement is used to measure the weight of a 
shipping package. The weight and dimensions of a shipping package are generally required when 
calculated shipping rates are used, and weight is required if flat-rate shipping is used, but the 
seller is charging a weight surcharge.

| Value      | Description                        |
| ---------- | ---------------------------------- |
| `POUND`    | This enumeration value indicates that the unit of measurement used for measuring the weight of the shipping package is pounds. |
| `KILOGRAM` | This enumeration value indicates that the unit of measurement used for measuring the weight of the shipping package is kilograms. |
| `OUNCE`    | This enumeration value indicates that the unit of measurement used for measuring the weight of the shipping package is ounces. |
| `GRAM`     | This enumeration value indicates that the unit of measurement used for measuring the weight of the shipping package is grams. |

## Example

```php
use Rat\eBaySDK\Enums\WeightUnitOfMeasure;

WeightUnitOfMeasure::KILOGRAM;
```
