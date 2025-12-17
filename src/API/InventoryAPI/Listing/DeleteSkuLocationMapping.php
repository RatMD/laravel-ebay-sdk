<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\InventoryAPI\Listing;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * DELETE /listing/{listingId}/sku/{sku}/locations
 * @see https://developer.ebay.com/api-docs/sell/inventory/resources/listing/methods/deleteSkuLocationMapping
 */
class DeleteSkuLocationMapping implements BaseAPIRequest
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
        return HTTPMethod::DELETE;
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
}
