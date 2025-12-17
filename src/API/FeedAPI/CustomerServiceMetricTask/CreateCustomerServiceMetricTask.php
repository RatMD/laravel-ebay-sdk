<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FeedAPI\CustomerServiceMetricTask;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\CustomerServiceMetricType;
use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Enums\Marketplace;

/**
 * POST /customer_service_metric_task
 * @see https://developer.ebay.com/api-docs/sell/feed/resources/customer_service_metric_task/methods/createCustomerServiceMetricTask
 */
class CreateCustomerServiceMetricTask implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/feed/v1/customer_service_metric_task';

    /**
     * Create a new instance.
     * @param array $payload
     * @return void
     */
    public function __construct(
        public readonly array $payload,
    ) { }

    /**
     * @inheritdoc
     */
    public function method(): HTTPMethod
    {
        return HTTPMethod::POST;
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
    public function body(): array
    {
        return $this->payload;
    }

    /**
     * @inheritdoc
     */
    public function validate(): void
    {
        Validator::make($this->payload, [
            'feedType'                                  => ['required'],
            'filterCriteria'                            => ['required', 'array'],
            'filterCriteria.customerServiceMetricType'  => ['required', Rule::enum(CustomerServiceMetricType::class)],
            'filterCriteria.evaluationMarketplaceId'    => ['required', Rule::enum(Marketplace::class)],
            'schemaVersion'                             => ['required'],
        ])->validate();
    }
}
