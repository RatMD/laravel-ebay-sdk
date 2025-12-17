<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AccountAPI\FulfillmentPolicy;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\APIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /fulfillment_policy/{fulfillmentPolicyId}
 * @see https://developer.ebay.com/api-docs/sell/account/resources/fulfillment_policy/methods/getFulfillmentPolicy
 */
class GetFulfillmentPolicy implements APIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/account/v1/fulfillment_policy/{fulfillmentPolicyId}';

    /**
     * Create a new instance.
     * @param string $fulfillmentPolicyId
     * @return void
     */
    public function __construct(
        public readonly string $fulfillmentPolicyId,
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
        return ['fulfillmentPolicyId' => $this->fulfillmentPolicyId];
    }

    /**
     * @inheritdoc
     */
    public function query(): array
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function body(): array
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function requiresCredentialsToken(): bool
    {
        return false;
    }

    /**
     * @inheritdoc
     */
    public function validate(): void
    {
    }
}
