# SoldFormat Enum <DocsBadge path="sell/fulfillment/types/sel:SoldFormatEnum" />

This enumerated type defines the listing formats for which a line item may be sold.

| Value                 | Description                        |
| --------------------- | ---------------------------------- |
| `AUCTION`             | This enumeration value indicates that the line item was purchased through an auction listing. Note that this value will be returned even if the buyer purchases the item through the 'Buy it Now' feature, or if the buyer proposes and the seller accepts a 'Best Offer' for the auction item. Both the 'Buy it Now' and 'Best Offer' features get turned off on the listing as soon as the active auction listing has at least one qualifying bid. |
| `FIXED_PRICE`         | This enumeration value indicates that the line item was purchased through a fixed-price listing. Note that this value will be returned whether the buyer purchases the item at the 'Fixed Price' or if the buyer proposes and the seller accepts a 'Best Offer' price. The 'Buy it Now' feature is not applicable to fixed-price listings. With fixed-price listings, buyer may purchase multiple units of the same line item if inventory is available. |
| `OTHER`               | This enumeration value may be returned if the listing type cannot be determined by eBay. |
| `SECOND_CHANCE_OFFER` | This enumeration value indicates that the line item was purchased through a 'Second Chance Offer'. Sellers can propose a 'Second Chance Offer' to a non-winning bidder on an ended auction listing when either the winning bidder has failed to pay for an item, or if the seller has more inventory of the auction item. A seller can create a 'Second Chance Offer' immediately after a listing ends, all the way up to 60 days after the end of the listing. A 'Second Chance Offer' can be proposed through the eBay UI, or the seller also can use the AddSecondChanceItem call of the Trading API. Based on the seller's preference, a prospective buyer can have up to seven days to make a decision on purchasing the item. |

## Example

```php
use Rat\eBaySDK\Enums\SoldFormat;

SoldFormat::AUCTION;
```
