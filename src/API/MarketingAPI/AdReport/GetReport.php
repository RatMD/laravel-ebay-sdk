<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MarketingAPI\AdReport;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /ad_report/{reportId}
 * @see https://developer.ebay.com/api-docs/sell/marketing/resources/ad_report/methods/getReport
 */
class GetReport implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/marketing/v1/ad_report/{reportId}';

    /**
     * Create a new instance.
     * @param string $reportId
     * @return void
     */
    public function __construct(
        public readonly string $reportId,
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
        return ['reportId' => $this->reportId];
    }
}
