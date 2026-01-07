# ShippingServiceType Enum <DocsBadge path="sell/inventory/types/slr:ShippingServiceTypeEnum" />

This enumeration type is used to specify/indicate whether the shipping service option whose shipping 
costs will be overridden is a domestic or an international shipping service.

| Value           | Description                                                   |
| --------------- | ------------------------------------------------------------- |
| `DOMESTIC`      | This enumeration value indicates that the shipping service option whose shipping costs will be overridden is a domestic shipping service. |
| `INTERNATIONAL` | This enumeration value indicates that the shipping service option whose shipping costs will be overridden is an international shipping service. |

## Example

```php
use Rat\eBaySDK\Enums\ShippingServiceType;

ShippingServiceType::DOMESTIC;
```
