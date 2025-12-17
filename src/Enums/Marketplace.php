<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/inventory/types/slr:MarketplaceEnum
 */
enum Marketplace: string
{
    /**
     * This enumeration value indicates that the eBay Marketplace is the US site (ebay.com).
     */
    case EBAY_US = "EBAY_US";

    /**
     * This enumeration value indicates that the eBay Marketplace is the US eBay Motors site (ebay.com/motors).
     */
    case EBAY_MOTORS = "EBAY_MOTORS";

    /**
     * This enumeration value indicates that the eBay Marketplace is the Canada (English) site (ebay.ca).
     */
    case EBAY_CA = "EBAY_CA";

    /**
     * This enumeration value indicates that the eBay Marketplace is the UK site (ebay.co.uk).
     */
    case EBAY_GB = "EBAY_GB";

    /**
     * This enumeration value indicates that the eBay Marketplace is the Australia site (ebay.com.au).
     */
    case EBAY_AU = "EBAY_AU";

    /**
     * This enumeration value indicates that the eBay Marketplace is the Austria site (ebay.at).
     */
    case EBAY_AT = "EBAY_AT";

    /**
     * This enumeration value indicates that the eBay marketplace is the Belgium (Dutch) site (www.ebay.be).
     */
    case EBAY_BE = "EBAY_BE";

    /**
     * This enumeration value indicates that the eBay Marketplace is the France site (ebay.fr).
     */
    case EBAY_FR = "EBAY_FR";

    /**
     * This enumeration value indicates that the eBay Marketplace is the Germany site (ebay.de).
     */
    case EBAY_DE = "EBAY_DE";

    /**
     * This enumeration value indicates that the eBay Marketplace is the Italy site (ebay.it).
     */
    case EBAY_IT = "EBAY_IT";

    /**
     * This enumeration value indicates that the eBay Marketplace is the Netherlands site (ebay.nl).
     */
    case EBAY_NL = "EBAY_NL";

    /**
     * This enumeration value indicates that the eBay Marketplace is the Spain site (ebay.es).
     */
    case EBAY_ES = "EBAY_ES";

    /**
     * This enumeration value indicates that the eBay Marketplace is the Switzerland site (ebay.ch).
     */
    case EBAY_CH = "EBAY_CH";

    /**
     * This enumeration value indicates that the eBay Marketplace is the Taiwan site (ebay.com/tw).
     */
    case EBAY_TW = "EBAY_TW";

    /**
     * This enumeration value indicates that the eBay Marketplace is the Czech Republic site (ebay.com/sch/Czech-Republic).
     */
    case EBAY_CZ = "EBAY_CZ";

    /**
     * This enumeration value indicates that the eBay Marketplace is the Denmark site (ebay.com/sch/Denmark).
     */
    case EBAY_DK = "EBAY_DK";

    /**
     * This enumeration value indicates that the eBay Marketplace is the Finland site (ebay.com/sch/Finland).
     */
    case EBAY_FI = "EBAY_FI";

    /**
     * This enumeration value indicates that the eBay Marketplace is the Greece site (ebay.com/sch/Greece).
     */
    case EBAY_GR = "EBAY_GR";

    /**
     * This enumeration value indicates that the eBay Marketplace is the Hong Kong site (ebay.com.hk).
     */
    case EBAY_HK = "EBAY_HK";

    /**
     * This enumeration value indicates that the eBay Marketplace is the Hungary site (ebay.com/sch/Hungary).
     */
    case EBAY_HU = "EBAY_HU";

    /**
     * This enumeration value indicates that the eBay Marketplace is the India site (ebay.in).
     * Note: eBay India is no longer a functioning eBay marketplace.
     */
    case EBAY_IN = "EBAY_IN";

    /**
     * This enumeration value indicates that the eBay Marketplace is the Indonesia site (id.ebay.com).
     */
    case EBAY_ID = "EBAY_ID";

    /**
     * This enumeration value indicates that the eBay Marketplace is the Ireland site (ebay.ie).
     */
    case EBAY_IE = "EBAY_IE";

    /**
     * This enumeration value indicates that the eBay Marketplace is the Israel site (ebay.com/sch/Israel).
     */
    case EBAY_IL = "EBAY_IL";

    /**
     * This enumeration value indicates that the eBay Marketplace is the Malaysia site (ebay.com/my).
     */
    case EBAY_MY = "EBAY_MY";

    /**
     * This enumeration value indicates that the eBay Marketplace is the New Zealand site (ebay.com/sch/New-Zealand).
     */
    case EBAY_NZ = "EBAY_NZ";

    /**
     * This enumeration value indicates that the eBay Marketplace is the Norway site (ebay.com/sch/Norway).
     */
    case EBAY_NO = "EBAY_NO";

    /**
     * This enumeration value indicates that the eBay Marketplace is the Philippines site (ebay.ph).
     */
    case EBAY_PH = "EBAY_PH";

    /**
     * This enumeration value indicates that the eBay Marketplace is the Poland site (ebay.pl).
     */
    case EBAY_PL = "EBAY_PL";

    /**
     * This enumeration value indicates that the eBay Marketplace is the Portugal site (ebay.com/sch/Portugal).
     */
    case EBAY_PT = "EBAY_PT";

    /**
     * This enumeration value indicates that the eBay Marketplace is the Puerto Rico site (ebay.com/sch/Puerto-Rico).
     */
    case EBAY_PR = "EBAY_PR";

    /**
     * This enumeration value indicates that the eBay Marketplace is the Russia site (ebay.com/sch/Russia).
     */
    case EBAY_RU = "EBAY_RU";

    /**
     * This enumeration value indicates that the eBay Marketplace is the Singapore site (ebay.com/sg).
     */
    case EBAY_SG = "EBAY_SG";

    /**
     * This enumeration value indicates that the eBay Marketplace is the South Africa site (ebay.com/sch/South-Africa).
     */
    case EBAY_ZA = "EBAY_ZA";

    /**
     * This enumeration value indicates that the eBay Marketplace is the Sweden site (ebay.com/sch/Sweden).
     */
    case EBAY_SE = "EBAY_SE";

    /**
     * This enumeration value indicates that the eBay Marketplace is the Thailand site (export.ebay.co.th).
     */
    case EBAY_TH = "EBAY_TH";

    /**
     * This enumeration value indicates that the eBay Marketplace is the Vietnam site (ebay.vn).
     */
    case EBAY_VN = "EBAY_VN";

    /**
     * This enumeration value indicates that the eBay Marketplace is the China site (ebay.com/sch/China).
     */
    case EBAY_CN = "EBAY_CN";

    /**
     * This enumeration value indicates that the eBay Marketplace is the Peru site (ebay.com/sch/Peru).
     */
    case EBAY_PE = "EBAY_PE";

    /**
     * This enumeration value indicates that the eBay Marketplace is the Japan site (ebay.co.jp).
     */
    case EBAY_JP = "EBAY_JP";
}
