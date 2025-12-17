<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @see https://developer.ebay.com/api-docs/sell/inventory/types/slr:FormatTypeEnum
 */
enum SiteCode: int
{
    /**
     * Australia, site ID 15, abbreviation AU, currency AUD. (http://www.ebay.com.au)
     */
    case AUSTRALIA = 15;

    /**
     * Austria, site ID 16, abbreviation AT, currency EUR. (http://www.ebay.at)
     */
    case AUSTRIA = 16;

    /**
     * Belgium (Dutch), site ID 123, abbreviation BENL, currency EUR. (http://www.ebay.be)
     */
    case BELGIUM_DUTCH = 123;

    /**
     * Belgium (French), site ID 123, abbreviation BEFR, currency EUR. (http://www.ebay.be)
     */
    case BELGIUM_FRENCH = 23;

    /**
     * Canada, site ID 2, abbreviation CA, currencies CAD and USD. (http://www.ebay.ca)
     */
    case CANADA = 2;

    /**
     * CanadaFrench	Canada French, site ID 210, abbreviation CAFR, currencies CAD and USD.
     */
    case CANADA_FRENCH = 210;

    /**
     * Cyprus, abbreviation CY, currency CYP. This site cannot be set in the X-EBAY-API-SITEID
     * header, nor in the Site field of a request payload. This enumeration value will only be
     * returned in output fields if applicable.
     */
    case CYPRUS = -1;

    /**
     * Czechia, site ID 197, abbreviation CZ, currency CZK. This site cannot be set in the
     * X-EBAY-API-SITEID header, nor in the Site field of a request payload. This enumeration value
     * will only be returned in output fields if applicable.
     */
    case CZECHIA = 197;

    /**
     * Although Site ID 100 is still valid in APIs, eBay Motors US is no longer its own site, but
     * just a vertical within the eBay US site.
     */
    case EBAY_MOTORS = 100;

    /**
     * France, site ID 71, abbreviation FR, currency EUR. (http://www.ebay.fr)
     */
    case FRANCE = 71;

    /**
     * Germany, site ID 77, abbreviation DE, currency EUR. (http://www.ebay.de)
     */
    case GERMANY = 77;

    /**
     * Hong Kong, site ID 201, abbreviation HK, currency HKD. (http://www.ebay.com.hk)
     */
    case HONGKONG = 201;

    /**
     * India, site ID 203, abbreviation IN, currency INR. (http://www.ebay.in)
     */
    case INDIA = 203;

    /**
     * Ireland, site ID 205, abbreviation IE, currency EUR. (http://www.ebay.ie)
     */
    case IRELAND = 205;

    /**
     * Italy, site ID 101, abbreviation IT, currency EUR. (http://www.ebay.it)
     */
    case ITALY = 101;

    /**
     * Malaysia, site ID 207, abbreviation MY, currency MYR. (http://www.ebay.com.my)
     */
    case MALAYSIA = 207;

    /**
     * Netherlands, site ID 146, abbreviation NL, currency EUR. (http://www.ebay.nl)
     */
    case NETHERLANDS = 146;

    /**
     * Philippines, site ID 211, abbreviation PH, currency PHP. (http://www.ebay.ph)
     */
    case PHILIPPINES = 211;

    /**
     * Poland, site ID 212, abbreviation PL, currency PLN. (http://www.ebay.pl)
     */
    case POLAND = 212;

    /**
     * 	Russia, site ID 215, abbreviation RU, currency RUB. Sellers must use Merchant Integration
     * Platform (MIP) to create and revise listings on the Russia site. Russian listings cannot be
     * created or revised through the Trading API's add and revise calls, so 'Russia' would not be a
     * valid value to pass in through Item.Site field of an Add or Revise Trading API call.
     */
    case RUSSIA = 215;

    /**
     * Singapore, site ID 216, abbreviation SG, currency SGD. (http://www.ebay.com.sg)
     */
    case SINGAPORE = 216;

    /**
     * Spain, site ID 186, abbreviation ES, currency EUR. (http://www.ebay.es)
     */
    case SPAIN = 186;

    /**
     * Switzerland, site ID 193, abbreviation CH, currency CHF. (http://www.ebay.ch)
     */
    case SWITZERLAND = 193;

    /**
     * United Kingdom, site ID 3, abbreviation UK, currency GBP. (http://www.ebay.co.uk)
     */
    case UK = 3;

    /**
     * USA, site ID 0, abbreviation US, currency USD. (http://www.ebay.com)
     */
    case US = 0;
}
