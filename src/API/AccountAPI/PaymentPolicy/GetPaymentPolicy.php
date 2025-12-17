<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AccountAPI\PaymentPolicy;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /payment_policy/{paymentPolicyId}
 * @see https://developer.ebay.com/api-docs/sell/account/resources/payment_policy/methods/getPaymentPolicy
 */
class GetPaymentPolicy implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/account/v1/payment_policy/{paymentPolicyId}';

    /**
     * Create a new instance.
     * @param string $paymentPolicyId
     * @return void
     */
    public function __construct(
        public readonly string $paymentPolicyId,
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
        return ['paymentPolicyId' => $this->paymentPolicyId];
    }
}
