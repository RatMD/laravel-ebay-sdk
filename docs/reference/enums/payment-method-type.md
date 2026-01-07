# PaymentMethodType Enum <DocsBadge path="sell/fulfillment/types/sel:PaymentMethodTypeEnum" />

This enumerated type contains the payment methods that a buyer may use for order payment.

| Value            | Description                        |
| ---------------- | ---------------------------------- |
| `CREDIT_CARD`    | This enumeration value indicates that the buyer used a credit card to pay for the order. |
| `PAYPAL`         | This enumeration value indicates that the buyer used PayPal to pay for the order. Note: This value should no longer be returned, as eBay manages all online payments from buyers. When eBay does handle the online payment from the buyer, the EBAY value will be returned instead. |
| `CASHIER_CHECK`  | This enumeration value indicates that the buyer used a cashier's check to pay for the order. This form of payment can only be used for payment transactions off of eBay's platform, and this value will only appear if the seller updates the completed order with the payment details. |
| `PERSONAL_CHECK` | This enumeration value indicates that the buyer used a personal check to pay for the order. This form of payment can only be used for payment transactions off of eBay's platform, and this value will only appear if the seller updates the completed order with the payment details. |
| `CASH_ON_PICKUP` | This enumeration value indicates that the buyer used cash to pay for the order. This form of payment can only be used for payment transactions off of eBay's platform, and this value will only appear if the seller updates the completed order with the payment details. |
| `EFT`            | This enumeration value indicates that the buyer used an Electronic Funds Transfer (EFT) to pay for the order. This form of payment can only be used for payment transactions off of eBay's platform, and this value will only appear if the seller updates the completed order with the payment details. |
| `EBAY`           | This enumeration value is returned whenever eBay handles the online payment from the buyer. |
| `ESCROW`         | This enumeration value indicates that the buyer used Escrow to pay for the order. This form of payment is used for high-value orders. |

## Example

```php
use Rat\eBaySDK\Enums\PaymentMethodType;

PaymentMethodType::CREDIT_CARD;
```
