<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MarketingAPI\NegativeKeyword;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /negative_keyword
 * @see https://developer.ebay.com/api-docs/sell/marketing/resources/negative_keyword/methods/getNegativeKeywords
 */
class GetNegativeKeywords implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/marketing/v1/negative_keyword';

    /**
     * Create a new instance.
     * @param string $adGroupIds
     * @param null|string $campaignIds
     * @param null|string $negativeKeywordStatus
     * @param int $limit
     * @param int $offset
     * @return void
     */
    public function __construct(
        public readonly ?string $adGroupIds = null,
        public readonly ?string $campaignIds = null,
        public readonly ?string $negativeKeywordStatus = null,
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
            'ad_group_ids'              => $this->adGroupIds,
            'campaign_ids'              => $this->campaignIds,
            'negative_keyword_status'   => $this->negativeKeywordStatus,
            'limit'                     => $this->limit,
            'offset'                    => $this->offset,
        ];
    }
}
