<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AccountAPI\FulfillmentPolicy;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\APIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * PUT /fulfillment_policy/{fulfillmentPolicyId}
 * @see https://developer.ebay.com/api-docs/sell/account/resources/fulfillment_policy/methods/updateFulfillmentPolicy
 */
class CreateFulfillmentPolicy implements APIRequest
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
     * @param array $payload
     * @return void
     */
    public function __construct(
        public readonly string $fulfillmentPolicyId,
        public readonly array $payload,
    ) { }

    /**
     * @inheritdoc
     */
    public function method(): HTTPMethod
    {
        return HTTPMethod::PUT;
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
    public function body(): array
    {
        return $this->payload;
    }
}
