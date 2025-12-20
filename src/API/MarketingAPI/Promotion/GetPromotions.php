<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MarketingAPI\Promotion;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /promotion
 * @see https://developer.ebay.com/api-docs/sell/marketing/resources/promotion/methods/getPromotions
 */
class GetPromotions implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/marketing/v1/promotion';

    /**
     * Create a new instance.
     * @param string $marketplaceId
     * @param ?string $q
     * @param ?string $promotionStatus
     * @param ?string $promotionType
     * @param ?string $sort
     * @param int $limit
     * @param int $offset
     * @return void
     */
    public function __construct(
        public readonly string $marketplaceId,
        public readonly ?string $q = null,
        public readonly ?string $promotionStatus = null,
        public readonly ?string $promotionType = null,
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
    public function query(): array
    {
        return [
            'marketplace_id'    => $this->marketplaceId,
            'q'                 => $this->q,
            'promotion_status'  => $this->promotionStatus,
            'promotion_type'    => $this->promotionType,
            'sort'              => $this->sort,
            'limit'             => $this->limit,
            'offset'            => $this->offset
        ];
    }
}
