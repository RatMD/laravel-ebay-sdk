<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AccountAPI\RateTable;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\CountryCode;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /rate_table
 * @see https://developer.ebay.com/api-docs/sell/account/resources/rate_table/methods/getRateTables
 */
class GetRateTables implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/account/v1/rate_table';

    /**
     * Create a new instance.
     * @param null|CountryCode $countryCode
     * @return void
     */
    public function __construct(
        public readonly ?CountryCode $countryCode = null
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
        return ['country_code' => $this->countryCode];
    }
}
