<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\NegotiationAPI\Offer;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /find_eligible_items
 * @see https://developer.ebay.com/api-docs/sell/negotiation/resources/offer/methods/findEligibleItems
 */
class FindEligibleItems implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/negotiation/v1/find_eligible_items';

    /**
     * Create a new instance.
     * @param int $limit
     * @param int $offset
     * @return void
     */
    public function __construct(
        public readonly int $limit = 10,
        public readonly int $offset = 0,
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
            'limit'             => $this->limit,
            'offset'            => $this->offset
        ];
    }
}
