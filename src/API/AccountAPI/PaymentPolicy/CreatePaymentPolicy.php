<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AccountAPI\PaymentPolicy;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\APIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * POST /payment_policy
 * @see https://developer.ebay.com/api-docs/sell/account/resources/payment_policy/methods/createPaymentPolicy
 */
class CreatePaymentPolicy implements APIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/account/v1/payment_policy';

    /**
     * Create a new instance.
     * @param array $payload
     * @return void
     */
    public function __construct(
        public readonly array $payload,
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
        return $this->payload;
    }
}
