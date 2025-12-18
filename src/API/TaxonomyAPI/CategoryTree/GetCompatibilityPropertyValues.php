<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\TaxonomyAPI\CategoryTree;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /category_tree/{categoryTreeId}/get_compatibility_property_values
 * @see https://developer.ebay.com/api-docs/sell/taxonomy/resources/category_tree/methods/getCompatibilityPropertyValues
 */
class GetCompatibilityPropertyValues implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/commerce/taxonomy/v1/category_tree/{categoryTreeId}/get_compatibility_property_values';

    /**
     * Create a new instance.
     * @param int $categoryTreeId
     * @param int $categoryId
     * @param string $compatibilityProperty
     * @param ?string $filter
     * @return void
     */
    public function __construct(
        public readonly int $categoryTreeId,
        public readonly int $categoryId,
        public readonly string $compatibilityProperty,
        public readonly ?string $filter = null,
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
            'category_id'               => $this->categoryId,
            'compatibility_property'    => $this->compatibilityProperty,
            'filter'                    => $this->filter,
        ];
    }
}
