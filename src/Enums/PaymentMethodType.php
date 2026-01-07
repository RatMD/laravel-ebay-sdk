<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:PaymentMethodTypeEnum
 */
enum PaymentMethodType: string
{
    /**
     * This enumeration value indicates that the buyer used a credit card to pay for the order.
     */
    case CREDIT_CARD = "CREDIT_CARD";

    /**
     * This enumeration value indicates that the buyer used PayPal to pay for the order.
     *
     *
     * Note: This value should no longer be returned, as eBay manages all online payments
     * from buyers. When eBay does handle the online payment from the buyer, the EBAY value will be
     * returned instead.
     */
    case PAYPAL = "PAYPAL";

    /**
     * This enumeration value indicates that the buyer used a cashier's check to pay for the order.
     * This form of payment can only be used for payment transactions off of eBay's platform, and
     * this value will only appear if the seller updates the completed order with the payment
     * details.
     */
    case CASHIER_CHECK = "CASHIER_CHECK";

    /**
     * This enumeration value indicates that the buyer used a personal check to pay for the order.
     * This form of payment can only be used for payment transactions off of eBay's platform, and
     * this value will only appear if the seller updates the completed order with the payment
     * details.
     */
    case PERSONAL_CHECK = "PERSONAL_CHECK";

    /**
     * This enumeration value indicates that the buyer used cash to pay for the order. This form of
     * payment can only be used for payment transactions off of eBay's platform, and this value will
     * only appear if the seller updates the completed order with the payment details.
     */
    case CASH_ON_PICKUP = "CASH_ON_PICKUP";

    /**
     * This enumeration value indicates that the buyer used an Electronic Funds Transfer (EFT) to
     * pay for the order. This form of payment can only be used for payment transactions off of
     * eBay's platform, and this value will only appear if the seller updates the completed order
     * with the payment details.
     */
    case EFT = "EFT";

    /**
     * This enumeration value is returned whenever eBay handles the online payment from the buyer.
     */
    case EBAY = "EBAY";

    /**
     * This enumeration value indicates that the buyer used Escrow to pay for the order. This form
     * of payment is used for high-value orders.
     */
    case ESCROW = "ESCROW";
}
