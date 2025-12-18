<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\TaxonomyAPI\CategoryTree;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /category_tree/{categoryTreeId}/fetch_item_aspects
 * @see https://developer.ebay.com/api-docs/sell/taxonomy/resources/category_tree/methods/fetchItemAspects
 */
class FetchItemAspects implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/commerce/taxonomy/v1/category_tree/{categoryTreeId}/fetch_item_aspects';

    /**
     * Create a new instance.
     * @param int $categoryTreeId
     * @return void
     */
    public function __construct(
        public readonly int $categoryTreeId,
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
}
