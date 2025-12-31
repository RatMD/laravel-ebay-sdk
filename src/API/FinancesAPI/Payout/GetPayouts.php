<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FinancesAPI\Payout;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /payout
 * @see https://developer.ebay.com/api-docs/sell/finances/resources/payout/methods/getPayouts
 */
class GetPayouts implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/account/v1/payout';

    /**
     * Create a new instance.
     * @param string $marketplaceId
     * @param int $limit
     * @param int $offset
     * @param null|string $filter
     * @param null|string $sort
     * @return void
     */
    public function __construct(
        public readonly string $marketplaceId,
        public readonly int $limit = 20,
        public readonly int $offset = 0,
        public readonly ?string $filter = null,
        public readonly ?string $sort = null,
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
            'limit'     => $this->limit,
            'offset'    => $this->offset,
            'filter'    => $this->filter,
            'sort'      => $this->sort,
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
