<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\InventoryAPI\Location;

use Illuminate\Support\Facades\Validator;
use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\APIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /location
 * @see https://developer.ebay.com/api-docs/sell/inventory/resources/location/methods/getInventoryLocations
 */
class GetInventoryLocations implements APIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/inventory/v1/location';

    /**
     * Create a new instance.
     * @param int $limit
     * @param int $offset
     * @return void
     */
    public function __construct(
        public readonly int $limit = 25,
        public readonly int $offset = 0,
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
            'limit'     => (string) $this->limit,
            'offset'    => (string) $this->offset,
        ];
    }

    /**
     * @inheritdoc
     */
    public function validate(): void
    {
        Validator::make($this->query(), [
            'limit' => ['required', 'min:1', 'max:100']
        ])->validate();
    }
}
