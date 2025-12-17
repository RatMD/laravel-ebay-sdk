<?php declare(strict_types=1);

namespace Rat\eBaySDK\Authentication;

use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Rat\eBaySDK\Client;
use Rat\eBaySDK\Contracts\Authentication;
use Rat\eBaySDK\Exceptions\AuthorizationException;

class OAuthAuthentication implements Authentication
{
    /**
     *
     * @var string
     */
    public const AUTH_PRODUCTION_URL = 'https://auth.ebay.com/oauth2/authorize';

    /**
     *
     * @var string
     */
    public const AUTH_SANDBOX_URL = 'https://auth.sandbox.ebay.com/oauth2/authorize';

    /**
     *
     * @var string
     */
    private const ACCESS_TOKEN_CACHE_KEY = 'ebay_sdk:access_token';

    /**
     *
     * @var string
     */
    private const CLIENT_CREDENTIALS_CACHE_KEY = 'ebay_sdk:client_credentials_token';

    /**
     *
     * @var string
     */
    private const STATE_SESSION_KEY = 'ebay_sdk:state';

    /**
     *
     * @var string
     */
    protected $clientId;

    /**
     *
     * @var string
     */
    protected $clientSecret;

    /**
     *
     * @var string
     */
    protected $redirectUri;

    /**
     *
     * @var string
     */
    protected $environment;

    /**
     *
     * @var array
     */
    protected $authorizationScopes = [];

    /**
     *
     * @var array
     */
    protected $credentialScopes = [];

    /**
     *
     * @var array
     */
    protected $options = [];

    /**
     *
     * @var ?string
     */
    private $refreshToken = null;

    /**
     *
     * @param ?string $clientId
     * @param ?string $clientSecret
     * @param ?string $redirectUri
     * @param ?string $environment
     * @param array $authorizationScopes
     * @param array $credentialScopes
     * @param array $options
     * @return void
     */
    public function __construct(
        ?string $clientId = null,
        ?string $clientSecret = null,
        ?string $redirectUri = null,
        ?string $environment = null,
        array $authorizationScopes = [],
        array $credentialScopes = [],
        array $options = []
    ) {
        $this->clientId = $clientId ?? config('ebay-sdk.credentials.client_id', null);
        $this->clientSecret = $clientSecret ?? config('ebay-sdk.credentials.client_secret', null);
        $this->redirectUri = $redirectUri ?? config('ebay-sdk.credentials.redirect_uri', null);
        $this->environment = $environment ?? config('ebay-sdk.credentials.environment', null);
        $this->authorizationScopes = $authorizationScopes ?: config('ebay-sdk.authorization_scopes', []);
        $this->credentialScopes = $credentialScopes ?: config('ebay-sdk.credential_scopes', []);
        $this->options = [
            'debug'     => $options['debug'] ?? config('ebay-sdk.options.debug', false),
            'caching'   => $options['caching'] ?? config('ebay-sdk.options.caching', true),
            'locale'    => $options['locale'] ?? config('ebay-sdk.options.locale', 'de-DE')
        ];
    }

    /**
     *
     * @return string
     */
    protected function getAccessTokenCacheKey(): string
    {
        $data = implode(':', [
            $this->clientId,
            hash('sha256', (string) $this->refreshToken),
            implode(' ', $this->authorizationScopes),
            $this->environment,
        ]);
        $hash = hash('sha256', $data);
        return self::ACCESS_TOKEN_CACHE_KEY . ':' . $hash;
    }

    /**
     *
     * @return string
     */
    protected function getClientCredentialsCacheKey(): string
    {
        $data = implode(':', [
            $this->clientId,
            implode(' ', $this->credentialScopes),
            $this->environment,
        ]);
        $hash = hash('sha256', $data);
        return self::CLIENT_CREDENTIALS_CACHE_KEY . ':' . $hash;
    }

    /**
     *
     * @return string
     */
    protected function getStateSessionKey(): string
    {
        $data = implode(':', [
            $this->clientId,
            $this->redirectUri,
            implode(' ', $this->authorizationScopes),
            $this->environment,
        ]);
        $hash = hash('sha256', $data);
        return self::STATE_SESSION_KEY . ':' . $hash;
    }

