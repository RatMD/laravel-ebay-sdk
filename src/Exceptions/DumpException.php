<?php declare(strict_types=1);

namespace Rat\eBaySDK\Exceptions;

use GuzzleHttp\Psr7\Stream;
use GuzzleHttp\Psr7\Uri;

class DumpException extends SDKException
{
    /**
     *
     * @var array
     */
    protected array $details;

    /**
     *
     * @param array $details
     * @return void
     */
    public function __construct(array $details = [])
    {
        if (!empty($details['uri']) && $details['uri'] instanceof Uri) {
            $details['uri'] = [
                "scheme"    => $details['uri']->getScheme(),
                "userInfo"  => $details['uri']->getUserInfo(),
                "host"      => $details['uri']->getHost(),
                "port"      => $details['uri']->getPort(),
                "path"      => $details['uri']->getPath(),
                "query"     => $details['uri']->getQuery(),
                "fragment"  => $details['uri']->getFragment(),
            ];
        }

        $baseUri = $details['options']['base_uri'] ?? null;
        if (!empty($baseUri) && $baseUri instanceof Uri) {
            $details['options']['base_uri'] = [
                "scheme"    => $baseUri->getScheme(),
                "userInfo"  => $baseUri->getUserInfo(),
                "host"      => $baseUri->getHost(),
                "port"      => $baseUri->getPort(),
                "path"      => $baseUri->getPath(),
                "query"     => $baseUri->getQuery(),
                "fragment"  => $baseUri->getFragment(),
            ];
        }

        if (!empty($details['body']) && $details['body'] instanceof Stream) {
            $details['body'] = $details['body']->getContents();
        }

        // Strip Guzzle Handler
        unset($details['options']['handler']);

        // Strip Access Token
        $authHeaderKey = null;
        if (!empty($details['headers']['Authorization'])) {
            $authHeaderKey = 'Authorization';
        } else if (!empty($details['headers']['authorization'])) {
            $authHeaderKey = 'authorization';
        }
        if (!empty($authHeaderKey)) {
            $value = $details['headers'][$authHeaderKey][0] ?? '';
            if (!empty($value) && str_contains($value, 'Bearer v^1')) {
                $details['headers'][$authHeaderKey][0] = 'Bearer <ACCESS_TOKEN>';
            }
        }

        // Set
        $this->details = $details;
        parent::__construct('Debugging');
    }

    /**
     *
     * @return array
     */
    public function getDetails(): array
    {
        return $this->details;
    }
}
