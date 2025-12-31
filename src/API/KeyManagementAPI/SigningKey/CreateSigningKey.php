<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\KeyManagementAPI\SigningKey;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Enums\SigningKeyCipher;

/**
 * POST /signing_key
 * @see https://developer.ebay.com/api-docs/developer/key-management/resources/signing_key/methods/createSigningKey
 */
class CreateSigningKey implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/developer/key_management/v1/signing_key';

    /**
     * Create a new instance.
     * @param SigningKeyCipher $signingKeyCipher
     * @return void
     */
    public function __construct(
        public readonly SigningKeyCipher $signingKeyCipher,
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
        return ['signingKeyCipher' => $this->signingKeyCipher];
    }
}
