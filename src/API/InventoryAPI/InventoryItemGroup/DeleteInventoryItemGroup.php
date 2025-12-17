<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\InventoryAPI\InventoryItemGroup;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * DELETE /inventory_item_group/{groupKey}
 * @see https://developer.ebay.com/api-docs/sell/inventory/resources/inventory_item_group/methods/deleteInventoryItemGroup
 */
class DeleteInventoryItemGroup implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/inventory/v1/inventory_item_group/{groupKey}';

    /**
     * Create a new instance.
     * @param string $groupKey
     * @return void
     */
    public function __construct(
        public readonly string $groupKey,
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
        return ['groupKey' => $this->groupKey];
    }
}
