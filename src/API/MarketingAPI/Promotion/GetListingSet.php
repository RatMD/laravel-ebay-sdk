<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MarketingAPI\Promotion;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /promotion/{promotionId}/get_listing_set
 * @see https://developer.ebay.com/api-docs/sell/marketing/resources/promotion/methods/getListingSet
 */
class GetListingSet implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/marketing/v1/promotion/{promotionId}/get_listing_set';

    /**
     * Create a new instance.
     * @param string $promotionId
     * @param null|string $q
     * @param null|string $status
     * @param null|string $sort
     * @param int $limit
     * @param int $offset
     * @return void
     */
    public function __construct(
        public readonly string $promotionId,
        public readonly ?string $q = null,
        public readonly ?string $status = null,
        public readonly ?string $sort = null,
        public readonly int $limit = 200,
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
        return ['promotionId' => $this->promotionId];
    }

    /**
     * @inheritdoc
     */
    public function query(): array
    {
        return [
            'q'         => $this->q,
            'status'    => $this->status,
            'sort'      => $this->sort,
            'limit'     => $this->limit,
            'offset'    => $this->offset
        ];
    }
}
