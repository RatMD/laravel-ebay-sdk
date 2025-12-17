<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AccountAPIv2\PayoutSettings;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /payout_settings
 * @see https://developer.ebay.com/api-docs/sell/account/v2/resources/payout_settings/methods/getPayoutSettings
 */
class GetPayoutSettings implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/account/v2/payout_settings';

    /**
     * Create a new instance.
     * @return void
     */
    public function __construct() { }

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
}
