<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/inventory/types/slr:ShippingServiceTypeEnum
 */
enum ShippingServiceType: string
{
    /**
     * This enumeration value indicates that the shipping service option whose shipping costs will
     * be overridden is a domestic shipping service.
     */
    case DOMESTIC = 'DOMESTIC';

    /**
     * This enumeration value indicates that the shipping service option whose shipping costs will
     * be overridden is an international shipping service.
     */
    case INTERNATIONAL = 'INTERNATIONAL';
}
