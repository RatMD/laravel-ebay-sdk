<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/translation/types/api:LanguageEnum
 */
enum TranslationLanguage: string
{
    /**
     * Indicates the language of the input or output text is German.
     */
    case DE = 'de';

    /**
     * Indicates the language of the input or output text is English.
     */
    case EN = 'en';

    /**
     * Indicates the language of the input or output text is Spanish.
     */
    case ES = 'es';

    /**
     * Indicates the language of the input or output text is French.
     */
    case FR = 'fr';

    /**
     * Indicates the language of the input or output text is Italian.
     */
    case IT = 'it';

    /**
     * Indicates the language of the input or output text is Japanese.
     */
    case JA = 'ja';

    /**
     * Indicates the language of the input or output text is Polish.
     */
    case PL = 'pl';

    /**
     * Indicates the language of the input or output text is Portuguese.
     */
    case PT = 'pt';

    /**
     * Indicates the language of the input or output text is Russian.
     */
    case RU = 'ru';

    /**
     * Indicates the language of the input or output text is Chinese.
     */
    case ZH = 'zh';
}
