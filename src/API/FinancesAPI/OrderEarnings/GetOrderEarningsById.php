<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FinancesAPI\OrderEarnings;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /order_earnings/{orderId}
 * @see https://developer.ebay.com/api-docs/sell/finances/resources/order_earnings/methods/getOrderEarningsById
 */
class GetOrderEarningsById implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/account/v1/order_earnings/{orderId}';

    /**
     * Create a new instance.
     * @param string $marketplaceId
     * @param string $orderId
     * @return void
     */
    public function __construct(
        public readonly string $marketplaceId,
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
        return ['orderId' => $this->orderId];
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
