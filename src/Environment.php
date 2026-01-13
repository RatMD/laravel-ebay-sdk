<?php declare(strict_types=1);

namespace Rat\eBaySDK;

class Environment
{
    /**
     *
     * @var string
     */
    public readonly string $clientId;

    /**
     *
     * @var string
     */
    public readonly string $clientSecret;

    /**
     *
     * @var string
     */
    public readonly string $redirectUri;

    /**
     *
     * @var string
     */
    public readonly string $devId;

    /**
     *
     * @var string
     */
    public readonly string $environment;

    /**
     *
     * @var array
     */
    public readonly array $authorizationScopes;

    /**
     *
     * @var array
     */
    public readonly array $credentialScopes;

    /**
     *
     * @var bool
     */
    public readonly bool $debug;

    /**
     *
     * @var bool
     */
    public readonly bool $caching;

    /**
     *
     * @var string
     */
    public readonly string $locale;

    /**
     *
     * @var string
     */
    public readonly string $compatibilityLevel;

    /**
     *
     * @var int
     */
    public readonly int $siteId;

    /**
     *
     * @param null|string $certId
     * @param null|string $certSecret
     * @param null|string $redirectUri
     * @param null|string $devId
     * @param null|string $environment
     * @param null|array $authorizationScopes
     * @param null|array $credentialScopes
     * @param null|bool $debug
     * @param null|bool $caching
     * @param null|string $locale
     * @param null|string $compatibilityLevel
     * @param null|int $siteId
     * @return void
     */
    public function __construct(
        null|string $clientId = null,
        null|string $clientSecret = null,
        null|string $redirectUri = null,
        null|string $devId = null,
        null|string $environment = null,
        null|array $authorizationScopes = null,
        null|array $credentialScopes = null,
        null|bool $debug = null,
        null|bool $caching = null,
        null|string $locale = null,
        null|string $compatibilityLevel = null,
        null|int $siteId = null,
    )
    {
        $this->clientId = $clientId ?? config('ebay-sdk.credentials.client_id');
        $this->clientSecret = $clientSecret ?? config('ebay-sdk.credentials.client_secret');
        $this->redirectUri = $redirectUri ?? config('ebay-sdk.credentials.redirect_uri');
        $this->devId = $devId ?? config('ebay-sdk.credentials.dev_id');
        $this->environment = $environment ?? config('ebay-sdk.credentials.environment');
        $this->authorizationScopes = $authorizationScopes ?: config('ebay-sdk.authorization_scopes', []);
        $this->credentialScopes = $credentialScopes ?: config('ebay-sdk.credential_scopes', []);
        $this->debug = is_null($debug) ? config('ebay-sdk.options.debug', false) : $debug;
        $this->caching = is_null($caching) ? config('ebay-sdk.options.caching', false) : $caching;
        $this->locale = $locale ?? config('ebay-sdk.options.locale', 'en-US');
        $this->compatibilityLevel = $compatibilityLevel ?? config('ebay-sdk.traditional.compatibility_level', '1395');
        $this->siteId = is_null($siteId) ? (int) config('ebay-sdk.traditional.site_id', 0) : $siteId;
    }

    /**
     *
     * @return string
     */
    public function getBasicAuthorization(): string
    {
        return 'Basic ' . base64_encode($this->clientId . ':' . $this->clientSecret);
    }

    /**
     *
     * @param string $environment
     * @return string
     */
    public function getAuthUrl(?string $environment = null)
    {
        if (($environment ?? $this->environment) === 'production') {
            return 'https://auth.ebay.com/oauth2/authorize';
        } else {
            return 'https://auth.sandbox.ebay.com/oauth2/authorize';
        }
    }

    /**
     *
     * @param string $environment
     * @return string
     */
    public function getBaseUrl(?string $environment = null)
    {
        if (($environment ?? $this->environment) === 'production') {
            return 'https://api.ebay.com';
        } else {
            return 'https://api.sandbox.ebay.com';
        }
    }

    /**
     *
     * @param string $pepper
     * @return string
     */
    public function getHashValue(?string $pepper = null, ?bool $useCredentials = false): string
    {
        $scopes = $useCredentials ? $this->credentialScopes : $this->authorizationScopes;
        return hash('sha256', implode(':', array_filter([
            $this->clientId,
            implode(' ', $scopes),
            $this->environment,
            $pepper
        ])));
    }
}
