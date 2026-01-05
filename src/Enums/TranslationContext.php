<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/translation/types/api:TranslationContextEnum
 */
enum TranslationContext: string
{
    /**
     * This value is input into the translationContext input field if the user wishes to translate a
     * listing title.
     */
    case ITEM_TITLE = 'ITEM_TITLE';

    /**
     * This value is input into the translationContext input field if the user wishes to translate a
     * listing description.
     */
    case ITEM_DESCRIPTION = 'ITEM_DESCRIPTION';
}
