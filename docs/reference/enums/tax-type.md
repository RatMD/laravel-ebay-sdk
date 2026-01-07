# TaxType Enum <DocsBadge path="sell/fulfillment/types/sel:TaxTypeEnum" />

This enumeration type defines the sales tax types that may be collected by eBay and remitted to the 
appropriate taxing authority for a given line item in an order. Although not all sales tax is 
subject to be collected and remitted by eBay, this type is only used by the eBayCollectAndRemitTaxes 
container, so all of these tax types will be subject to 'Collect and Remit'.

| Value                        | Description                        |
| ---------------------------- | ---------------------------------- |
| `STATE_SALES_TAX`            | This enumeration value indicates that US state sales tax was charged to the buyer against the order line item. eBay now calculates, collects, and remits sales tax to the proper taxing authorities in all 50 states and Washington, DC. — any sales tax rate set up by the seller for the buyer's state will be ignored. However, sellers may continue to set sales tax rates for the following US territories: American Samoa (AS), Guam (GU), Northern Mariana Islands (MP), Palau (PW), US Virgin Islands (VI) |
| `PROVINCE_SALES_TAX`         | This enumeration value indicates that provincial sales tax was charged to the buyer against the order line item. In provinces that mandate sales tax, any sales tax rate set up by the seller for the buyer's province will be ignored, and the seller is not involved with the collection of this tax at all. |
| `REGION`                     | This enumeration value indicates that regional sales tax was charged to the buyer against the order line item. In regions that mandate sales tax, any sales tax rate set up by the seller for the buyer's region will be ignored, and the seller is not involved with the collection of this tax at all. |
| `VAT`                        | This enumeration value indicates that Value-Added tax (VAT) was charged to the buyer against the order line item. VAT is not applicable in all countries, including the United States. |
| `GST`                        | This enumeration value indicates that a Goods and Services Tax was charged to the buyer against the order line item. This tax type applies to:, Australia and New Zealand: this is an import tax charged to buyers outside of these two countriesCanada: GST indicates that a Federal Sales Tax was charged to the buyer against the order line item. Depending on the province this can be either Goods and Services Tax (GST) or Harmonized Sales Tax (HST)., Jersey: this is a transactional tax on sales of goods and services supplied. |
| `ELECTRONIC_RECYCLING_FEE`   | This enumeration value indicates that an Electronic Recycling Fee was charged to the buyer against the order line item. This fee is imposed on the retail sale or lease of certain electronic products that have been identified as covered electronic devices (CEDs). Only available when fieldGroups is set to TAX_BREAKDOWN. |
| `MATTRESS_RECYCLING_FEE`     | This enumeration value indicates that a mattress waste recycling fee was charged to the buyer against the order line item for each mattress, box spring, foundation, and base sold. This recycling fee is per piece. Only available when fieldGroups is set to TAX_BREAKDOWN. |
| `ADDITIONAL_FEE`             | This enumeration value indicates that an additional recycling fee was charged to the buyer against the order line item. Only available when fieldGroups is set to TAX_BREAKDOWN. |
| `BATTERY_RECYCLING_FEE`      | This enumeration value indicates that the battery recycling fee was charged to the buyer against the order line item. Only available when fieldGroups is set to TAX_BREAKDOWN. |
| `TIRE_RECYCLING_FEE`         | This enumeration value indicates that the tire recycling fee was charged to the buyer against the order line item. Only available when fieldGroups is set to TAX_BREAKDOWN. |
| `WHITE_GOODS_DISPOSABLE_TAX` | This enumeration value indicates that the disposal tax for white goods was charged to the buyer against the order line item (White Goods Disposal Tax). White goods includes items like refrigerators, ranges, water heaters, freezers, unit air conditioners, washing machines, clothes dryers, and other similar domestic and commercial large appliances. Only available when fieldGroups is set to TAX_BREAKDOWN. |
| `IMPORT_VAT`                 | This enumeration value indicates that the Value-Added Tax (VAT) was charged to the buyer against an imported order line item (only applies to international orders). VAT is not applicable in all countries, including the United States. |
| `SST`                        | This enumeration value indicates that a Sales & Service Tax was charged to the buyer against the order line item. SST only applies to Malaysia. |

## Example

```php
use Rat\eBaySDK\Enums\TaxType;

TaxType::STATE_SALES_TAX;
```
