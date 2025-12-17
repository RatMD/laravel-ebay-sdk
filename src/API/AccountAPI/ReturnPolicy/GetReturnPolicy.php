<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AccountAPI\ReturnPolicy;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /return_policy/{paymentPreturnPolicyIdolicyId}
 * @see https://developer.ebay.com/api-docs/sell/account/resources/return_policy/methods/getReturnPolicy
 */
class GetReturnPolicy implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/account/v1/return_policy/{returnPolicyId}';

    /**
     * Create a new instance.
     * @param string $returnPolicyId
     * @return void
     */
    public function __construct(
        public readonly string $returnPolicyId,
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
        return ['returnPolicyId' => $this->returnPolicyId];
    }
}
