<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AccountAPIv2\RateTable;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /rate_table/{rateTableId}
 * @see https://developer.ebay.com/api-docs/sell/account/v2/resources/rate_table/methods/getRateTable
 */
class GetRateTables implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/account/v2/rate_table/{rateTableId}';

    /**
     * Create a new instance.
     * @param string $rateTableId
     * @return void
     */
    public function __construct(
        public readonly string $rateTableId
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
        return ['rateTableId' => $this->rateTableId];
    }
}
