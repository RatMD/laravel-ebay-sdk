<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MarketingAPI\Campaign;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /ad_campaign
 * @see https://developer.ebay.com/api-docs/sell/marketing/resources/campaign/methods/getCampaigns
 */
class GetCampaign implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/marketing/v1/ad_campaign';

    /**
     * Create a new instance.
     * @param null|string $campaignStatus
     * @param null|string $startDateRange
     * @param null|string $endDateRange
     * @param null|string $campaignName
     * @param null|string $fundingStrategy
     * @param null|string $channels
     * @param null|string $campaignTargetingTypes
     * @param int $limit
     * @param int $offset
     * @return void
     */
    public function __construct(
        public readonly ?string $campaignStatus = null,
        public readonly ?string $startDateRange = null,
        public readonly ?string $endDateRange = null,
        public readonly ?string $campaignName = null,
        public readonly ?string $fundingStrategy = null,
        public readonly ?string $channels = null,
        public readonly ?string $campaignTargetingTypes = null,
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
            'campaign_status'           => $this->campaignStatus,
            'start_date_range'          => $this->startDateRange,
            'end_date_range'            => $this->endDateRange,
            'campaign_name'             => $this->campaignName,
            'funding_strategy'          => $this->fundingStrategy,
            'channels'                  => $this->channels,
            'campaign_targeting_types'  => $this->campaignTargetingTypes,
            'limit'                     => $this->limit,
            'offset'                    => $this->offset,
        ];
    }
}
