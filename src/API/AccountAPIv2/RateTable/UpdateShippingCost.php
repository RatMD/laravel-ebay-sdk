<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AccountAPIv2\RateTable;

use Illuminate\Support\Facades\Validator;
use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\APIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * POST /rate_table/{rateTableId}/update_shipping_cost
 * @see https://developer.ebay.com/api-docs/sell/account/v2/resources/rate_table/methods/updateShippingCost
 */
class UpdateShippingCost implements APIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/account/v2/rate_table/{rateTableId}/update_shipping_cost';

    /**
     * Create a new instance.
     * @param string $rateTableId
     * @param array $payload
     * @return void
     */
    public function __construct(
        public readonly string $rateTableId,
        public readonly array $payload
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
        return ['rateTableId' => $this->rateTableId];
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
            'rates'             => ['required', 'array', 'min:1'],
            'rates.*.rateId'    => ['required'],
        ])->validate();
    }
}
