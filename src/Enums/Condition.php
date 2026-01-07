<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/inventory/types/slr:ConditionEnum
 */
enum Condition: string
{
    /**
     * This enumeration value indicates that the inventory item is a brand-new, unopened item in its
     * original packaging.
     *
     * This enumeration value should be used if the Condition ID value is 1000.
     */
    case NEW = 'NEW';

    /**
     * This enumeration value indicates that the inventory item is in 'like-new' condition. In other
     * words, the item has been opened, but very lightly used if used at all. This condition
     * typically applies to books or DVDs.
     *
     * This enumeration value should be used if the Condition ID value is 2750.
     *
     * Note: This condition enumeration value should be used for trading card categories to indicate
     * that a trading card is Graded.
     */
    case LIKE_NEW = 'LIKE_NEW';

    /**
     * This enumeration value indicates that the inventory item is a new, unused item, but it may be
     * missing the original packaging or perhaps not sealed. When a seller specifies this condition
     * for an item, that seller should also provide a more detailed explanation of the item's
     * condition in the conditionDescription field.
     *
     * This enumeration value should be used if the Condition ID value is 1500.
     */
    case NEW_OTHER = 'NEW_OTHER';

    /**
     * This enumeration value indicates that the inventory item is a new, unused item, but it has
     * defects. This item condition is typically applicable to clothing or shoes that may have
     * scuffs, hanging threads, missing buttons, etc. When a seller specifies this condition for an
     * item, that seller should also provide a more detailed explanation of the item's condition in
     * the conditionDescription field.
     *
     * This enumeration value should be used if the Condition ID value is 1750.
     */
    case NEW_WITH_DEFECTS = 'NEW_WITH_DEFECTS';

    /**
     * Dn all eBay marketplaces, Condition ID 2000 now maps to item condition 'Certified Refurbished',
     * and not 'Manufacturer Refurbished'. If the MANUFACTURER_REFURBISHED enum is used, it will be
     * accepted but automatically converted by eBay to CERTIFIED_REFURBISHED. In the future, the
     * MANUFACTURER_REFURBISHED may start triggering an error if used.
     *
     * @deprecated This enumeration value should no longer be used, as the 'Manufacturer Refurbished'
     * item condition is no longer a valid item condition on any eBay marketplace.
     */
    case MANUFACTURER_REFURBISHED = 'MANUFACTURER_REFURBISHED';

    /**
     * This enumeration value indicates that the inventory item is in pristine, like-new condition
     * and has been inspected, cleaned and refurbished by the manufacturer or a manufacturer-approved
     * vendor. The item will be in new packaging with original or new accessories.
     *
     * This enumeration value should be used if the Condition ID value is 2000.
     */
    case CERTIFIED_REFURBISHED = 'CERTIFIED_REFURBISHED';

    /**
     * This enumeration value indicates that the inventory item is in like new condition and has
     * been inspected, cleaned, and refurbished by the manufacturer or a manufacturer-approved
     * vendor. When a seller specifies this condition for an item, that seller should also provide a
     * more detailed explanation of the item's condition in the conditionDescription field.
     *
     * This enumeration value should be used if the Condition ID value is 2010.
     */
    case EXCELLENT_REFURBISHED = 'EXCELLENT_REFURBISHED';

    /**
     * This enumeration value indicates that the inventory item shows minimal wear and has been
     * inspected, cleaned, and refurbished by the manufacturer or a manufacturer-approved vendor.
     * When a seller specifies this condition for an item, that seller should also provide a more
     * detailed explanation of the item's condition in the conditionDescription field.
     *
     * This enumeration value should be used if the Condition ID value is 2020.
     */
    case VERY_GOOD_REFURBISHED = 'VERY_GOOD_REFURBISHED';

    /**
     * This enumeration value indicates that the inventory item shows moderate wear and has been
     * inspected, cleaned, and refurbished by the manufacturer or a manufacturer-approved vendor.
     * When a seller specifies this condition for an item, that seller should also provide a more
     * detailed explanation of the item's condition in the conditionDescription field.
     *
     * This enumeration value should be used if the Condition ID value is 2030.
     */
    case GOOD_REFURBISHED = 'GOOD_REFURBISHED';

    /**
     * This enumeration value indicates that the inventory item has been restored to working order
     * by the eBay seller or a third party. This means the item was inspected, cleaned, and repaired
     * to full working order and is in excellent condition. This item may or may not be in original
     * packaging. When a seller specifies this condition for an item, that seller should also
     * provide a more detailed explanation of the item's condition in the conditionDescription field.
     *
     * This enumeration value should be used if the Condition ID value is 2500.
     */
    case SELLER_REFURBISHED = 'SELLER_REFURBISHED';

    /**
     * This enumeration value indicates that the inventory item is used but in excellent condition.
     * When a seller specifies this condition for an item, that seller should also provide a more
     * detailed explanation of the item's condition in the conditionDescription field.
     *
     * This enumeration value should be used if the Condition ID value is 3000.
     */
    case USED_EXCELLENT = 'USED_EXCELLENT';

