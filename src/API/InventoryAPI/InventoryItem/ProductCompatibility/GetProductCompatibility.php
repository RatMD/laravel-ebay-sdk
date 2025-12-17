<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\InventoryAPI\InventoryItem\ProductCompatibility;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /inventory_item/{sku}/product_compatibility
 * @see https://developer.ebay.com/api-docs/sell/inventory/resources/inventory_item/product_compatibility/methods/deleteProductCompatibility
 */
class GetProductCompatibility implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/inventory/v1/inventory_item/{sku}/product_compatibility';

    /**
     * Create a new instance.
     * @param string $sku
     * @return void
     */
    public function __construct(
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
        $sku = str_replace('#', '%23', $this->sku);
        return ['sku' => $sku];
    }
}
