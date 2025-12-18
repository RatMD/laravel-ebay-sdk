<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\MetadataAPI\Compatibilities;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * POST /compatibilities/get_compatibility_property_names
 * @see https://developer.ebay.com/api-docs/sell/metadata/resources/compatibilities/methods/getCompatibilityPropertyNames
 */
class GetCompatibilityPropertyNames implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/metadata/v1/compatibilities/get_compatibility_property_names';

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
    public function headers(): array
    {
        return [
            'X-EBAY-C-MARKETPLACE-ID'   => $this->marketplaceId
        ];
    }

    /**
     * @inheritdoc
     */
    public function body(): array
    {
        return $this->payload;
    }
}
