<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AccountAPI\SalesTax;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\APIRequest;
use Rat\eBaySDK\Enums\CountryCode;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /sales_tax/{countryCode}/{jurisdictionId}
 * @see https://developer.ebay.com/api-docs/sell/account/resources/sales_tax/methods/getSalesTax
 */
class GetSalesTax implements APIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/account/v1/sales_tax/{countryCode}/{jurisdictionId}';

    /**
     * Create a new instance.
     * @param CountryCode $countryCode
     * @param string $jurisdictionId
     * @param array $payload
     * @return void
     */
    public function __construct(
        public readonly CountryCode $countryCode,
        public readonly string $jurisdictionId,
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
            'countryCode' => $this->countryCode,
            'jurisdictionId' => $this->jurisdictionId
        ];
    }
}
