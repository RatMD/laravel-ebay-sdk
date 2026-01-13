<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FulfillmentAPI\Order;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /order/{orderId}
 * @see https://developer.ebay.com/api-docs/sell/fulfillment/resources/order/methods/getOrder
 */
class GetOrder implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/order/{orderId}';

    /**
     * Create a new instance.
     * @param string $orderId
     * @param null|string $fieldGroups
     * @return void
     */
    public function __construct(
        public readonly string $orderId,
        public readonly ?string $fieldGroups = null,
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
        return ['orderId' => $this->orderId];
    }

    /**
     * @inheritdoc
     */
    public function query(): array
    {
        return ['fieldGroups' => $this->fieldGroups];
    }
}
