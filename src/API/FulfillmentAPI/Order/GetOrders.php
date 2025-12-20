<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FulfillmentAPI\Order;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /order
 * @see https://developer.ebay.com/api-docs/sell/fulfillment/resources/order/methods/getOrders
 */
class GetOrders implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/order';

    /**
     * Create a new instance.
     * @param ?string $orderIds
     * @param ?string $fieldGroups
     * @param ?string $filter
     * @param int $limit
     * @param int $offset
     * @return void
     */
    public function __construct(
        public readonly ?string $orderIds = null,
        public readonly ?string $fieldGroups = null,
        public readonly ?string $filter = null,
        public readonly int $limit = 50,
        public readonly int $offset = 0,
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
    public function query(): array
    {
        return [
            'orderIds'      => $this->orderIds,
            'fieldGroups'   => $this->fieldGroups,
            'filter'        => $this->filter,
            'limit'         => $this->limit,
            'offset'        => $this->offset,
        ];
    }
}
