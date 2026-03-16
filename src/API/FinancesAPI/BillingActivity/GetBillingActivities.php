<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FinancesAPI\BillingActivity;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Support\FilterQuery;

/**
 * GET /billing_activity
 * @see https://developer.ebay.com/api-docs/sell/finances/resources/billing_activity/methods/getBillingActivities
 */
class GetBillingActivities implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/account/v1/billing_activity';

    /**
     * Create a new instance.
     * @param null|string|FilterQuery $filter
     * @param null|string $sort
     * @param null|int $limit
     * @param null|int $offset
     * @return void
     */
    public function __construct(
        public readonly null|string|FilterQuery $filter = null,
        public readonly null|string $sort = null,
        public readonly null|int $limit = 100,
        public readonly null|int $offset = 0,
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
            'sort'      => $this->sort,
            'limit'     => $this->limit,
            'offset'    => $this->offset,
        ];
    }
}
