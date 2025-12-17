<?php declare(strict_types=1);

namespace Rat\eBaySDK\Enums;

/**
 * @internal
 */
enum HTTPMethod: string
{
    /**
     * HTTP OPTIONS method
     */
    case OPTIONS = "OPTIONS";

    /**
     * HTTP GET method
     */
    case GET = "GET";

    /**
     * HTTP PATCH method
     */
    case PATCH = "PATCH";

    /**
     * HTTP POST method
     */
    case POST = "POST";

    /**
     * HTTP PUT method
     */
    case PUT = "PUT";

    /**
     * HTTP DELETE method
     */
    case DELETE = "DELETE";
}
