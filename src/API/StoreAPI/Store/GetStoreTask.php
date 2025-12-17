<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\StoreAPI\Store;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /store/task/{taskId}
 * @see https://developer.ebay.com/api-docs/sell/stores/resources/store/methods/getStoreTask
 */
class GetStoreTask implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/stores/v1/store/task/{taskId}';

    /**
     * Create a new instance.
     * @param string $taskId
     * @return void
     */
    public function __construct(
        public readonly string $taskId,
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
    public function params(): array
    {
        return ['taskId' => $this->taskId];
    }
}
