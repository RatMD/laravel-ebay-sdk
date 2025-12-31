<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\BrowseAPI\Item;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /item/get_item_by_legacy_id
 * @see https://developer.ebay.com/api-docs/buy/browse/resources/item/methods/getItemByLegacyId
 */
class GetItemByLegacyId implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/buy/browse/v1/item/get_item_by_legacy_id';

    /**
     * Create a new instance.
     * @param string $marketplaceId
     * @param string $legacyItemId
     * @param null|string $legacyVariationId
     * @param null|string $legacyVariationSku
     * @param null|string $fieldGroups
     * @param null|int $quantityForShippingEstimate
     * @param null|string $endUserCtx
     * @return void
     */
    public function __construct(
        public readonly string $marketplaceId,
        public readonly string $legacyItemId,
        public readonly ?string $legacyVariationId = null,
        public readonly ?string $legacyVariationSku = null,
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
            'legacy_item_id'                    => $this->legacyItemId,
            'legacy_variation_id'               => $this->legacyVariationId,
            'legacy_variation_sku'              => $this->legacyVariationSku,
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
