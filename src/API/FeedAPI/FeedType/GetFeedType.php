<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FeedAPI\FeedType;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /feed_type/{feedTypeId}
 * @see https://developer.ebay.com/api-docs/buy/feed/v1/resources/feed_type/methods/getFeedType
 */
class GetFeedType implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/buy/feed/v1/feed_type/{feedTypeId}';

    /**
     * Create a new instance.
     * @param string $feedTypeId
     * @return void
     */
    public function __construct(
        public readonly string $feedTypeId,
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
        return ['feedTypeId' => $this->feedTypeId];
    }
}
