<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MarketingAPI\EmailCampaign;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * PUT /email_campaign/{emailCampaignId}
 * @see https://developer.ebay.com/api-docs/sell/marketing/resources/email_campaign/methods/updateEmailCampaign
 */
class UpdateEmailCampaign implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/marketing/v1/email_campaign/{emailCampaignId}';

    /**
     * Create a new instance.
     * @param string $emailCampaignId
     * @param array $payload
     * @return void
     */
    public function __construct(
        public readonly string $emailCampaignId,
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
        return ['emailCampaignId' => $this->emailCampaignId];
    }

    /**
     * @inheritdoc
     */
    public function body(): array
    {
        return $this->payload;
    }
}
