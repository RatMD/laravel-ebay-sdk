# ProgramType Enum <DocsBadge path="sell/account/types/api:ProgramTypeEnum" />

An enumerated type defining the supported seller programs.

| Value           | Description           |
| --------------- | --------------------- |
| `OUT_OF_STOCK_CONTROL` | If a seller's account is opted in to the out-of-stock control program, active fixed-price listings will be kept 'alive' (but not surfaced in search results) even when the quantity for the listing has been depleted to 0. This feature allows the seller to update/revise the listing with more quantity, and prevents the seller from having to relist the item. |
| `PARTNER_MOTORS_DEALER` | The Partner Motors Program that sellers can participate in by opting-in to the program. Sellers must be registered business users to opt-in to this program. |
| `SELLING_POLICY_MANAGEMENT` | If a seller's account is opted in to this program, sellers can associate business policies (payment, return policy, fulfillment) to their listings. Being opted in to business policies is a requirement for using the Inventory API. |

## Example

```php
use Rat\eBaySDK\Enums\ProgramType;

ProgramType::OUT_OF_STOCK_CONTROL;
```
