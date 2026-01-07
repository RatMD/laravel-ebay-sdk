# LengthUnitOfMeasure Enum <DocsBadge path="sell/inventory/types/slr:LengthUnitOfMeasureEnum" />

This enumeration type is used to specify/indicate the unit of measurement with which the dimensions 
of the shipping package are being measured.

| Value        | Description                        |
| ------------ | ---------------------------------- |
| `INCH`       | This enumeration value indicates that the dimensions of the shipping package is being measured in inches. |
| `FEET`       | This enumeration value indicates that the dimensions of the shipping package is being measured in feet. |
| `CENTIMETER` | This enumeration value indicates that the dimensions of the shipping package is being measured in centimeters. |
| `METER`      | This enumeration value indicates that the dimensions of the shipping package is being measured in meters. |

## Example

```php
use Rat\eBaySDK\Enums\LengthUnitOfMeasure;

LengthUnitOfMeasure::CENTIMETER;
```
