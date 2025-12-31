<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FeedBetaAPI\ItemPriority;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /item_priority
 * @see https://developer.ebay.com/api-docs/buy/feed/resources/item_priority/methods/getItemPriorityFeed
 */
class GetItemPriorityFeed implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/buy/feed/v1_beta/item_priority';

    /**
     * Create a new instance.
     * @param string $marketplaceId
     * @param string $categoryId
     * @param string $date
     * @param null|string $range
     * @return void
     */
    public function __construct(
        public readonly string $marketplaceId,
        public readonly string $categoryId,
        public readonly string $date,
        public readonly ?string $range = null,
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
            'date'          => $this->date,
        ];
    }

    /**
     * @inheritdoc
     */
    public function headers(): array
    {
        return [
            'X-EBAY-C-MARKETPLACE-ID'   => $this->marketplaceId,
            'Range'                     => $this->range
        ];
    }
}
