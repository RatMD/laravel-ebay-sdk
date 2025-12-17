<?php declare(strict_types=1);

namespace Rat\eBaySDK;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Validation\ValidationException;
use Rat\eBaySDK\Authentication\OAuthAuthentication;
use Rat\eBaySDK\Contracts\Authentication;
use Rat\eBaySDK\Contracts\BaseAPIRequest;
use Rat\eBaySDK\Contracts\MediaAPIRequest;
use Rat\eBaySDK\Contracts\TraditionalAPIRequest;
use Rat\eBaySDK\Enums\HTTPMethod;
use Rat\eBaySDK\Exceptions\AuthorizationException;
use Rat\eBaySDK\Support\MultipartBody;
use Rat\eBaySDK\Support\XMLBody;

class Client
{
    /**
     *
     * @var string
     */
    public const API_PRODUCTION_URL = 'https://api.ebay.com';

    /**
     *
     * @var string
     */
    public const API_SANDBOX_URL = 'https://api.sandbox.ebay.com';

    /**
     *
     * @var string
     */
    public const APIM_PRODUCTION_URL = 'https://apim.ebay.com';

    /**
     *
     * @var string
     */
    public const APIM_SANDBOX_URL = 'https://apim.sandbox.ebay.com';

    /**
     *
     * @var Authentication
     */
    protected $auth;

    /**
     *
     * @var string
     */
    protected $environment;

    /**
     *
     * @var array
     */
    protected $options = [];

    /**
     * Application Keyset for the traditional API.
     * @var array
     */
    private $applicationKeys = [];

    /**
     * Initialize a new instance of the Client class.
     * @param ?string $environment
     * @param array $options
     * @return void
     */
    public function __construct(
        ?Authentication $auth = null,
        ?string $environment = null,
        array $options = []
    ) {
        $this->auth = $auth ?? new OAuthAuthentication(environment: $environment, options: $options);
        $this->environment = $environment ?? config('ebay-sdk.environment', null);
        $this->options = [
            'debug'     => $options['debug'] ?? config('ebay-sdk.options.debug', false),
            'caching'   => $options['caching'] ?? config('ebay-sdk.options.caching', true),
            'locale'    => $options['locale'] ?? config('ebay-sdk.options.locale', 'de-DE')
        ];
    }

    /**
     * Set Refresh Token.
     * @param string $token
     * @return static
     */
    public function setRefreshToken(string $token): self
    {
        $this->auth->setRefreshToken($token);
        return $this;
    }

    /**
     * Get Refresh Token
     * @return ?string
     */
    public function getRefreshToken(): ?string
    {
        return $this->auth->getRefreshToken();
    }

    /**
     * Set Refresh Token.
     * @param string $appId
     * @param string $devId
     * @param string $certId
     * @return self
     */
    public function setTraditionalApplicationKeys(string $appId, string $devId, string $certId): self
    {
        $this->applicationKeys = [
            'app_id'    => $appId,
            'dev_id'    => $devId,
            'cert_id'   => $certId,
        ];
        return $this;
    }

    /**
     * Get Refresh Token
     * @return array
     */
    public function getTraditionalApplicationKeys(): array
    {
        return $this->applicationKeys;
    }

    /**
     *
     * @return Authentication
     */
    public function getAuthentication(): Authentication
    {
        return $this->auth;
    }

    /**
     *
     * @return string
     */
    protected function getBaseUri(): string
    {
        return $this->environment === 'production'
            ? self::API_PRODUCTION_URL
            : self::API_SANDBOX_URL;
    }

    /**
     *
     * @return string
     */
    protected function getBaseApimUri(): string
    {
        return $this->environment === 'production'
            ? self::APIM_PRODUCTION_URL
            : self::APIM_SANDBOX_URL;
    }

