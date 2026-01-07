# EbayVaultFulfillmentType Enum <DocsBadge path="sell/fulfillment/types/sel:EbayVaultFulfillmentTypeEnum" />

This enumeration type specifies which EbayVaultProgram has been selected for an order.

| Value             | Description                        |
| ----------------- | ---------------------------------- |
| `SELLER_TO_VAULT` | This enumeration type indicates that the seller will ship the order to an authenticator. When using this program, fulfillmentInstructionsType will be set to SHIP_TO and the order will be shipped to the authenticator's shipping address. |
| `VAULT_TO_VAULT`  | This enumeration type indicates that eBay will ship the order from an eBay vault to the buyer's vault. |
| `VAULT_TO_BUYER`  | This enumeration type indicates that eBay will ship the order from an eBay vault to the shipping address provided by the buyer. |

## Example

```php
use Rat\eBaySDK\Enums\EbayVaultFulfillmentType;

EbayVaultFulfillmentType::SELLER_TO_VAULT;
```
