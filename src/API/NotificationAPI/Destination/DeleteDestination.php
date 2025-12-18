<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\NotificationAPI\Destination;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * DELETE /destination/{destinationId}
 * @see https://developer.ebay.com/api-docs/sell/notification/resources/destination/methods/deleteDestination
 */
class DeleteDestination implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/commerce/notification/v1/destination/{destinationId}';

    /**
     * Create a new instance.
     * @param string $destinationId
     * @return void
     */
    public function __construct(
        public readonly string $destinationId
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
        return ['destinationId' => $this->destinationId];
    }
}
