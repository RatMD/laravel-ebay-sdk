<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\InventoryAPI\Offer;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\APIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Enums\Marketplace;

/**
 * POST /bulk_create_offer
 * @see https://developer.ebay.com/api-docs/sell/inventory/resources/offer/methods/bulkCreateOffer
 */
class BulkCreateOffer implements APIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/inventory/v1/bulk_create_offer';

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
            'requests'                  => ['required', 'array', 'min:1', 'max:25'],
            'requests.*.format'         => ['required'],
            'requests.*.marketplaceId'  => ['required', Rule::enum(Marketplace::class)],
            'requests.*.sku'            => ['required'],
        ])->validate();
    }
}
