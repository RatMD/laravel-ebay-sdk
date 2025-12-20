<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MarketingAPI\Keyword;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * PUT /ad_campaign/{campaignId}/keyword/{keywordId}
 * @see https://developer.ebay.com/api-docs/sell/marketing/resources/keyword/methods/updateKeyword
 */
class UpdateKeyword implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/marketing/v1/ad_campaign/{campaignId}/keyword/{keywordId}';

    /**
     * Create a new instance.
     * @param string $campaignId
     * @param string $keywordId
     * @param array $payload
     * @return void
     */
    public function __construct(
        public readonly string $campaignId,
        public readonly string $keywordId,
        public readonly array $payload,
    ) { }

    /**
     * @inheritdoc
     */
    public function method(): HTTPMethod
    {
        return HTTPMethod::PUT;
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
        return [
            'campaignId'    => $this->campaignId,
            'keywordId'     => $this->keywordId,
        ];
    }

    /**
     * @inheritdoc
     */
    public function body(): array
    {
        return $this->payload;
    }
}
