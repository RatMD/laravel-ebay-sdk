<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AccountAPIv2\CombinedShippingRules;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * POST /combined_shipping_rules/create_calculated_shipping_rules
 * @see https://developer.ebay.com/api-docs/sell/account/v2/resources/combined_shipping_rules/methods/createCalculatedShippingRules
 */
class CreateCalculatedShippingRules implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/account/v2/combined_shipping_rules/create_calculated_shipping_rules';

    /**
     * Create a new instance.
     * @param string $marketplaceId
     * @param array $payload
     * @return void
     */
    public function __construct(
        public readonly string $marketplaceId,
        public readonly array $payload,
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
    public function body(): array
    {
        return $this->payload;
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
