<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:SoldFormatEnum
 */
enum SoldFormat: string
{
    /**
     * This enumeration value indicates that the line item was purchased through an auction listing.
     * Note that this value will be returned even if the buyer purchases the item through the 'Buy
     * it Now' feature, or if the buyer proposes and the seller accepts a 'Best Offer' for the
     * auction item. Both the 'Buy it Now' and 'Best Offer' features get turned off on the listing
     * as soon as the active auction listing has at least one qualifying bid.
     */
    case AUCTION = "AUCTION";

    /**
     * This enumeration value indicates that the line item was purchased through a fixed-price
     * listing. Note that this value will be returned whether the buyer purchases the item at the
     * 'Fixed Price' or if the buyer proposes and the seller accepts a 'Best Offer' price. The 'Buy
     * it Now' feature is not applicable to fixed-price listings. With fixed-price listings, buyer
     * may purchase multiple units of the same line item if inventory is available.
     */
    case FIXED_PRICE = "FIXED_PRICE";

    /**
     * This enumeration value may be returned if the listing type cannot be determined by eBay.
     */
    case OTHER = "OTHER";

    /**
     * This enumeration value indicates that the line item was purchased through a 'Second Chance
     * Offer'. Sellers can propose a 'Second Chance Offer' to a non-winning bidder on an ended
     * auction listing when either the winning bidder has failed to pay for an item, or if the
     * seller has more inventory of the auction item. A seller can create a 'Second Chance Offer'
     * immediately after a listing ends, all the way up to 60 days after the end of the listing. A
     * 'Second Chance Offer' can be proposed through the eBay UI, or the seller also can use the
     * AddSecondChanceItem call of the Trading API. Based on the seller's preference, a prospective
     * buyer can have up to seven days to make a decision on purchasing the item.
     */
    case SECOND_CHANCE_OFFER = "SECOND_CHANCE_OFFER";
}
