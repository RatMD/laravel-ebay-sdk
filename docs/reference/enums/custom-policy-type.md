# CustomPolicyType Enum <DocsBadge path="sell/account/types/api:CustomPolicyTypeEnum" />

An enumeration type that defines the supported types of Custom Policies.

| Value                | Description                                                                             |
| -------------------- | --------------------------------------------------------------------------------------- |
| `PRODUCT_COMPLIANCE` | This enumeration value indicates that the custom policy is a product compliance policy. |
| `TAKE_BACK`          | This enumeration value indicates that the custom policy is a product takeback policy.   |

## Example

```php
use Rat\eBaySDK\Enums\CustomPolicyType;

CustomPolicyType::PRODUCT_COMPLIANCE;
```