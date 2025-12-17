<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FinancesAPI\Transfer;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\APIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /transfer/{transferId}
 * @see https://developer.ebay.com/api-docs/sell/finances/resources/transfer/methods/getTransfer
 */
class GetTransfer implements APIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/account/v1/transfer/{transferId}';

    /**
     * Create a new instance.
     * @param string $transferId
     * @param string $marketplaceId
     * @return void
     */
    public function __construct(
        public readonly string $transferId,
        public readonly string $marketplaceId,
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
        return ['transferId' => $this->transferId];
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
