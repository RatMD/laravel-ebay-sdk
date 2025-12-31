<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MarketingAPI\Campaign;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /ad_campaign/{campaignId}/suggest_items
 * @see https://developer.ebay.com/api-docs/sell/marketing/resources/campaign/methods/suggestItems
 */
class SuggestItems implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/marketing/v1/ad_campaign/{campaignId}/suggest_items';

    /**
     * Create a new instance.
     * @param string $campaignId
     * @param null|string $categoryIds
     * @param int $limit
     * @param int $offset
     * @return void
     */
    public function __construct(
        public readonly string $campaignId,
        public readonly ?string $categoryIds = null,
        public readonly int $limit = 10,
        public readonly int $offset = 0,
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
        return ['campaignId' => $this->campaignId];
    }

    /**
     * @inheritdoc
     */
    public function query(): array
    {
        return [
            'category_ids'  => $this->categoryIds,
            'limit'         => $this->limit,
            'offset'        => $this->offset,
        ];
    }
}
