<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AnalyticsAPI\CustomerServiceMetric;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\CustomerServiceMetricType;
use Rat\eBaySDK\Enums\EvaluationType;
use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Enums\Marketplace;

/**
 * GET /customer_service_metric/{customerServiceMetricType}/{evaluationType}
 * @see https://developer.ebay.com/api-docs/sell/analytics/resources/customer_service_metric/methods/getCustomerServiceMetric
 */
class GetCustomerServiceMetric implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/analytics/v1/customer_service_metric/{customerServiceMetricType}/{evaluationType}';

    /**
     * Create a new instance.
     * @param CustomerServiceMetricType $customerServiceMetricType
     * @param EvaluationType $evaluationType
     * @param Marketplace $evaluationMarketplaceId
     * @return void
     */
    public function __construct(
        public readonly CustomerServiceMetricType $customerServiceMetricType,
        public readonly EvaluationType $evaluationType,
        public readonly Marketplace $evaluationMarketplaceId,
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
        return [
            'customerServiceMetricType' => $this->customerServiceMetricType,
            'evaluationType'            => $this->evaluationType,
        ];
    }

    /**
     * @inheritdoc
     */
    public function query(): array
    {
        return [
            'evaluation_marketplace_id' => $this->evaluationMarketplaceId,
        ];
    }
}
