<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AnalyticsAPI\TrafficReport;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
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
     * @param string $dimension
     * @param string $metric
     * @param string $filter
     * @param ?string $sort
     * @return void
     */
    public function __construct(
        public readonly string $dimension,
        public readonly string $metric,
        public readonly string $filter,
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
            'dimension' => $this->dimension,
            'metric' => $this->metric,
            'filter' => $this->filter,
            'sort' => $this->sort
        ];
    }
}
