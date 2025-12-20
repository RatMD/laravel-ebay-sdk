<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MarketingAPI\EmailCampaign;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /email_campaign
 * @see https://developer.ebay.com/api-docs/sell/marketing/resources/email_campaign/methods/getEmailCampaigns
 */
class GetEmailCampaigns implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/marketing/v1/email_campaign';

    /**
     * Create a new instance.
     * @param ?string $q
     * @param ?string $sort
     * @param int $limit
     * @param int $offset
     * @return void
     */
    public function __construct(
        public readonly ?string $q = null,
        public readonly ?string $sort = null,
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
            'q'         => $this->q,
            'sort'      => $this->sort,
            'limit'     => $this->limit,
            'offset'    => $this->offset,
        ];
    }
}
