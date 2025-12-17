<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FeedAPI\CustomerServiceMetricTask;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\APIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /customer_service_metric_task/{taskId}
 * @see https://developer.ebay.com/api-docs/sell/feed/resources/customer_service_metric_task/methods/getCustomerServiceMetricTask
 */
class GetCustomerServiceMetricTask implements APIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/feed/v1/customer_service_metric_task/{taskId}';

    /**
     * Create a new instance.
     * @param string $taskId
     * @return void
     */
    public function __construct(
        public readonly string $taskId,
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
        return ['taskId' => $this->taskId];
    }
}
