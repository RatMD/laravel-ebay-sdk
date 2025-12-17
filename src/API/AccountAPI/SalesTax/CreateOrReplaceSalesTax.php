<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AccountAPI\SalesTax;

use Illuminate\Support\Facades\Validator;
use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\CountryCode;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * POST /sales_tax/{countryCode}/{jurisdictionId}
 * @see https://developer.ebay.com/api-docs/sell/account/resources/sales_tax/methods/createOrReplaceSalesTax
 */
class CreateOrReplaceSalesTax implements BaseAPIRequest
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
        public readonly array $payload,
    ) { }

    /**
     * @inheritdoc
     */
    public function method(): HTTPMethod
    {
        return HTTPMethod::POST;
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

    /**
     * @inheritdoc
     */
    public function body(): array
    {
        return $this->payload;
    }

    /**
     * @inheritdoc
     */
    public function validate(): void
    {
        Validator::make($this->payload, [
            'salesTaxPercentage'        => ['required'],
            'shippingAndHandlingTaxed'  => ['required'],
        ])->validate();
    }
}
