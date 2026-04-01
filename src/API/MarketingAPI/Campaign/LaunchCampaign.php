<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MarketingAPI\Campaign;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Exceptions\DecommissionedException;

/**
 * POST /ad_campaign/{campaignId}/launch
 * @see https://developer.ebay.com/api-docs/sell/marketing/resources/campaign/methods/launchCampaign
 */
class LaunchCampaign implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/marketing/v1/ad_campaign/{campaignId}/launch';

    /**
     * Create a new instance.
     * @param string $campaignId
     * @return void
     */
    public function __construct(
        public readonly string $campaignId,
    ) {
        throw new DecommissionedException('This API resource has been deprecated and is no longer available as of Marketing API version 1.23.0.');
    }

    /**
     * @inheritdoc
     */
    public function method(): HTTPMethod
    {
        return HTTPMethod::POST;
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
}
