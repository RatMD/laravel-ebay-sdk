<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AccountAPI\CustomPolicy;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /custom_policy
 * @see https://developer.ebay.com/api-docs/sell/account/resources/custom_policy/methods/getCustomPolicies
 */
class GetCustomPolicies implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/account/v1/custom_policy';

    /**
     * Create a new instance.
     * @param string $policyTypes
     * @return void
     */
    public function __construct(
        public readonly string $policyTypes,
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
    public function query(): array
    {
        return ['policy_types' => $this->policyTypes];
    }
}
