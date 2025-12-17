<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FinancesAPI\Payout;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\APIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /payout/{payoutId}
 * @see https://developer.ebay.com/api-docs/sell/finances/resources/payout/methods/getPayout
 */
class GetPayout implements APIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/account/v1/payout/{payoutId}';

    /**
     * Create a new instance.
     * @param string $marketplaceId
     * @return void
     */
    public function __construct(
        public readonly string $marketplaceId
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
    public function headers(): array
    {
        return [
            'X-EBAY-C-MARKETPLACE-ID'   => $this->marketplaceId
        ];
    }
}
