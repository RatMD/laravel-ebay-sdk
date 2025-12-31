<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AnalyticsAPI\RateLimit;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /rate_limit
 * @see https://developer.ebay.com/api-docs/developer/analytics/resources/rate_limit/methods/getRateLimits
 */
class GetRateLimits implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/developer/analytics/v1_beta/rate_limit';

    /**
     * Create a new instance.
     * @param null|string $apiName
     * @param null|string $apiContext
     * @return void
     */
    public function __construct(
        public readonly null|string $apiName = null,
        public readonly null|string $apiContext = null,
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
            'api_name'      => $this->apiName,
            'api_context'   => $this->apiContext,
        ];
    }
}
