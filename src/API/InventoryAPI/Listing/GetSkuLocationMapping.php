<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\InventoryAPI\Listing;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\APIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /listing/{listingId}/sku/{sku}/locations
 * @see https://developer.ebay.com/api-docs/sell/inventory/resources/listing/methods/getSkuLocationMapping
 */
class GetSkuLocationMapping implements APIRequest
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
     * @return void
     */
    public function __construct(
        public readonly string $listingId,
        public readonly string $sku,
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
            'listingId' => $this->listingId,
            'sku'       => $this->sku,
        ];
    }
}
