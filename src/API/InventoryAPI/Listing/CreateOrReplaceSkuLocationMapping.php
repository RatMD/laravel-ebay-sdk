<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\InventoryAPI\Listing;

use Illuminate\Support\Facades\Validator;
use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * PUT /listing/{listingId}/sku/{sku}/locations
 * @see https://developer.ebay.com/api-docs/sell/inventory/resources/listing/methods/createOrReplaceSkuLocationMapping
 */
class CreateOrReplaceSkuLocationMapping implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/inventory/v1/listing/{listingId}/sku/{sku}/locations';

    /**
     * Create a new instance.
     * @param string $listingId
     * @param string $sku
     * @param array $payload
     * @return void
     */
    public function __construct(
        public readonly string $listingId,
        public readonly string $sku,
        public readonly array $payload,
    ) { }

    /**
     * @inheritdoc
     */
    public function method(): HTTPMethod
    {
        return HTTPMethod::PUT;
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
        $sku = str_replace('#', '%23', $this->sku);
        return [
            'listingId' => $this->listingId,
            'sku'       => $sku,
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
            'locations'                         => ['required', 'array'],
            'locations.*.merchantLocationKey'   => ['required'],
        ])->validate();
    }
}
