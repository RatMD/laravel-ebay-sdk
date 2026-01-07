# PackageType Enum <DocsBadge path="sell/inventory/types/slr:PackageTypeEnum" />

This enumerated type is used to indicate what type of shipping package will be used to ship an 
inventory item.

> [!NOTE]
> You can use the GeteBayDetails Trading API call to retrieve a list of supported package types for 
> a specific marketplace.

| Value           | Description                        |
| --------------- | ---------------------------------- |
| `LETTER` | This enumeration value indicates that the package type used to ship the inventory item is a letter. |
| `BULKY_GOODS` | This enumeration value indicates that the inventory item is considered a "bulky good". |
| `CARAVAN` | This enumeration value indicates that the package type used to ship the inventory item is a caravan. |
| `CARS` | This enumeration value indicates that the inventory item is a car |
| `EUROPALLET` | This enumeration value indicates that the package type used to ship the inventory item is a Euro pallet. |
| `EXPANDABLE_TOUGH_BAGS` | This enumeration value indicates that the package type used to ship the inventory item is an expandable tough bag. |
| `EXTRA_LARGE_PACK` | This enumeration value indicates that the package type used to ship the inventory item is an extra large pack. |
| `FURNITURE` | This enumeration value indicates that the inventory item is a furniture item. |
| `INDUSTRY_VEHICLES` | This enumeration value indicates that the inventory item is an industry vehicle. |
| `LARGE_CANADA_POSTBOX` | This enumeration value indicates that the package type used to ship the inventory item is a Canada Post large box. |
| `LARGE_CANADA_POST_BUBBLE_MAILER` | This enumeration value indicates that the package type used to ship the inventory item is a Canada Post large bubble mailer. |
| `LARGE_ENVELOPE` | This enumeration value indicates that the package type used to ship the inventory item is a large envelope. |
| `MAILING_BOX` | This enumeration value indicates that the package type used to ship the inventory item is a standard mailing box. |
| `MEDIUM_CANADA_POST_BOX` | This enumeration value indicates that the package type used to ship the inventory item is a medium Canada Post box. |
| `MEDIUM_CANADA_POST_BUBBLE_MAILER` | This enumeration value indicates that the package type used to ship the inventory item is a medium Canada Post bubble mailer. |
| `MOTORBIKES` | This enumeration value indicates that the inventory item is a motorcycle. |
| `ONE_WAY_PALLET` | This enumeration value indicates that the package type used to ship the inventory item is a one-way pallet. |
| `PACKAGE_THICK_ENVELOPE` | This enumeration value indicates that the package type used to ship the inventory item is an thick envelope. |
| `PADDED_BAGS` | This enumeration value indicates that the package type used to ship the inventory item is a padded bag. |
| `PARCEL_OR_PADDED_ENVELOPE` | This enumeration value indicates that the package type used to ship the inventory item is a parcel or a padded envelope. |
| `ROLL` | This enumeration value indicates that the package type used to ship the inventory item is a roll. |
| `SMALL_CANADA_POST_BOX` | This enumeration value indicates that the package type used to ship the inventory item is a small Canada Post box. |
| `SMALL_CANADA_POST_BUBBLE_MAILER` | This enumeration value indicates that the package type used to ship the inventory item is a small Canada Post bubble mailer. |
| `TOUGH_BAGS` | This enumeration value indicates that the package type used to ship the inventory item is a a tough bag. |
| `UPS_LETTER` | This enumeration value indicates that the package type used to ship the inventory item is a UPS letter. |
| `USPS_FLAT_RATE_ENVELOPE` | This enumeration value indicates that the package type used to ship the inventory item is a USPS flat-rate envelope. |
| `USPS_LARGE_PACK` | This enumeration value indicates that the package type used to ship the inventory item is a USPS large pack. |
| `VERY_LARGE_PACK` | This enumeration value indicates that the package type used to ship the inventory item is a USPS very large pack. |
| `WINE_PAK` | This enumeration value indicates that the package type used to ship the inventory item is a wine pak. |

## Example

```php
use Rat\eBaySDK\Enums\PackageType;

PackageType::LETTER;
```
