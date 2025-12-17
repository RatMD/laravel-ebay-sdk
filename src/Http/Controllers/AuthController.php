<?php declare(strict_types=1);

namespace Rat\eBaySDK\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Rat\eBaySDK\Client;
use Rat\eBaySDK\Events\OAuthFailure;
use Rat\eBaySDK\Events\OAuthSuccess;

class AuthController extends Controller
{
    /**
     *
     * @param Client $client
     * @return void
     */
    public function __construct(
        private readonly Client $client
    ) {}

    /**
     *
     * @param Request $request
     * @return mixed
     */
    public function authorize(Request $request)
    {
        return redirect()->away(
            $this->client->getAuthentication()->getAuthorizationUrl()
        );
    }

    /**
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function handleCallback(Request $request)
    {
        $code = $request->query('code', '');
        $state = $request->query('state');

        if ($code === '') {
            event(new OAuthFailure);
            return abort(400, 'Code is missing');
        } else {
            $tokens = $this->client->getAuthentication()->exchangeAuthorizationCode(
                (string) $code,
                is_string($state) ? $state : null
            );
            event(new OAuthSuccess($tokens));
            return redirect()->to('/');
        }
    }

    /**
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function rejected(Request $request)
    {
        event(new OAuthFailure);
        return redirect()->to('/');
    }
}
