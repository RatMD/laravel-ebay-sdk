<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\CatalogAPI\ProductSummary;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Support\FilterQuery;

/**
 * GET /product_summary/search
 * @see https://developer.ebay.com/api-docs/sell/catalog/resources/product_summary/methods/search
 */
class Search implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/commerce/catalog/v1_beta/product_summary/search';

    /**
     * Create a new instance.
     * @param null|string $q
     * @param null|string $gtin
     * @param null|string $mpn
     * @param null|string $categoryIds
     * @param null|string|FilterQuery $aspectFilter
     * @param null|string $fieldGroups
     * @param null|int $limit
     * @param null|int $offset
     * @return void
     */
    public function __construct(
        public readonly null|string $q = null,
        public readonly null|string $gtin = null,
        public readonly null|string $mpn = null,
        public readonly null|string $categoryIds = null,
        public readonly null|string|FilterQuery $aspectFilter = null,
        public readonly null|string $fieldGroups = null,
        public readonly null|int $limit = 50,
        public readonly null|int $offset = 0,
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
            'q'             => $this->q,
            'gtin'          => $this->gtin,
            'mpn'           => $this->mpn,
            'category_ids'  => $this->categoryIds,
            'aspect_filter' => $this->aspectFilter,
            'fieldgroups'   => $this->fieldGroups,
            'limit'         => $this->limit,
            'offset'        => $this->offset,
        ];
    }
}
