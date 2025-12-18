<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\TaxonomyAPI\CategoryTree;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /get_default_category_tree_id
 * @see https://developer.ebay.com/api-docs/sell/taxonomy/resources/category_tree/methods/getDefaultCategoryTreeId
 */
class GetDefaultCategoryTreeId implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/commerce/taxonomy/v1/get_default_category_tree_id';

    /**
     * Create a new instance.
     * @param string $marketplaceId
     * @return void
     */
    public function __construct(
        public readonly string $marketplaceId,
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
            'marketplace_id'    => $this->marketplaceId,
        ];
    }
}
