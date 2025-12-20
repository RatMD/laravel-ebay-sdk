<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MarketingAPI\AdGroup;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /ad_campaign/{campaignId}/ad_group
 * @see https://developer.ebay.com/api-docs/sell/marketing/resources/ad_group/methods/getAdGroups
 */
class GetAdGroups implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/marketing/v1/ad_campaign/{campaignId}/ad_group';

    /**
     * Create a new instance.
     * @param string $campaignId
     * @param string $adGroupStatus
     * @param int $limit
     * @param int $offset
     * @return void
     */
    public function __construct(
        public readonly string $campaignId,
        public readonly string $adGroupStatus,
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
            'ad_group_status'   => $this->adGroupStatus,
            'limit'             => $this->limit,
            'offset'            => $this->offset,
        ];
    }
}
