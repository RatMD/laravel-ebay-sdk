<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\TaxonomyAPI\CategoryTree;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /category_tree/{categoryTreeId}/get_category_subtree
 * @see https://developer.ebay.com/api-docs/sell/taxonomy/resources/category_tree/methods/getCategorySubtree
 */
class GetCategorySubtree implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/commerce/taxonomy/v1/category_tree/{categoryTreeId}/get_category_subtree';

    /**
     * Create a new instance.
     * @param int $categoryTreeId
     * @param int $categoryId
     * @param bool $gzip
     * @return void
     */
    public function __construct(
        public readonly int $categoryTreeId,
        public readonly int $categoryId,
        public readonly bool $gzip = false,
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

    /**
     * @inheritdoc
     */
    public function headers(): array
    {
        if ($this->gzip) {
            return ['Accept-Encoding' => 'gzip'];
        } else {
            return [];
        }
    }
}
