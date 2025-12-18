<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MetadataAPI\Country;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\CountryCode;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /country/{countryCode}/sales_tax_jurisdiction
 * @see https://developer.ebay.com/api-docs/sell/metadata/resources/country/methods/getSalesTaxJurisdictions
 */
class GetSalesTaxJurisdictions implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/metadata/v1/country/{countryCode}/sales_tax_jurisdiction';

    /**
     * Create a new instance.
     * @param CountryCode $countryCode
     * @return void
     */
    public function __construct(
        public readonly CountryCode $countryCode,
    ) { }

    /**
     * @inheritdoc
     */
    public function method(): HTTPMethod
    {
        return HTTPMethod::GET;
    }

    /**
     * @inheritdoc
     */
    public function path(): string
    {
        return self::PATH;
    }

    /**
     * @inheritdoc
     */
    public function params(): array
    {
        return [
            'countryCode'   => $this->countryCode
        ];
    }
}
