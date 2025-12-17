<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AccountAPI\Program;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\APIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /program/get_opted_in_programs
 * @see https://developer.ebay.com/api-docs/sell/account/resources/program/methods/getOptedInPrograms
 */
class GetOptedInPrograms implements APIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/account/v1/program/get_opted_in_programs';

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
