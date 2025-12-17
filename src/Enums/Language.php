<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/commerce/media/types/api:LanguageEnum
 */
enum Language: string
{
    /**
     * This is a document provided by the manufacturer or a qualified third-party laboratory that confirms the product has been tested and meets the specified criteria.
     */
    case CERTIFICATE_OF_ANALYSIS = "CERTIFICATE_OF_ANALYSIS";

    /**
     * The document is in English.
     */
    case ENGLISH = 'ENGLISH';

    /**
     * The document is in Spanish.
     */
    case SPANISH = 'SPANISH';

    /**
     * The document is in Italian.
     */
    case ITALIAN = 'ITALIAN';

    /**
     * The document is in German.
     */
    case GERMAN = 'GERMAN';

    /**
     * The document is in Polish.
     */
    case POLISH = 'POLISH';

    /**
     * The document is in Dutch.
     */
    case DUTCH = 'DUTCH';

    /**
     * The document is in Portuguese.
     * Note: This enumeration value is deprecated. Use the PORTUGUESE enum value instead when
     * creating a document.
     * @deprecated
     */
    case PORTUGESE = 'PORTUGESE';

    /**
     * The document is in Portuguese.
     */
    case PORTUGUESE = 'PORTUGUESE';

    /**
     * The document is in French.
     */
    case FRENCH = 'FRENCH';

    /**
     * The document is in a language other than the ones specifically listed above.
     */
    case OTHER = 'OTHER';
}
