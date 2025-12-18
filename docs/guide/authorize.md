# Authorize with eBay
To use the eBay APIs, you must first authorize your application and obtain a refresh token. The SDK 
provides a ready-to-use OAuth flow to handle this process.

1. Create and configure your eBay application
In the [eBay Developer Portal](https://developer.ebay.com/), set up your application and define an 
Auth Accepted Redirect URL. You can use the default callback provided by the SDK 
`/ebay/oauth/callback` or define a custom callback (see `Rat\eBaySDK\Http\Controllers\AuthController`).

2. Configure credentials and scopes
Add your eBay credentials and desired OAuth scopes on the `ebay-sdk.php` configuration file.

```php
'credentials' => [
    'client_id' => env('EBAY_CLIENT_ID', null),
    'client_secret' => env('EBAY_CLIENT_SECRET', null),
    'redirect_uri' => env('EBAY_REDIRECT_URI', null),
    'environment' => env('EBAY_API_ENVIRONMENT', 'sandbox'),
],
```

3. Start the authorization flow
Visit the route `/ebay/oauth/authorize` to begin the OAuth authorization process (handled also by 
`Rat\eBaySDK\Http\Controllers\AuthController`). The URL is created by `Rat\eBaySDK\Authentication\OAuthAuthentication::getAuthorizationUrl()`.

4. Store the refresh token
After a successful authorization, listen for the `Rat\eBaySDK\Events\OAuthSuccess` event and persist 
the provided `refresh_token` in your database.

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

5. Configure the client
Configure the SDK client to use the stored `refresh_token`. If you are using traditional eBay APIs, 
also configure the required application keys.

The recommended way to configure the eBay client is to extend the container binding. This allows you 
to inject dynamic, runtime-specific data (like refresh tokens) without storing them in the package 
configuration.

The client is resolved through Laravel’s service container, so any extensions will automatically 
apply wherever the client is injected or resolved via `app()`.

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