    /**
     * This enumeration value indicates that the inventory item is used but in very good condition.
     * When a seller specifies this condition for an item, that seller should also provide a more
     * detailed explanation of the item's condition in the conditionDescription field.
     *
     * This enumeration value should be used if the Condition ID value is 4000.
     *
     * Note: This condition enumeration value should be used for trading card categories to indicate
     * that a trading card is Ungraded.
     */
    case USED_VERY_GOOD = 'USED_VERY_GOOD';

    /**
     * This enumeration value indicates that the inventory item is used but in good condition. When
     * a seller specifies this condition for an item, that seller should also provide a more
     * detailed explanation of the item's condition in the conditionDescription field.
     *
     * This enumeration value should be used if the Condition ID value is 5000.
     */
    case USED_GOOD = 'USED_GOOD';

    /**
     * This enumeration value indicates that the inventory item is in acceptable condition. When a
     * seller specifies this condition for an item, that seller should also provide a more detailed
     * explanation of the item's condition in the conditionDescription field.
     *
     * This enumeration value should be used if the Condition ID value is 6000.
     */
    case USED_ACCEPTABLE = 'USED_ACCEPTABLE';

    /**
     * his enumeration value indicates that the inventory item is not fully functioning as
     * originally designed. A buyer will generally buy an item in this condition knowing that the
     * item will need to be repaired, or a buyer will buy that item just to use one or more of the
     * parts/components that comprise the item. When a seller specifies this condition for an item,
     * that seller should also provide a more detailed explanation of the item's condition in the
     * conditionDescription field.
     *
     * This enumeration value should be used if the Condition ID value is 7000
     */
    case FOR_PARTS_OR_NOT_WORKING = 'FOR_PARTS_OR_NOT_WORKING';

    /**
     * This enumeration value indicates that the inventory item has been previously owned, but is in
     * excellent condition. The item may have been previously worn, but is like new with little to
     * no signs of wear. When a seller specifies this condition for an item, that seller should also
     * provide a more detailed explanation of the item's condition in the conditionDescription field.
     *
     * This enumeration value should be used if the Condition ID value is 2990.
     *
     * Note: This condition enumeration value is only applicable for apparel categories.
     */
    case PRE_OWNED_EXCELLENT = 'PRE_OWNED_EXCELLENT';

    /**
     * This enumeration value indicates that the inventory item has been previously owned and is in
     * fair condition. The item has significant visible flaws, heavy signs of wear, and/or missing
     * or damaged components. When a seller specifies this condition for an item, that seller should
     * also provide a more detailed explanation of the item's condition in the conditionDescription
     * field.
     *
     * This enumeration value should be used if the Condition ID value is 3010.
     *
     * Note: This condition enumeration value is only applicable for apparel categories.
     */
    case PRE_OWNED_FAIR = 'PRE_OWNED_FAIR';

    /**
     *
     * @param string|int $code
     * @return null|ConditionEnum
     */
    static public function convertFromCode(string|int $code): ?self
    {
        return match ((int) $code) {
            1000 => self::NEW,
            2750 => self::LIKE_NEW,
            1500 => self::NEW_OTHER,
            1750 => self::NEW_WITH_DEFECTS,
            2000 => self::CERTIFIED_REFURBISHED,
            2010 => self::EXCELLENT_REFURBISHED,
            2020 => self::VERY_GOOD_REFURBISHED,
            2030 => self::GOOD_REFURBISHED,
            2500 => self::SELLER_REFURBISHED,
            3000 => self::USED_EXCELLENT,
            4000 => self::USED_VERY_GOOD,
            5000 => self::USED_GOOD,
            6000 => self::USED_ACCEPTABLE,
            7000 => self::FOR_PARTS_OR_NOT_WORKING,
            2990 => self::PRE_OWNED_EXCELLENT,
            3010 => self::PRE_OWNED_FAIR,
            default => null,
        };
    }

    /**
     *
     * @deprecated Use convertFromCode instead.
     * @param string|int $code
     * @return null|ConditionEnum
     */
    static public function convertCode(string|int $code): ?self
    {
        return self::convertFromCode($code);
    }

    /**
     *
     * @param string|self $value
     * @return null|integer
     */
    static public function convertToCode(string|self $value): ?int
    {
        $value = is_string($value) ? $value : $value->value;
        return match ($value) {
            self::NEW->value                       => 1000,
            self::LIKE_NEW->value                  => 2750,
            self::NEW_OTHER->value                 => 1500,
            self::NEW_WITH_DEFECTS->value          => 1750,
            self::CERTIFIED_REFURBISHED->value     => 2000,
            self::EXCELLENT_REFURBISHED->value     => 2010,
            self::VERY_GOOD_REFURBISHED->value     => 2020,
            self::GOOD_REFURBISHED->value          => 2030,
            self::SELLER_REFURBISHED->value        => 2500,
            self::USED_EXCELLENT->value            => 3000,
            self::USED_VERY_GOOD->value            => 4000,
            self::USED_GOOD->value                 => 5000,
            self::USED_ACCEPTABLE->value           => 6000,
            self::FOR_PARTS_OR_NOT_WORKING->value  => 7000,
            self::PRE_OWNED_EXCELLENT->value       => 2990,
            self::PRE_OWNED_FAIR->value            => 3010,
            default => null,
        };
    }
}
