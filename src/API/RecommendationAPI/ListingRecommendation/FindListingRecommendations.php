<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\RecommendationAPI\ListingRecommendation;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Support\FilterQuery;

/**
 * GET /find
 * @see https://developer.ebay.com/api-docs/sell/recommendation/static/overview.html
 */
class FindListingRecommendations implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/recommendation/v1/find';

    /**
     * Create a new instance.
     * @param null|string|FilterQuery $filter
     * @param int $limit
     * @param int $offset
     * @return void
     */
    public function __construct(
        public readonly null|string|FilterQuery $filter = null,
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
    public function query(): array
    {
        return [
            'filter'    => $this->filter,
            'limit'     => $this->limit,
            'offset'    => $this->offset
        ];
    }
}
