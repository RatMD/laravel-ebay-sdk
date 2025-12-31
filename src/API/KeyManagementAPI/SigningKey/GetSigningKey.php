<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\KeyManagementAPI\SigningKey;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /signing_key/{signingKeyId}
 * @see https://developer.ebay.com/api-docs/developer/key-management/resources/signing_key/methods/getSigningKey
 */
class GetSigningKey implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/developer/key_management/v1/signing_key/{signingKeyId}';

    /**
     * Create a new instance.
     * @param string $signingKeyCipher
     * @return void
     */
    public function __construct(
        public readonly string $signingKeyCipher,
    ) { }

    /**
     * @inheritdoc
     */
    public function base(string $environment): ?string
    {
        if ($environment === 'production') {
            return 'https://apiz.ebay.com';
        } else {
            return 'https://apiz.sandbox.ebay.com';
        }
    }

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
        return ['signingKeyCipher' => $this->signingKeyCipher];
    }
}
