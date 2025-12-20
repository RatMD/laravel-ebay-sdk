<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MarketingAPI\Ad;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /ad_campaign/{campaignId}/ad
 * @see https://developer.ebay.com/api-docs/sell/marketing/resources/ad/methods/getAds
 */
class GetAds implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/marketing/v1/ad_campaign/{campaignId}/ad';

    /**
     * Create a new instance.
     * @param string $campaignId
     * @param ?string $listingIds
     * @param ?string $adGroupIds
     * @param ?string $adStatus
     * @param int $limit
     * @param int $offset
     * @return void
     */
    public function __construct(
        public readonly string $campaignId,
        public readonly ?string $listingIds = null,
        public readonly ?string $adGroupIds = null,
        public readonly ?string $adStatus = null,
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
            'listing_ids'   => $this->listingIds,
            'ad_group_ids'  => $this->adGroupIds,
            'ad_status'     => $this->adStatus,
            'limit'         => $this->limit,
            'offset'        => $this->offset,
        ];
    }
}
