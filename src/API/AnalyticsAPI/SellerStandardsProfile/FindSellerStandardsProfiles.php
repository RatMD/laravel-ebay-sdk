<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AnalyticsAPI\SellerStandardsProfile;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /seller_standards_profile
 * @see https://developer.ebay.com/api-docs/sell/analytics/resources/seller_standards_profile/methods/findSellerStandardsProfiles
 */
class FindSellerStandardsProfiles implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/analytics/v1/seller_standards_profile';

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
