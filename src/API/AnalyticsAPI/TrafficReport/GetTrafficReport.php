<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AnalyticsAPI\TrafficReport;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Enums\TrafficReportDimension;
use Rat\eBaySDK\Enums\TrafficReportMetric;
use Rat\eBaySDK\Support\FilterQuery;
use Rat\eBaySDK\Support\QueryString;

/**Data
 * GET /traffic_report
 * @see https://developer.ebay.com/api-docs/sell/analytics/resources/traffic_report/methods/getTrafficReport
 */
class GetTrafficReport implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/analytics/v1/traffic_report';

    /**
     * Create a new instance.
     * @param string|TrafficReportDimension $dimension
     * @param string|TrafficReportMetric|TrafficReportMetric[]|string[] $metric
     * @param string|FilterQuery $filter
     * @param null|string $sort
     * @return void
     */
    public function __construct(
        public readonly string|TrafficReportDimension $dimension,
        public readonly string|TrafficReportMetric|array $metric,
        public readonly string|FilterQuery $filter,
        public readonly ?string $sort = null,
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
            'dimension' => QueryString::formatData($this->dimension),
            'metric'    => QueryString::formatData($this->metric),
            'filter'    => $this->filter,
            'sort'      => $this->sort
        ];
    }
}
