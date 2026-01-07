<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:EbayVaultFulfillmentTypeEnum
 */
enum EbayVaultFulfillmentType: string
{
    /**
     * This enumeration type indicates that the seller will ship the order to an authenticator. When
     * using this program, fulfillmentInstructionsType will be set to SHIP_TO and the order will be
     * shipped to the authenticator's shipping address.
     */
    case SELLER_TO_VAULT = "SELLER_TO_VAULT";

    /**
     * This enumeration type indicates that eBay will ship the order from an eBay vault to the
     * buyer's vault.
     */
    case VAULT_TO_VAULT = "VAULT_TO_VAULT";

    /**
     * This enumeration type indicates that eBay will ship the order from an eBay vault to the
     * shipping address provided by the buyer.
     */
    case VAULT_TO_BUYER = "VAULT_TO_BUYER";
}
