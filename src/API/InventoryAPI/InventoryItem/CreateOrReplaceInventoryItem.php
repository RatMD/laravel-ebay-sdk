<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\InventoryAPI\InventoryItem;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * PUT /inventory_item/{sku}
 * @see https://developer.ebay.com/api-docs/sell/inventory/resources/inventory_item/methods/createOrReplaceInventoryItem
 */
class CreateOrReplaceInventoryItem implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/inventory/v1/inventory_item/{sku}';

    /**
     * Create a new instance.
     * @param string $sku
     * @param array $payload
     * @return void
     */
    public function __construct(
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
        return ['sku' => $this->sku];
    }

    /**
     * @inheritdoc
     */
    public function body(): array
    {
        return $this->payload;
    }
}
