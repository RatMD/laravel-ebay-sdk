<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AccountAPIv2\UserPreferences;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * PATCH /user_preferences
 * @see https://developer.ebay.com/api-docs/sell/account/v2/resources/user_preferences/methods/setUserPreferences
 */
class SetUserPreferences implements BaseAPIRequest
{
    use CommonMethods;

    /**
     * API Ressource Path
     * @var string
     */
    public const PATH = '/sell/account/v2/user_preferences';

    /**
     * Create a new instance.
     * @param string $marketplaceId
     * @param array $payload
     * @return void
     */
    public function __construct(
        public readonly string $marketplaceId,
        public readonly array $payload,
    ) { }

    /**
     * @inheritdoc
     */
    public function method(): HTTPMethod
    {
        return HTTPMethod::PATCH;
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

    /**
     * @inheritdoc
     */
    public function headers(): array
    {
        return [
            'X-EBAY-C-MARKETPLACE-ID'   => $this->marketplaceId
        ];
    }
}
