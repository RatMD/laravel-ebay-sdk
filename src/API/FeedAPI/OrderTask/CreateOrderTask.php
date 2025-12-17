<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FeedAPI\OrderTask;

use Illuminate\Support\Facades\Validator;
use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * POST /order_task
 * @see https://developer.ebay.com/api-docs/sell/feed/resources/order_task/methods/createOrderTask
 */
class CreateOrderTask implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/feed/v1/order_task';

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
            'feedType'                      => ['required'],
            'filterCriteria'                => ['nullable', 'array'],
            'schemaVersion'                 => ['required'],
        ])->validate();
    }
}
