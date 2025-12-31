<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MarketingAPI\SimilarItems;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /similar_items
 * @see https://developer.ebay.com/api-docs/buy/marketing/v1/resources/similar_items/methods/getSimilarItems
 */
class GetSimilarItems implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/buy/marketing/v1/similar_items';

    /**
     * Create a new instance.
     * @param string $marketplaceId
     * @param string $itemId
     * @param null|string $excludedCategoryIds
     * @param null|string $buyingOption
     * @param null|string $filter
     * @param null|int $maxResults
     * @param null|string $endUserCtx
     * @return void
     */
    public function __construct(
        public readonly string $marketplaceId,
        public readonly string $itemId,
        public readonly ?string $excludedCategoryIds = null,
        public readonly ?string $buyingOption = null,
        public readonly ?string $filter = null,
        public readonly ?int $maxResults = 20,
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
            'item_id'               => $this->itemId,
            'excluded_category_ids' => $this->excludedCategoryIds,
            'buying_option'         => $this->buyingOption,
            'filter'                => $this->filter,
            'max_results'           => $this->maxResults,
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
