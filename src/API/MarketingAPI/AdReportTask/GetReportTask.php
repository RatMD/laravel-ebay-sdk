<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MarketingAPI\AdReportTask;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /ad_report_task/{reportTaskId}
 * @see https://developer.ebay.com/api-docs/sell/marketing/resources/ad_report_task/methods/getReportTask
 */
class GetReportTask implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/marketing/v1/ad_report_task/{reportTaskId}';

    /**
     * Create a new instance.
     * @param string $reportTaskId
     * @return void
     */
    public function __construct(
        public readonly string $reportTaskId,
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
        return ['reportTaskId' => $this->reportTaskId];
    }
}
