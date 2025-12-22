<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/account/types/ba:MarketplaceIdEnum
 */
enum MarketplaceId: string
{
    /**
     * Indicates the eBay marketplace for Austria (https://www.ebay.at).
     */
    case EBAY_AT = 'EBAY_AT';

    /**
     * Indicates the eBay marketplace for Australia (https://www.ebay.com.au).
     */
    case EBAY_AU = 'EBAY_AU';

    /**
     * Indicates the eBay marketplace for Belgium (https://www.ebay.be/).
     */
    case EBAY_BE = 'EBAY_BE';

    /**
     * Indicates the eBay marketplace for Canada (https://www.ebay.ca).
     */
    case EBAY_CA = 'EBAY_CA';

    /**
     * Indicates the eBay marketplace for Switzerland (https://www.ebay.ch).
     */
    case EBAY_CH = 'EBAY_CH';

    /**
     * Reserved for future use.
     */
    case EBAY_CN = 'EBAY_CN';

    /**
     * Reserved for future use.
     */
    case EBAY_CZ = 'EBAY_CZ';

    /**
     * Indicates the eBay marketplace for Germany (https://www.ebay.de).
     */
    case EBAY_DE = 'EBAY_DE';

    /**
     * Reserved for future use.
     */
    case EBAY_DK = 'EBAY_DK';

    /**
     * Indicates the eBay marketplace for Spain (https://www.ebay.es).
     */
    case EBAY_ES = 'EBAY_ES';

    /**
     * Reserved for future use.
     */
    case EBAY_FI = 'EBAY_FI';

    /**
     * Indicates the eBay marketplace for France (https://www.ebay.fr).
     */
    case EBAY_FR = 'EBAY_FR';

    /**
     * Indicates the eBay marketplace for the United Kingdom. (https://www.ebay.co.uk).
     */
    case EBAY_GB = 'EBAY_GB';

    /**
     * Reserved for future use.
     */
    case EBAY_GR = 'EBAY_GR';

    /**
     * Indicates the eBay marketplace for Hong Kong (https://www.ebay.com.hk).
     */
    case EBAY_HK = 'EBAY_HK';

    /**
     * Reserved for future use.
     */
    case EBAY_HU = 'EBAY_HU';

    /**
     * Reserved for future use.
     */
    case EBAY_ID = 'EBAY_ID';

    /**
     * Indicates the eBay marketplace for Ireland (https://www.ebay.ie).
     */
    case EBAY_IE = 'EBAY_IE';

    /**
     * Reserved for future use.
     */
    case EBAY_IL = 'EBAY_IL';

    /**
     * Reserved for future use.
     */
    case EBAY_IN = 'EBAY_IN';

    /**
     * Indicates the eBay marketplace for Italy (https://www.ebay.it).
     */
    case EBAY_IT = 'EBAY_IT';

    /**
     * Reserved for future use.
     */
    case EBAY_JP = 'EBAY_JP';

    /**
     * Indicates the eBay marketplace for Malaysia (https://www.ebay.com.my).
     */
    case EBAY_MY = 'EBAY_MY';

    /**
     * Indicates the eBay marketplace for the Netherlands (https://www.ebay.nl).
     */
    case EBAY_NL = 'EBAY_NL';

    /**
     * Reserved for future use.
     */
    case EBAY_NO = 'EBAY_NO';

    /**
     * Reserved for future use.
     */
    case EBAY_NZ = 'EBAY_NZ';

    /**
     * Reserved for future use.
     */
    case EBAY_PE = 'EBAY_PE';

    /**
     * Indicates the eBay marketplace for the Philippines (https://www.ebay.ph).
     */
    case EBAY_PH = 'EBAY_PH';

    /**
     * Indicates the eBay marketplace for Poland (https://www.ebay.pl).
     */
    case EBAY_PL = 'EBAY_PL';

    /**
     * Reserved for future use.
     */
    case EBAY_PR = 'EBAY_PR';

    /**
     * Reserved for future use.
     */
    case EBAY_PT = 'EBAY_PT';

    /**
     * Reserved for future use.
     */
    case EBAY_RU = 'EBAY_RU';

    /**
     * Reserved for future use.
     */
    case EBAY_SE = 'EBAY_SE';

    /**
     * Indicates the eBay marketplace for Singapore (https://www.ebay.com.sg).
     */
    case EBAY_SG = 'EBAY_SG';

    /**
     * Indicates the eBay marketplace for Thailand (https://info.ebay.co.th).
     */
    case EBAY_TH = 'EBAY_TH';

    /**
     * Indicates the eBay marketplace for Taiwan (https://www.ebay.com.tw).
     */
    case EBAY_TW = 'EBAY_TW';

    /**
     * Indicates the eBay marketplace for the United States (https://www.ebay.com).
     */
    case EBAY_US = 'EBAY_US';

    /**
     * Indicates the eBay marketplace for Vietnam (https://www.ebay.vn).
     */
    case EBAY_VN = 'EBAY_VN';

    /**
     * Reserved for future use.
     */
    case EBAY_ZA = 'EBAY_ZA';

    /**
     * No longer used.
     */
    case EBAY_HALF_US = 'EBAY_HALF_US';

    /**
     * Indicates the parent category for "Auto Parts and Vehicles" on the EBAY_US marketplace (https://www.ebay.com/motors).
     */
    case EBAY_MOTORS_US = 'EBAY_MOTORS_US';
}
