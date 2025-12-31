<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AnalyticsAPI\SellerStandardsProfile;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\CycleType;
use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Enums\Program;

/**
 * GET /seller_standards_profile/{program}/{cycle}
 * @see https://developer.ebay.com/api-docs/sell/analytics/resources/seller_standards_profile/methods/getSellerStandardsProfile
 */
class GetSellerStandardsProfile implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/analytics/v1/seller_standards_profile/{program}/{cycle}';

    /**
     * Create a new instance.
     * @param Program $program
     * @param CycleType $cycle
     * @return void
     */
    public function __construct(
        public readonly Program $program,
        public readonly CycleType $cycle,
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
        return ['program' => $this->program, 'cycle' => $this->cycle];
    }
}
