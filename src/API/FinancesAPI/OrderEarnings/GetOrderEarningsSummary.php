<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FinancesAPI\OrderEarnings;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Support\FilterQuery;

/**
 * GET /order_earnings_summary
 * @see https://developer.ebay.com/api-docs/sell/finances/resources/order_earnings/methods/getOrderEarningsSummary
 */
class GetOrderEarningsSummary implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/account/v1/order_earnings_summary';

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
