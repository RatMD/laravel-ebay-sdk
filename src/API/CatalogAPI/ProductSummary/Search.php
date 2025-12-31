<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\CatalogAPI\ProductSummary;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

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
     * @param null|string $aspectFilter
     * @param null|string $fieldGroups
     * @param null|int $limit
     * @param null|int $offset
     * @return void
     */
    public function __construct(
        public readonly ?string $q = null,
        public readonly ?string $gtin = null,
        public readonly ?string $mpn = null,
        public readonly ?string $categoryIds = null,
        public readonly ?string $aspectFilter = null,
        public readonly ?string $fieldGroups = null,
        public readonly ?int $limit = 50,
        public readonly ?int $offset = 0,
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
