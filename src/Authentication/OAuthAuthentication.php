<?php declare(strict_types=1);

namespace Rat\eBaySDK\Authentication;

use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Rat\eBaySDK\Contracts\Authentication;
use Rat\eBaySDK\Exceptions\AuthorizationException;

class OAuthAuthentication implements Authentication
{
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
     * @var Environment
     */
    private Environment $environment;

    /**
     *
     * @var ?string
     */
    private $refreshToken = null;

    /**
     *
     * @param ?Environment $environment
     * @return void
     */
    public function __construct(
        ?Environment $environment = null
    ) {
        $this->environment = $environment ?? new Environment;
    }

    /**
     *
     * @return string
     */
    protected function getAccessTokenCacheKey(): string
    {
        $pepper = hash('sha256', (string) $this->refreshToken);
        return self::ACCESS_TOKEN_CACHE_KEY . ':' . $this->environment->getHashValue($pepper);
    }

    /**
     *
     * @return string
     */
    protected function getClientCredentialsCacheKey(): string
    {
        return self::CLIENT_CREDENTIALS_CACHE_KEY . ':' . $this->environment->getHashValue(useCredentials: true);
    }

    /**
     *
     * @return string
     */
    protected function getStateSessionKey(): string
    {
        $pepper = $this->environment->redirectUri;
        return self::STATE_SESSION_KEY . ':' . $this->environment->getHashValue($pepper);
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
        $uri = $this->environment->getBaseUrl();
        return new GuzzleClient([
            'base_uri'      => $uri,
            'http_errors'   => false
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
        if ($this->environment->caching && Cache::has($this->getAccessTokenCacheKey())) {
            return Cache::get($this->getAccessTokenCacheKey());
        }

        // Request access token
        $client = $this->getClient();
        $response = $client->post('/identity/v1/oauth2/token', [
            'headers' => [
                'Content-Type'  => 'application/x-www-form-urlencoded',
                'Authorization' => $this->environment->getBasicAuthorization()
            ],
            'form_params' => [
                'grant_type'    => 'refresh_token',
                'refresh_token' => $this->getRefreshToken(),
                'scope'         => implode(' ', $this->environment->authorizationScopes),
            ],
        ]);

        // Parse response
        $content = $response->getBody()->getContents();
        if ($response->getStatusCode() !== 200) {
            throw new AuthorizationException(
                "Failed to refresh the user access token. The token endpoint returned a non-200 response.",
                $this->environment->debug ? $content : null,
                $response->getStatusCode(),
            );
        }

        $data = json_decode($content, true);
        if(empty($token = $data['access_token'])) {
            throw new AuthorizationException(
                "Failed to refresh the user access token. The token response did not contain an access_token.",
                $this->environment->debug ? $content : null,
                $response->getStatusCode(),
            );
        }

        // Cache & Return
        if ($this->environment->caching && !empty($data['expires_in'])) {
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
        if ($this->environment->caching && Cache::has($this->getClientCredentialsCacheKey())) {
            return Cache::get($this->getClientCredentialsCacheKey());
        }

        // Request credentials token
        $client = $this->getClient();
        $response = $client->post('/identity/v1/oauth2/token', [
            'headers' => [
                'Content-Type'  => 'application/x-www-form-urlencoded',
                'Authorization' => $this->environment->getBasicAuthorization()
            ],
            'form_params' => [
                'grant_type'    => 'client_credentials',
                'scope'         => implode(' ', $this->environment->credentialScopes),
            ],
        ]);

        // Parse response
        $content = $response->getBody()->getContents();
        if ($response->getStatusCode() !== 200) {
            throw new AuthorizationException(
                "Failed to obtain an application client credentials token. The token endpoint returned a non-200 response.",
                $this->environment->debug ? $content : null,
                $response->getStatusCode(),
            );
        }

        $data = json_decode($content, true);
        if(empty($token = $data['access_token'])) {
            throw new AuthorizationException(
                "Failed to obtain an application client credentials token. The token response did not contain an access_token.",
                $this->environment->debug ? $content : null,
                $response->getStatusCode(),
            );
        }

        // Cache & Return
        if ($this->environment->caching && !empty($data['expires_in'])) {
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
        $url = $this->environment->getAuthUrl($environment);
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
            $this->environment->environment,
            $this->environment->clientId,
            $this->environment->redirectUri,
            $this->environment->authorizationScopes,
            [
                'locale'    => $this->environment->locale,
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
                'Authorization' => $this->environment->getBasicAuthorization()
            ],
            'form_params' => [
                'grant_type'    => 'authorization_code',
                'redirect_uri'  => $this->environment->redirectUri,
                'code'          => $code
            ],
        ]);

        // Parse response
        $content = $response->getBody()->getContents();
        if ($response->getStatusCode() !== 200) {
            throw new AuthorizationException(
                "Failed to exchange the authorization code for tokens. The token endpoint returned a non-200 response.",
                $this->environment->debug ? $content : null,
                $response->getStatusCode(),
            );
        }

        $data = json_decode($content, true);
        if(empty($data['access_token'])) {
            throw new AuthorizationException(
                "Failed to exchange the authorization code for tokens. The token response did not contain an access_token.",
                $this->environment->debug ? $content : null,
                $response->getStatusCode(),
            );
        }
        if(empty($data['refresh_token'])) {
            throw new AuthorizationException(
                "Failed to exchange the authorization code for tokens. The token response did not contain a refresh_token.",
                $this->environment->debug ? $content : null,
                $response->getStatusCode(),
            );
        }

        // Return
        session()->forget($this->getStateSessionKey());
        return $data;
    }
}
