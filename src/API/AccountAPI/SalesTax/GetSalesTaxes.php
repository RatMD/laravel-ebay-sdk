<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AccountAPI\SalesTax;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\CountryCode;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /sales_tax
 * @see https://developer.ebay.com/api-docs/sell/account/resources/sales_tax/methods/getSalesTaxes
 */
class GetSalesTaxes implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/account/v1/sales_tax';

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
    public function query(): array
    {
        return ['country_code' => $this->countryCode];
    }
}
