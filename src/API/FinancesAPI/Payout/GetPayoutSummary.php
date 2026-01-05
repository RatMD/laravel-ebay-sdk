<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FinancesAPI\Payout;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Support\FilterQuery;

/**
 * GET /payout_summary
 * @see https://developer.ebay.com/api-docs/sell/finances/resources/payout/methods/getPayoutSummary
 */
class GetPayoutSummary implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/account/v1/payout_summary';

    /**
     * Create a new instance.
     * @param string $marketplaceId
     * @param null|string|FilterQuery $filter
     * @return void
     */
    public function __construct(
        public readonly string $marketplaceId,
        public readonly null|string|FilterQuery $filter = null,
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
