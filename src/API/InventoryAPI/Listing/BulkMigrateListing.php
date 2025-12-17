<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\InventoryAPI\Listing;

use Illuminate\Support\Facades\Validator;
use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\APIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * POST /bulk_migrate_listing
 * @see https://developer.ebay.com/api-docs/sell/inventory/resources/listing/methods/bulkMigrateListing
 */
class BulkMigrateListing implements APIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/inventory/v1/bulk_migrate_listing';

    /**
     * Create a new instance.
     * @param array $payload
     * @return void
     */
    public function __construct(
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
    public function validate(): void
    {
        Validator::make($this->payload, [
            'requests'              => ['required', 'array', 'min:1', 'max:5'],
            'requests.*.listingId'  => ['required'],
        ])->validate();
    }
}
