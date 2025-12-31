<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MarketingAPI\MostWatchedItems;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /most_watched_items
 * @see https://developer.ebay.com/api-docs/buy/marketing/v1/resources/most_watched_items/methods/getMostWatchedItems
 */
class GetMostWatchedItems implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/buy/marketing/v1/most_watched_items';

    /**
     * Create a new instance.
     * @param string $marketplaceId
     * @param string $categoryId
     * @param null|int $maxResults
     * @param null|string $endUserCtx
     * @return void
     */
    public function __construct(
        public readonly string $marketplaceId,
        public readonly string $categoryId,
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
            'category_id'   => $this->categoryId,
            'max_results'   => $this->maxResults,
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
