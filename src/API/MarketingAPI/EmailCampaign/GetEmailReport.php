<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MarketingAPI\EmailCampaign;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /email_campaign/report
 * @see https://developer.ebay.com/api-docs/sell/marketing/resources/email_campaign/methods/getEmailReport
 */
class GetEmailReport implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/marketing/v1/email_campaign/report';

    /**
     * Create a new instance.
     * @param string $startDate
     * @param string $endDate
     * @return void
     */
    public function __construct(
        public readonly string $startDate,
        public readonly string $endDate,
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
            'startDate' => $this->startDate,
            'endDate'   => $this->endDate,
        ];
    }
}
