<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\StoreAPI\Store;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /store/tasks
 * @see https://developer.ebay.com/api-docs/sell/stores/resources/store/methods/getStoreTasks
 */
class GetStoreTasks implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/stores/v1/store/tasks';

    /**
     * Create a new instance.
     * @return void
     */
    public function __construct() { }

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
}
