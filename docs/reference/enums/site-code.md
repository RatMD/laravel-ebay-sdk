# SiteCode Enum <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/reference/ebay/types/sitecodetype.html" />

eBay sites (by the country in which each resides) on which a user is registered and on which items 
can be listed through the Trading API.

| Key              | Value | Description |
| ---------------- | ----- | ----------- |
| `AUSTRALIA`      | `15`  | Australia, site ID 15, abbreviation AU, currency AUD. ([http://www.ebay.com.au](http://www.ebay.com.au)) |
| `AUSTRIA`        | `16`  | Austria, site ID 16, abbreviation AT, currency EUR. ([http://www.ebay.at](http://www.ebay.at)) |
| `BELGIUM_DUTCH`  | `123` | Belgium (Dutch), site ID 123, abbreviation BENL, currency EUR. ([http://www.ebay.be](http://www.ebay.be)) |
| `BELGIUM_FRENCH` | `23`  | Belgium (French), site ID 123, abbreviation BEFR, currency EUR. ([http://www.ebay.be](http://www.ebay.be)) |
| `CANADA`         | `2`   | Canada, site ID 2, abbreviation CA, currencies CAD and USD. ([http://www.ebay.ca](http://www.ebay.ca)) |
| `CANADA_FRENCH`  | `210` | Canada French, site ID 210, abbreviation CAFR, currencies CAD and USD. |
| `CYPRUS`         | `-1`  | Cyprus, abbreviation CY, currency CYP. This site cannot be set in the X-EBAY-API-SITEID header nor in the Site field of a request payload. This value is only returned in output fields if applicable. |
| `CZECHIA`        | `197` | Czechia, site ID 197, abbreviation CZ, currency CZK. This site cannot be set in the X-EBAY-API-SITEID header nor in the Site field of a request payload. This value is only returned in output fields if applicable. |
| `EBAY_MOTORS`    | `100` | Although Site ID 100 is still valid in APIs, eBay Motors US is no longer its own site, but a vertical within the eBay US site. |
| `FRANCE`         | `71`  | France, site ID 71, abbreviation FR, currency EUR. ([http://www.ebay.fr](http://www.ebay.fr)) |
| `GERMANY`        | `77`  | Germany, site ID 77, abbreviation DE, currency EUR. ([http://www.ebay.de](http://www.ebay.de)) |
| `HONGKONG`       | `201` | Hong Kong, site ID 201, abbreviation HK, currency HKD. ([http://www.ebay.com.hk](http://www.ebay.com.hk)) |
| `INDIA`          | `203` | India, site ID 203, abbreviation IN, currency INR. ([http://www.ebay.in](http://www.ebay.in)) |
| `IRELAND`        | `205` | Ireland, site ID 205, abbreviation IE, currency EUR. ([http://www.ebay.ie](http://www.ebay.ie)) |
| `ITALY`          | `101` | Italy, site ID 101, abbreviation IT, currency EUR. ([http://www.ebay.it](http://www.ebay.it)) |
| `MALAYSIA`       | `207` | Malaysia, site ID 207, abbreviation MY, currency MYR. ([http://www.ebay.com.my](http://www.ebay.com.my)) |
| `NETHERLANDS`    | `146` | Netherlands, site ID 146, abbreviation NL, currency EUR. ([http://www.ebay.nl](http://www.ebay.nl)) |
| `PHILIPPINES`    | `211` | Philippines, site ID 211, abbreviation PH, currency PHP. ([http://www.ebay.ph](http://www.ebay.ph)) |
| `POLAND`         | `212` | Poland, site ID 212, abbreviation PL, currency PLN. ([http://www.ebay.pl](http://www.ebay.pl)) |
| `RUSSIA`         | `215` | Russia, site ID 215, abbreviation RU, currency RUB. Sellers must use the Merchant Integration Platform (MIP). This site cannot be used in Trading API Add/Revise calls. |
| `SINGAPORE`      | `216` | Singapore, site ID 216, abbreviation SG, currency SGD. ([http://www.ebay.com.sg](http://www.ebay.com.sg)) |
| `SPAIN`          | `186` | Spain, site ID 186, abbreviation ES, currency EUR. ([http://www.ebay.es](http://www.ebay.es)) |
| `SWITZERLAND`    | `193` | Switzerland, site ID 193, abbreviation CH, currency CHF. ([http://www.ebay.ch](http://www.ebay.ch)) |
| `UK`             | `3`   | United Kingdom, site ID 3, abbreviation UK, currency GBP. ([http://www.ebay.co.uk](http://www.ebay.co.uk)) |
| `US`             | `0`   | USA, site ID 0, abbreviation US, currency USD. ([http://www.ebay.com](http://www.ebay.com)) |

## Example

```php
use Rat\eBaySDK\Enums\SiteCode;

SiteCode::AUSTRIA;
```
