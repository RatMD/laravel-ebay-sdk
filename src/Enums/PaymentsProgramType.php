<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/account/types/api:PaymentsProgramType
 */
enum PaymentsProgramType: string
{
    /**
     * The eBay managed payments program.
     */
    case EBAY_PAYMENTS = "EBAY_PAYMENTS";
}
