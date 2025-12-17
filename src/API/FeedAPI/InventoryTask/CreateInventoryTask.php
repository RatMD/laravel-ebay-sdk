<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FeedAPI\InventoryTask;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\APIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Enums\ListingFormat;

/**
 * POST /inventory_task
 * @see https://developer.ebay.com/api-docs/sell/feed/resources/inventory_task/methods/createInventoryTask
 */
class CreateInventoryTask implements APIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/feed/v1/inventory_task';

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
            'feedType'                      => ['required'],
            'filterCriteria'                => ['required', 'array'],
            'filterCriteria.listingFormat'  => ['required', Rule::enum(ListingFormat::class)],
            'schemaVersion'                 => ['required'],
        ])->validate();
    }
}