    /**
     *
     * @return string
     */
    protected function getBasicAuthorization(): string
    {
        return 'Basic ' . base64_encode($this->clientId . ':' . $this->clientSecret);
    }

    /**
     * Set Refresh Token.
     * @param string $token
     * @return self
     */
    public function setRefreshToken(string $token): self
    {
        $this->refreshToken = $token;
        return $this;
    }

    /**
     * Get Refresh Token
     * @return ?string
     */
    public function getRefreshToken(): ?string
    {
        return $this->refreshToken;
    }

    /**
     * Get the Guzzle HTTP client configured with authentication headers.
     * @return GuzzleClient
     */
    public function getClient(): GuzzleClient
    {
        $uri = $this->environment == 'production'
            ? Client::API_PRODUCTION_URL
            : Client::API_SANDBOX_URL;
        return new GuzzleClient([
            'base_uri'  => $uri,
            'http_errors'   => false    // We throw our own errors
        ]);
    }

    /**
     *
     * @return string
     */
    public function getAccessToken(): string
    {
        if (empty($this->refreshToken)) {
            throw new AuthorizationException(
                'No refresh token has been set. Call setRefreshToken() or exchangeAuthorizationCode() before requesting a user access token.'
            );
        }
        if ($this->options['caching'] && Cache::has($this->getAccessTokenCacheKey())) {
            return Cache::get($this->getAccessTokenCacheKey());
        }

        // Request access token
        $client = $this->getClient();
        $response = $client->post('/identity/v1/oauth2/token', [
            'headers' => [
                'Content-Type'  => 'application/x-www-form-urlencoded',
                'Authorization' => $this->getBasicAuthorization()
            ],
            'form_params' => [
                'grant_type'    => 'refresh_token',
                'refresh_token' => $this->getRefreshToken(),
                'scope'         => implode(' ', $this->authorizationScopes),
            ],
        ]);

        // Parse response
        $content = $response->getBody()->getContents();
        if ($response->getStatusCode() !== 200) {
            throw new AuthorizationException(
                "Failed to refresh the user access token. The token endpoint returned a non-200 response.",
                $this->options['debug'] ? $content : null,
                $response->getStatusCode(),
            );
        }

        $data = json_decode($content, true);
        if(empty($token = $data['access_token'])) {
            throw new AuthorizationException(
                "Failed to refresh the user access token. The token response did not contain an access_token.",
                $this->options['debug'] ? $content : null,
                $response->getStatusCode(),
            );
        }

        // Cache & Return
        if ($this->options['caching'] && !empty($data['expires_in'])) {
            $until = now()->addSeconds($data['expires_in'] - 120);
            Cache::put($this->getAccessTokenCacheKey(), $token, $until);
        }
        return $token;
    }

    /**
     *
     * @return string
     */
    public function getClientCredentialsToken(): string
    {
        if ($this->options['caching'] && Cache::has($this->getClientCredentialsCacheKey())) {
            return Cache::get($this->getClientCredentialsCacheKey());
        }

        // Request credentials token
        $client = $this->getClient();
        $response = $client->post('/identity/v1/oauth2/token', [
            'headers' => [
                'Content-Type'  => 'application/x-www-form-urlencoded',
                'Authorization' => $this->getBasicAuthorization()
            ],
            'form_params' => [
                'grant_type'    => 'client_credentials',
                'scope'         => implode(' ', $this->credentialScopes),
            ],
        ]);

        // Parse response
        $content = $response->getBody()->getContents();
        if ($response->getStatusCode() !== 200) {
            throw new AuthorizationException(
                "Failed to obtain an application client credentials token. The token endpoint returned a non-200 response.",
                $this->options['debug'] ? $content : null,
                $response->getStatusCode(),
            );
        }

        $data = json_decode($content, true);
        if(empty($token = $data['access_token'])) {
            throw new AuthorizationException(
                "Failed to obtain an application client credentials token. The token response did not contain an access_token.",
                $this->options['debug'] ? $content : null,
                $response->getStatusCode(),
            );
        }

        // Cache & Return
        if ($this->options['caching'] && !empty($data['expires_in'])) {
            $until = now()->addSeconds($data['expires_in'] - 120);
            Cache::put($this->getClientCredentialsCacheKey(), $token, $until);
        }
        return $token;
    }

