<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:TaxTypeEnum
 */
enum TaxType: string
{
    /**
     * This enumeration value indicates that US state sales tax was charged to the buyer against the
     * order line item. eBay now calculates, collects, and remits sales tax to the proper taxing
     * authorities in all 50 states and Washington, DC. — any sales tax rate set up by the seller
     * for the buyer's state will be ignored. However, sellers may continue to set sales tax rates
     * for the following US territories:
     * American Samoa (AS)
     * Guam (GU)
     * Northern Mariana Islands (MP)
     * Palau (PW)
     * US Virgin Islands (VI)
     */
    case STATE_SALES_TAX = "STATE_SALES_TAX";

    /**
     * This enumeration value indicates that provincial sales tax was charged to the buyer against
     * the order line item. In provinces that mandate sales tax, any sales tax rate set up by the
     * seller for the buyer's province will be ignored, and the seller is not involved with the
     * collection of this tax at all.
     */
    case PROVINCE_SALES_TAX = "PROVINCE_SALES_TAX";

    /**
     * This enumeration value indicates that regional sales tax was charged to the buyer against the
     * order line item. In regions that mandate sales tax, any sales tax rate set up by the seller
     * for the buyer's region will be ignored, and the seller is not involved with the collection of
     * this tax at all.
     */
    case REGION = "REGION";

    /**
     * This enumeration value indicates that Value-Added tax (VAT) was charged to the buyer against
     * the order line item. VAT is not applicable in all countries, including the United States.
     */
    case VAT = "VAT";

    /**
     * This enumeration value indicates that a Goods and Services Tax was charged to the buyer
     * against the order line item. This tax type applies to:
     * Australia and New Zealand: this is an import tax charged to buyers outside of these
     * two countries
     * Canada: GST indicates that a Federal Sales Tax was charged to the buyer against the
     * order line item. Depending on the province this can be either Goods and Services Tax (GST) or
     * Harmonized Sales Tax (HST).
     * Jersey: this is a transactional tax on sales of goods and services supplied.
     */
    case GST = "GST";

    /**
     * This enumeration value indicates that an Electronic Recycling Fee was charged to the buyer
     * against the order line item. This fee is imposed on the retail sale or lease of certain
     * electronic products that have been identified as covered electronic devices (CEDs). Only
     * available when fieldGroups is set to TAX_BREAKDOWN.
     */
    case ELECTRONIC_RECYCLING_FEE = "ELECTRONIC_RECYCLING_FEE";

    /**
     * This enumeration value indicates that a mattress waste recycling fee was charged to the buyer
     * against the order line item for each mattress, box spring, foundation, and base sold. This
     * recycling fee is per piece. Only available when fieldGroups is set to TAX_BREAKDOWN.
     */
    case MATTRESS_RECYCLING_FEE = "MATTRESS_RECYCLING_FEE";

    /**
     * This enumeration value indicates that an additional recycling fee was charged to the buyer
     * against the order line item. Only available when fieldGroups is set to TAX_BREAKDOWN.
     */
    case ADDITIONAL_FEE = "ADDITIONAL_FEE";

    /**
     * This enumeration value indicates that the battery recycling fee was charged to the buyer
     * against the order line item. Only available when fieldGroups is set to TAX_BREAKDOWN.
     */
    case BATTERY_RECYCLING_FEE = "BATTERY_RECYCLING_FEE";

    /**
     * This enumeration value indicates that the tire recycling fee was charged to the buyer against
     * the order line item. Only available when fieldGroups is set to TAX_BREAKDOWN.
     */
    case TIRE_RECYCLING_FEE = "TIRE_RECYCLING_FEE";

    /**
     * This enumeration value indicates that the disposal tax for white goods was charged to the
     * buyer against the order line item (White Goods Disposal Tax). White goods includes items like
     * refrigerators, ranges, water heaters, freezers, unit air conditioners, washing machines,
     * clothes dryers, and other similar domestic and commercial large appliances. Only available
     * when fieldGroups is set to TAX_BREAKDOWN.
     */
    case WHITE_GOODS_DISPOSABLE_TAX = "WHITE_GOODS_DISPOSABLE_TAX";

    /**
     * This enumeration value indicates that the Value-Added Tax (VAT) was charged to the buyer
     * against an imported order line item (only applies to international orders). VAT is not
     * applicable in all countries, including the United States.
     */
    case IMPORT_VAT = "IMPORT_VAT";

    /**
     * This enumeration value indicates that a Sales & Service Tax was charged to the buyer against
     * the order line item. SST only applies to Malaysia.
     */
    case SST = "SST";
}
