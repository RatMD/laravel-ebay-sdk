<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MarketingAPI\NegativeKeyword;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * PUT /negative_keyword/{negativeKeywordId}
 * @see https://developer.ebay.com/api-docs/sell/marketing/resources/negative_keyword/methods/updateNegativeKeyword
 */
class UpdateNegativeKeyword implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/marketing/v1/negative_keyword/{negativeKeywordId}';

    /**
     * Create a new instance.
     * @param string $negativeKeywordId
     * @param array $payload
     * @return void
     */
    public function __construct(
        public readonly string $negativeKeywordId,
        public readonly array $payload,
    ) { }

    /**
     * @inheritdoc
     */
    public function method(): HTTPMethod
    {
        return HTTPMethod::PUT;
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
        return ['negativeKeywordId' => $this->negativeKeywordId];
    }

    /**
     * @inheritdoc
     */
    public function body(): array
    {
        return $this->payload;
    }
}
