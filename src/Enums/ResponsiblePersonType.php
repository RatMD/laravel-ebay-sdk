<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/inventory/types/slr:ResponsiblePersonTypeEnum
 */
enum ResponsiblePersonType: string
{
    /**
     * This enum value indicates the Responsible person is an EU Responsible Person. An EU
     * Responsible Person is crucial for ensuring that products comply with all relevant regulations
     * and safety standards to protect human health.
     */
    case EU_RESPONSIBLE_PERSON = 'EU_RESPONSIBLE_PERSON';
}
