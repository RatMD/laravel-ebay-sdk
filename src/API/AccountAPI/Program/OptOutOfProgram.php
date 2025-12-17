<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AccountAPI\Program;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Enums\ProgramType;

/**
 * POST /program/opt_out
 * @see https://developer.ebay.com/api-docs/sell/account/resources/program/methods/optOutOfProgram
 */
class OptOutOfProgram implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/account/v1/program/opt_out';

    /**
     * Create a new instance.
     * @param ProgramType $programType
     * @return void
     */
    public function __construct(
        public readonly ProgramType $programType
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
        return ['programType' => $this->programType];
    }
}
