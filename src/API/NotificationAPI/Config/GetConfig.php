<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\NotificationAPI\Config;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /config
 * @see https://developer.ebay.com/api-docs/sell/notification/resources/config/methods/getConfig
 */
class GetConfig implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/commerce/notification/v1/config';

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