    /**
     * Get the Guzzle HTTP client configured with authentication headers.
     * @param bool $credentialsToken
     * @param ?string $baseUri
     * @return GuzzleClient
     */
    public function getClient(bool $credentialsToken = false, ?string $baseUri = null): GuzzleClient
    {
        $token = $credentialsToken ? $this->auth->getClientCredentialsToken() : $this->auth->getAccessToken();
        return new GuzzleClient([
            'base_uri'  => $baseUri ?? $this->getBaseUri(),
            'headers'   => [
                'Accept'            => 'application/json',
                'Authorization'     => "Bearer {$token}",
                'Content-Language'  => $this->options['locale'],
            ],
            'http_errors'   => false    // We throw our own errors
        ]);
    }

    /**
     *
     * @param BaseAPIRequest $request
     * @return string
     */
    protected function preparePath(BaseAPIRequest $request): string
    {
        $path = $request->path();

        // Replace path parameters
        $params = $request->params();
        if (!empty($params)) {
            $keys = array_map(fn ($item) => '{'. $item . '}', array_keys($params));
            $values = array_values($params);
            $path = str_replace($keys, $values, $path);
        }

        // Add Query
        $query = array_filter($request->query(), fn (mixed $item) => $item !== null);
        if (!empty($query)) {
            $path .= '?' . http_build_query($query);
        }

        return $path;
    }

    /**
     *
     * @param BaseAPIRequest $request
     * @return Response
     */
    public function execute(BaseAPIRequest $request) {
        $body = null;
        $result = null;
        try {
            $path = $this->preparePath($request);
            $options = ['headers' => []];

            // Validate Request
            $request->validate();

            // Append Body
            if ($request instanceof TraditionalAPIRequest) {
                if (empty($applicationKeys = $this->applicationKeys)) {
                    throw new AuthorizationException(
                        'No traditional application keys has been set. Call setTraditionalApplicationKeys() before using a TraditionalAPI request.'
                    );
                }

                $body = $request->body();
                if (!($body instanceof XMLBody)) {
                    throw new AuthorizationException(
                        'No XMLBody passed by the request interface. The TraditionalAPIs only supports XMLBody instances.'
                    );
                }
                $level = $request->compatibilityLevel ?? config('ebay-sdk.traditional_compatibility_level', '1395');
                $siteId = $request->siteId ?? config('ebay-sdk.traditional_site_id', 0);

                $options['headers']['X-EBAY-API-COMPATIBILITY-LEVEL'] = $level;
                $options['headers']['X-EBAY-API-APP-NAME'] = $applicationKeys['app_id'];
                $options['headers']['X-EBAY-API-DEV-NAME'] = $applicationKeys['dev_id'];
                $options['headers']['X-EBAY-API-CERT-NAME'] = $applicationKeys['cert_id'];
                $options['headers']['X-EBAY-API-CALL-NAME'] = $request->callName();
                $options['headers']['X-EBAY-API-SITEID'] = $siteId;
                $options['headers']['Content-Type'] = 'text/xml; charset=utf-8';
                $options['body'] = $body->render(
                    $request,
                    $this->auth->getAccessToken(),
                    $level,
                    $siteId
                );
            } else if ($request->method() !== HTTPMethod::GET) {
                $body = $request->body();

                if ($body instanceof MultipartBody) {
                    $options['multipart'] = $body->toArray();
                } else if (is_array($body)) {
                    $options['headers']['Content-Type'] = 'application/json';
                    $options['json'] = $body;
                } else {
                    $options['body'] = $body;
                }
            }

            foreach ($request->headers() AS $key => $value) {
                $options['headers'][$key] = $value;
            }

            // Request
            $client = $this->getClient(
                $request->requiresCredentialsToken(),
                $request instanceof MediaAPIRequest ? $this->getBaseApimUri() : null
            );
            $response = $client->request(
                $request->method()->value,
                (string) $path,
                $options,
            );
            $result = Response::createFromResponse($response);
        } catch (GuzzleException $exc) {
            throw $exc;
        } catch (ValidationException $exc) {
            throw $exc;
        } finally {
            if ($body instanceof MultipartBody) {
                $body->close();
            }
        }
        return $result;
    }
}
