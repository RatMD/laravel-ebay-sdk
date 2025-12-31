<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\BrowseAPI\Item;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /item/get_items_by_item_group
 * @see https://developer.ebay.com/api-docs/buy/browse/resources/item/methods/getItemsByItemGroup
 */
class GetItemsByItemGroup implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/buy/browse/v1/item/get_items_by_item_group';

    /**
     * Create a new instance.
     * @param string $marketplaceId
     * @param string $itemGroupId
     * @param null|string $fieldGroups
     * @param null|int $quantityForShippingEstimate
     * @param null|string $endUserCtx
     * @return void
     */
    public function __construct(
        public readonly string $marketplaceId,
        public readonly string $itemGroupId,
        public readonly ?string $fieldGroups = null,
        public readonly ?int $quantityForShippingEstimate = null,
        public readonly ?string $endUserCtx = null,
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
    public function query(): array
    {
        return [
            'item_group_id'                     => $this->itemGroupId,
            'fieldgroups'                       => $this->fieldGroups,
            'quantity_for_shipping_estimate'    => $this->quantityForShippingEstimate,
        ];
    }

    /**
     * @inheritdoc
     */
    public function headers(): array
    {
        return [
            'X-EBAY-C-ENDUSERCTX'       => $this->endUserCtx,
            'X-EBAY-C-MARKETPLACE-ID'   => $this->marketplaceId
        ];
    }
}
