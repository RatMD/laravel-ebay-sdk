<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\TaxonomyAPI\CategoryTree;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /category_tree/{categoryTreeId}/get_item_aspects_for_category
 * @see https://developer.ebay.com/api-docs/sell/taxonomy/resources/category_tree/methods/getItemAspectsForCategory
 */
class GetItemAspectsForCategory implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/commerce/taxonomy/v1/category_tree/{categoryTreeId}/get_item_aspects_for_category';

    /**
     * Create a new instance.
     * @param int $categoryTreeId
     * @param int $categoryId
     * @return void
     */
    public function __construct(
        public readonly int $categoryTreeId,
        public readonly int $categoryId,
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
        return [
            'categoryTreeId'    => $this->categoryTreeId,
        ];
    }

    /**
     * @inheritdoc
     */
    public function query(): array
    {
        return [
            'category_id'   => $this->categoryId,
        ];
    }
}
