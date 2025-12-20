<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MarketingAPI\Campaign;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /ad_campaign/get_campaign_by_name
 * @see https://developer.ebay.com/api-docs/sell/marketing/resources/campaign/methods/getCampaignByName
 */
class GetCampaignByName implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/marketing/v1/ad_campaign/get_campaign_by_name';

    /**
     * Create a new instance.
     * @param string $campaignName
     * @return void
     */
    public function __construct(
        public readonly string $campaignName,
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
        return ['campaign_name' => $this->campaignName];
    }
}
