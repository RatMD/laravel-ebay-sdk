<?php declare(strict_types=1);

namespace Rat\eBaySDK\API\AccountAPIv2\UserPreferences;

use Rat\eBaySDK\Concerns\CommonMethods;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;

/**
 * GET /user_preferences
 * @see https://developer.ebay.com/api-docs/sell/account/v2/resources/user_preferences/methods/getUserPreferences
 */
class GetUserPreferences implements BaseAPIRequest
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
     * @param string $fieldgroups
     * @return void
     */
    public function __construct(
        public readonly string $marketplaceId,
        public readonly string $fieldgroups,
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
        return [
            'fieldgroups'   => $this->fieldgroups,
        ];
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
