<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FulfillmentAPI\Order\ShippingFulfillment;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * POST /order/{orderId}/shipping_fulfillment
 * @see https://developer.ebay.com/api-docs/sell/fulfillment/resources/order/shipping_fulfillment/methods/createShippingFulfillment
 */
class CreateShippingFulfillment implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/fulfillment/v1/order/{orderId}/shipping_fulfillment';

    /**
     * Create a new instance.
     * @param string $orderId
     * @param array $payload
     * @return void
     */
    public function __construct(
        public readonly string $orderId,
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
    public function params(): array
    {
        return ['orderId' => $this->orderId];
    }

    /**
     * @inheritdoc
     */
    public function body(): array
    {
        return $this->payload;
    }
}
