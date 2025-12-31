<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MarketingAPI\PromotionReport;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /promotion_report
 * @see https://developer.ebay.com/api-docs/sell/marketing/resources/promotion_report/methods/getPromotionReports
 */
class GetPromotionReports implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/marketing/v1/promotion_report';

    /**
     * Create a new instance.
     * @param string $marketplaceId
     * @param null|string $q
     * @param null|string $promotionStatus
     * @param null|string $promotionType
     * @param int $limit
     * @param int $offset
     * @return void
     */
    public function __construct(
        public readonly string $marketplaceId,
        public readonly ?string $q = null,
        public readonly ?string $promotionStatus = null,
        public readonly ?string $promotionType = null,
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
            'limit'             => $this->limit,
            'offset'            => $this->offset
        ];
    }
}
