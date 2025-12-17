<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\InventoryAPI\Location;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * DELETE /location/{merchantLocationKey}
 * @see https://developer.ebay.com/api-docs/sell/inventory/resources/location/methods/deleteInventoryLocation
 */
class DeleteInventoryLocation implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/inventory/v1/location/{merchantLocationKey}';

    /**
     * Create a new instance.
     * @param string $merchantLocationKey
     * @return void
     */
    public function __construct(
        public readonly string $merchantLocationKey,
    ) { }

    /**
     * @inheritdoc
     */
    public function method(): HTTPMethod
    {
        return HTTPMethod::DELETE;
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
}
