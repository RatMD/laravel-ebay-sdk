<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:CollectionMethodEnum
 */
enum CollectionMethod: string
{
    /**
     * This enumeration value is for future use only, and will not currently be returned in the
     * collectionMethod field.
     */
    case INVOICE = "INVOICE";

    /**
     * This enumeration value is always returned in the collectionMethod field for 'Collect and
     * Remit' taxes, but the collectionMethod field is currently for future use.
     */
    case NET = "NET";
}
