<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FeedAPI\FeedType;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /feed_type
 * @see https://developer.ebay.com/api-docs/buy/feed/v1/resources/feed_type/methods/getFeedTypes
 */
class GetFeedType implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/buy/feed/v1/feed_type';

    /**
     * Create a new instance.
     * @param null|string $feedScope
     * @param null|string $marketplaceIds
     * @param null|int $limit
     * @param null|string $continuationToken
     * @return void
     */
    public function __construct(
        public readonly ?string $feedScope = null,
        public readonly ?string $marketplaceIds = null,
        public readonly ?int $limit = 20,
        public readonly ?string $continuationToken = null,
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
            'feed_scope'            => $this->feedScope,
            'marketplace_ids'       => $this->marketplaceIds,
            'limit'                 => $this->limit,
            'continuation_token'    => $this->continuationToken,
        ];
    }
}
