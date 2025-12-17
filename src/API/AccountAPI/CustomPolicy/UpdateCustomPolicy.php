<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AccountAPI\CustomPolicy;

use Illuminate\Support\Facades\Validator;
use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * PUT /custom_policy/{customPolicyId}
 * @see https://developer.ebay.com/api-docs/sell/account/resources/custom_policy/methods/updateCustomPolicy
 */
class UpdateCustomPolicy implements BaseAPIRequest
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
     * @param array $payload
     * @return void
     */
    public function __construct(
        public readonly string $customPolicyId,
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
        return ['customPolicyId' => $this->customPolicyId];
    }

    /**
     * @inheritdoc
     */
    public function body(): array
    {
        return $this->payload;
    }

    /**
     * @inheritdoc
     */
    public function validate(): void
    {
        Validator::make($this->payload, [
            'description'   => ['required', 'min:1', 'max:15000'],
            'label'         => ['required', 'min:1', 'max:65'],
            'name'          => ['required', 'min:1', 'max:65'],
        ])->validate();
    }
}
