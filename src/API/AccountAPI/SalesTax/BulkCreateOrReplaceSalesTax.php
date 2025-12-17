<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AccountAPI\SalesTax;

use Illuminate\Support\Facades\Validator;
use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * POST /bulk_create_or_replace_sales_tax
 * @see https://developer.ebay.com/api-docs/sell/account/resources/sales_tax/methods/bulkCreateOrReplaceSalesTax
 */
class BulkCreateOrReplaceSalesTax implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/account/v1/bulk_create_or_replace_sales_tax';

    /**
     * Create a new instance.
     * @param array $payload
     * @return void
     */
    public function __construct(
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
            'salesTaxInputList'                             => ['required', 'array', 'min:1'],
            'salesTaxInputList.*.countryCode'               => ['required'],
            'salesTaxInputList.*.salesTaxJurisdictionId'    => ['required'],
            'salesTaxInputList.*.salesTaxPercentage'        => ['required'],
            'salesTaxInputList.*.shippingAndHandlingTaxed'  => ['required'],
        ])->validate();
    }
}
