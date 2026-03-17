<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FinancesAPI\OrderEarnings;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Support\FilterQuery;

/**
 * GET /order_earnings
 * @see https://developer.ebay.com/api-docs/sell/finances/resources/order_earnings/methods/getOrderEarnings
 */
class GetOrderEarnings implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/account/v1/order_earnings';

    /**
     * Create a new instance.
     * @param string $marketplaceId
     * @param null|string|FilterQuery $filter
     * @param null|string $sort
     * @param null|int $limit
     * @param null|int $offset
     * @return void
     */
    public function __construct(
        public readonly string $marketplaceId,
        public readonly null|string|FilterQuery $filter = null,
        public readonly null|string $sort = null,
        public readonly null|int $limit = 20,
        public readonly null|int $offset = 0,
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
            'filter'    => $this->filter,
            'sort'      => $this->sort,
            'limit'     => $this->limit,
            'offset'    => $this->offset,
        ];
    }

    /**
     * @inheritdoc
     */
    public function headers(): array
    {
        return [
            'X-EBAY-C-MARKETPLACE-ID'   => $this->marketplaceId
        ];
    }
}