    /**
     *
     * @param string $environment
     * @param string $clientId
     * @param string $redirectUri
     * @param array $scopes
     * @param array $options
     * @return string
     */
    public function buildAuthorizationUrl(
        string $environment,
        string $clientId,
        string $redirectUri,
        array $scopes,
        array $options = []
    ): string {
        $url = $environment === 'production'
            ? self::AUTH_PRODUCTION_URL
            : self::AUTH_SANDBOX_URL;

        $query = [
            'client_id'     => $clientId,
            'response_type' => 'code',
            'redirect_uri'  => $redirectUri,
            'scope'         => implode(' ', $scopes),
        ];
        if (!empty($options['locale'])) {
            $query['locale'] = $options['locale'];
        }
        if (!empty($options['state'])) {
            $query['state'] = $options['state'];
        }
        if (!empty($options['prompt'])) {
            $query['prompt'] = $options['prompt'] === true ? 'login' : $options['prompt'];
        }

        return $url . '?' . http_build_query($query);
    }

    /**
     * Get the OAuth authorization url
     * @param ?string $state Pass a custom state. Custom states, needs to be validated on your own,
     *                and should not be passed to 'exchangeAuthorizationCode'. Use null to generate
     *                and validate the state by this class.
     * @return string
     */
    public function getAuthorizationUrl(?string $state = null): string
    {
        if (empty($state)) {
            $state = hash('sha256', (string) Str::uuid());
            session()->put($this->getStateSessionKey(), $state . ':' . time());
        }

        return $this->buildAuthorizationUrl(
            $this->environment,
            $this->clientId,
            $this->redirectUri,
            $this->authorizationScopes,
            [
                'locale'    => $this->options['locale'],
                'state'     => $state,
                'prompt'    => false,
            ]
        );
    }

    /**
     *
     * @param string $code
     * @param ?string $state Pass the response state from the eBay redirect URL here for validation
     *                use null to validate the state on your own.
     * @return array
     */
    public function exchangeAuthorizationCode(string $code, ?string $state = null): array
    {
        if (!empty($state)) {
            $value = session()->get($this->getStateSessionKey(), '');
            [$hash, $time] = array_pad(explode(':', $value), 2, 0);
            if (!hash_equals($hash, $state) || time() - $time > 5 * 60) {
                throw new AuthorizationException(
                    'The provided state is invalid or has expired. Please restart the authorization flow.'
                );
            }
        }

        // Exchange code for access token
        $client = $this->getClient();
        $response = $client->post('/identity/v1/oauth2/token', [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Authorization' => $this->getBasicAuthorization()
            ],
            'form_params' => [
                'grant_type'    => 'authorization_code',
                'redirect_uri'  => $this->redirectUri,
                'code'          => $code
            ],
        ]);

        // Parse response
        $content = $response->getBody()->getContents();
        if ($response->getStatusCode() !== 200) {
            throw new AuthorizationException(
                "Failed to exchange the authorization code for tokens. The token endpoint returned a non-200 response.",
                $this->options['debug'] ? $content : null,
                $response->getStatusCode(),
            );
        }

        $data = json_decode($content, true);
        if(empty($data['access_token'])) {
            throw new AuthorizationException(
                "Failed to exchange the authorization code for tokens. The token response did not contain an access_token.",
                $this->options['debug'] ? $content : null,
                $response->getStatusCode(),
            );
        }
        if(empty($data['refresh_token'])) {
            throw new AuthorizationException(
                "Failed to exchange the authorization code for tokens. The token response did not contain a refresh_token.",
                $this->options['debug'] ? $content : null,
                $response->getStatusCode(),
            );
        }

        // Return
        session()->forget($this->getStateSessionKey());
        return $data;
    }
}
