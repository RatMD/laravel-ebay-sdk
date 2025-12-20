<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MarketingAPI\AdGroup;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * POST /ad_campaign/{campaignId}/ad_group/{adGroupId}/suggest_keywords
 * @see https://developer.ebay.com/api-docs/sell/marketing/resources/ad_group/methods/suggestKeywords
 */
class SuggestKeywords implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/marketing/v1/ad_campaign/{campaignId}/ad_group/{adGroupId}/suggest_keywords';

    /**
     * Create a new instance.
     * @param string $campaignId
     * @param string $adGroupId
     * @param array $payload
     * @return void
     */
    public function __construct(
        public readonly string $campaignId,
        public readonly string $adGroupId,
        public readonly array $payload,
    ) { }

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
        return ['campaignId' => $this->campaignId, 'adGroupId' => $this->adGroupId];
    }

    /**
     * @inheritdoc
     */
    public function body(): array
    {
        return $this->payload;
    }
}
