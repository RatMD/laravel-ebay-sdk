# Authorize with eBay
To use the eBay APIs, your application must first complete the OAuth authorization process and 
obtain a refresh token. This SDK provides a ready-to-use OAuth flow to demonstrate how this process 
works and to simplify initial integration.

> [!CAUTION]
> The routes, controllers, and examples shown below are demonstrations only. You are expected to 
> adapt the OAuth flow, routes, middleware, controllers, and token storage logic to fit your own 
> application architecture and security requirements.

## 1. Setup Laravel Routes

Before configuring anything on the eBay side, ensure that your application exposes the required 
OAuth authentication routes. The SDK ships with example routes that demonstrate a complete OAuth 
flow. However, these routes are disabled by default and supposed for demonstration only. You can 
still enable them via the `ebay-sdk.php` configuration file:

> [!CAUTION]
> Enabling the package routes in `ebay-sdk.php` will also register the webhook endpoint route.

> [!NOTE]
> The `routes.oauth_middleware` option allows you to customize the middleware stack applied to the
> OAuth routes. However, we still recommend defining and managing your own routes directly within
> your application.

```php
return [
    'routes' => [
        'enabled' => true,
        'oauth_middleware' => [
            'web',
            'auth',
            'throttle:30,1',
            //'can:request_token',
        ],
    ]
];
```

> [!CAUTION]
> The routes shown below are for demonstration only. You should review and adapt:
> - Route prefixes / URL structure
> - Middleware / Authentication requirements
> - Rate limiting / Permission Guards
>  
> to match your application’s security and UX requirements.

```php{2,9-20}
use Illuminate\Support\Facades\Route;
use Rat\eBaySDK\Http\Controllers\AuthController;
use Rat\eBaySDK\Http\Controllers\EventController;

Route::prefix('ebay')->name('ebay-sdk.')->group(function () {
    Route::post('/notify/{token?}', [EventController::class, 'dispatch'])
        ->name('webhook.notify');

    Route::middleware(config('ebay-sdk.routes.oauth_middleware', ['web', 'auth', 'throttle:30,1']))
        ->group(function() {
            Route::get('/oauth/authorize', [AuthController::class, 'authorize'])
                ->name('oauth.authorize');

            Route::get('/oauth/callback', [AuthController::class, 'handleCallback'])
                ->name('oauth.callback');

            Route::get('/oauth/rejected', [AuthController::class, 'rejected'])
                ->name('oauth.rejected');
        }
    );
});
```

## 2. Setup the OAuth Controller

The SDK includes a basic OAuth controller (`AuthController`) that demonstrates how to:

- Redirect users to eBay for authorization
- Handle the OAuth callback
- Exchange the authorization code for access and refresh tokens

This controller is provided as a reference only. You are encouraged to extend, replace, or 
reimplement it based on your application’s architecture and error-handling strategy.

> [!CAUTION]
> This controller is intentionally minimal and not production-ready. You should adapt it to: 
> - Handle errors more gracefully
> - Persist tokens securely
> - Implement logging and auditing
> - Redirect users appropriately.

```php
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

```

## 3. Create and Configure Your eBay Application

In the [eBay Developer Portal](https://developer.ebay.com/), create or configure your application 
and define at least your "Your auth accepted URL", pointing to the respective endpoint on your 
website configured above, for example:

```
https://example.tld/ebay/oauth/callback
```

## 4. Configure Credentials and SDK Options

Add your eBay OAuth credentials and desired SDK options to the `ebay-sdk.php` configuration file.

This includes:

- OAuth credentials (client_id, client_secret, redirect_uri)
- Environment selection (sandbox or production)
- OAuth scopes
- Optional client and traditional API settings

```php
return [
    'credentials' => [
        'client_id' => env('EBAY_CLIENT_ID', null),
        'client_secret' => env('EBAY_CLIENT_SECRET', null),
        'redirect_uri' => env('EBAY_REDIRECT_URI', null),
        'environment' => env('EBAY_API_ENVIRONMENT', 'sandbox'),
    ],
    'options' => [
        'caching' => (bool) env('EBAY_CACHING', true),
        'debug' => (bool) env('EBAY_DEBUG', false),
        'locale' => env('EBAY_LOCALE', 'en-US'),
    ],
    'traditional' => [
        'compatibility_level' => '1395',
        'error_language' => str_replace('-', '_', env('EBAY_LOCALE', 'en_US')),
        'error_handling' => 'BestEffort',
        'site_id' => 0,
        'warning_level' => 'Low'
    ],
    'authorization_scopes' => [

    ],
    'credential_scopes' => [

    ],
];
```

> [!TIP]
> The OAuth scopes define which permissions your application requests from the user during 
> authorization. Only request the scopes you actually need. Over-scoping increases the chance of 
> user rejection and review friction.

## 5. Start the Authorization Flow

With routes, controllers, and credentials in place, initiate the OAuth flow by visiting your 
configured oauth route, for example:

```
https://example.tld/ebay/oauth/authorize
```

This triggers the SDK’s OAuth logic and redirects you to eBay’s authorization screen. The route is 
generated by `OAuthAuthentication::getAuthorizationUrl()`.

## 6. Store the Refresh Token

After a successful authorization, the SDK dispatches the `OAuthSuccess` event, when configured using 
the `AuthController` example above. Listen for this event and securely persist the provided 
`refresh_token`. The storage mechanism is entirely application-specific and should follow your 
security best practices.

> [!CAUTION]
> The following example is just a demonstration. You should choose a storage mechanism that fits 
> your system, such as:
> - Encrypted database fields
> - A secrets manager
> - A dedicated credentials service

```php
namespace App\Listeners;

use App\Models\Setting;
use Rat\eBaySDK\Events\OAuthSuccess;

class StoreRefreshToken
{
    /**
     * Create the event listener.
     */
    public function __construct() {}

    /**
     * Handle the event.
     */
    public function handle(OAuthSuccess $event): void
    {
        Setting::setOption('ebay_refresh_token', $event->tokens['refresh_token']);
    }
}
```

## 7. Configure the Client to Use the Refresh Token

Finally, configure the SDK client to use the stored `refresh_token`. The recommended approach for 
a single-user usage is to extend the Laravel service container binding for the Client class. This 
allows you to inject runtime-specific authentication data without modifying package configuration 
files.

```php
namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Rat\eBaySDK\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->extend(Client::class, function (Client $client) {
            $token = Setting::getOption('ebay_refresh_token');
            if (!empty($token)) {
                $client->setRefreshToken($token);
                $client->setTraditionalApplicationKeys(
                    'appId',
                    'devId',
                    'certId',
                );
            }
            return $client;
        });
    }
}
```

Because the client is resolved through Laravel’s service container, this configuration automatically 
applies wherever the client is injected or resolved via `app()`.