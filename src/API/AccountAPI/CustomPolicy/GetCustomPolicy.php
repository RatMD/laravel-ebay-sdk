<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AccountAPI\CustomPolicy;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /custom_policy/{customPolicyId}
 * @see https://developer.ebay.com/api-docs/sell/account/resources/custom_policy/methods/getCustomPolicy
 */
class GetCustomPolicy implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/account/v1/custom_policy/{customPolicyId}';

    /**
     * Create a new instance.
     * @param string $customPolicyId
     * @return void
     */
    public function __construct(
        public readonly string $customPolicyId,
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
        return ['customPolicyId' => $this->customPolicyId];
    }
}
