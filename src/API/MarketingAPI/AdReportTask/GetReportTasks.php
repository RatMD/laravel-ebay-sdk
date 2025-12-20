<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MarketingAPI\AdReportTask;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /ad_report_task
 * @see https://developer.ebay.com/api-docs/sell/marketing/resources/ad_report_task/methods/getReportTasks
 */
class GetReportTasks implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/marketing/v1/ad_report_task';

    /**
     * Create a new instance.
     * @param string $reportTaskStatuses
     * @param int $limit
     * @param int $offset
     * @return void
     */
    public function __construct(
        public readonly ?string $reportTaskStatuses = null,
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
            'report_task_statuses'  => $this->reportTaskStatuses,
            'limit'                 => $this->limit,
            'offset'                => $this->offset,
        ];
    }
}
