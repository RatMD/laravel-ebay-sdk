<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\FeedAPI\Access;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /access
 * @see https://developer.ebay.com/api-docs/buy/feed/v1/resources/access/methods/getAccess
 */
class GetAccess implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/buy/feed/v1/access';

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
