<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MarketingAPI\Promotion;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * POST /promotion/{promotionId}/pause
 * @see https://developer.ebay.com/api-docs/sell/marketing/resources/promotion/methods/pausePromotion
 */
class PausePromotion implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/marketing/v1/promotion/{promotionId}/pause';

    /**
     * Create a new instance.
     * @param string $promotionId
     * @return void
     */
    public function __construct(
        public readonly string $promotionId,
    ) { }

    /**
     * @inheritdoc
     */
    public function method(): HTTPMethod
    {
        return HTTPMethod::POST;
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
        return ['promotionId' => $this->promotionId];
    }
}
