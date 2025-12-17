<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\InventoryAPI\Location;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * POST /location/{merchantLocationKey}/update_location_details
 * @see https://developer.ebay.com/api-docs/sell/inventory/resources/location/methods/updateInventoryLocation
 */
class UpdateInventoryLocation implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/inventory/v1/location/{merchantLocationKey}/update_location_details';

    /**
     * Create a new instance.
     * @param string $merchantLocationKey
     * @param array $payload
     * @return void
     */
    public function __construct(
        public readonly string $merchantLocationKey,
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
    public function params(): array
    {
        return ['merchantLocationKey' => $this->merchantLocationKey];
    }

    /**
     * @inheritdoc
     */
    public function body(): array
    {
        return $this->payload;
    }
}
