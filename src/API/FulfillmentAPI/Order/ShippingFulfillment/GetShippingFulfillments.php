<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FulfillmentAPI\Order\ShippingFulfillment;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /order/{orderId}/shipping_fulfillment
 * @see https://developer.ebay.com/api-docs/sell/fulfillment/resources/order/shipping_fulfillment/methods/getShippingFulfillments
 */
class GetShippingFulfillments implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/order/{orderId}/shipping_fulfillment';

    /**
     * Create a new instance.
     * @param string $orderId
     * @return void
     */
    public function __construct(
        public readonly string $orderId,
    ) { }

    /**
     * @inheritdoc
     */
    public function base(string $environment): ?string
    {
        if ($environment === 'production') {
            return 'https://apiz.ebay.com';
        } else {
            return 'https://apiz.sandbox.ebay.com';
        }
    }

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
            'orderId'       => $this->orderId
        ];
    }
}
