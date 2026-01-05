<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\BrowseAPI\ItemSummary;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Support\FilterQuery;

/**
 * POST /item_summary/search_by_image
 * @see https://developer.ebay.com/api-docs/buy/browse/resources/item_summary/methods/searchByImage
 */
class SearchByImage implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/buy/browse/v1/item_summary/search_by_image';

    /**
     * Create a new instance.
     * @param string $marketplaceId
     * @param string $base64Image
     * @param null|string $charityIds
     * @param null|string $categoryIds
     * @param null|string $fieldGroups
     * @param null|string|FilterQuery $aspectFilter
     * @param null|string|FilterQuery $filter
     * @param null|string $sort
     * @param null|int $limit
     * @param null|int $offset
     * @param null|string $endUserCtx
     * @return void
     */
    public function __construct(
        public readonly string $marketplaceId,
        public readonly string $base64Image,
        public readonly null|string $charityIds = null,
        public readonly null|string $categoryIds = null,
        public readonly null|string $fieldGroups = null,
        public readonly null|string|FilterQuery $aspectFilter = null,
        public readonly null|string|FilterQuery $filter = null,
        public readonly null|string $sort = null,
        public readonly null|int $limit = 50,
        public readonly null|int $offset = 0,
        public readonly null|string $endUserCtx = null,
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
    public function query(): array
    {
        return [
            'charity_ids'           => $this->charityIds,
            'category_ids'          => $this->categoryIds,
            'fieldgroups'           => $this->fieldGroups,
            'aspect_filter'         => $this->aspectFilter,
            'filter'                => $this->filter,
            'sort'                  => $this->sort,
            'limit'                 => $this->limit,
            'offset'                => $this->offset,
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

    /**
     * @inheritdoc
     */
    public function body(): array
    {
        return ['image' => $this->base64Image];
    }
}
