<?php declare(strict_types=1);

namespace Rat\eBaySDK\Tests;

use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as Orchestra;
use Rat\eBaySDK\Authentication\OAuthAuthentication;
use Rat\eBaySDK\Client;
use Rat\eBaySDK\ServiceProvider;

class TestCase extends Orchestra
{
    /**
     * Setup the test environment.
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $emptyClient = env('EBAY_CLIENT_ID') === null;
        $emptySecret = env('EBAY_CLIENT_SECRET') === null;
        $emptyRedirect = env('EBAY_REDIRECT_URI') === null;
        if ($emptyClient || $emptySecret || $emptyRedirect) {
            fwrite(\STDERR, "Missing required credentials configuration. Aborting tests.\n");
            exit(1);
        }

        if (env('EBAY_API_ENVIRONMENT') !== 'sandbox') {
            fwrite(\STDERR, "Invalid environment configuration. Expected 'sandbox'. Aborting tests.\n");
            exit(1);
        }

        if (env('PEST_EBAY_REFRESH_TOKEN') === null) {
            fwrite(\STDERR, "Missing PEST_EBAY_REFRESH_TOKEN environment variable. Aborting tests.\n");
            exit(1);
        }

        $emptyAppId = env('PEST_EBAY_APP_ID') === null;
        $emptyDevId = env('PEST_EBAY_DEV_ID') === null;
        $emptyCertId = env('PEST_EBAY_CERT_ID') === null;
        if ($emptyAppId || $emptyDevId || $emptyCertId) {
            fwrite(\STDERR, "Missing traditional eBay API credentials (APP_ID, DEV_ID, CERT_ID). Aborting tests.\n");
            exit(1);
        }
    }

    /**
     * Clean up the testing environment before the next test.
     * @return void
     */
    protected function tearDown(): void
    {
        parent::tearDown();
    }


    /**
     * Get package providers.
     * @param Application $app
     * @return array<int, class-string<mixed>>
     */
    protected function getPackageProviders($app)
    {
        return [
            ServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     * @param Application $app
     * @return void
     */
    protected function defineEnvironment($app)
    {
        $app->bind(Client::class, function (Application $app) {
            $client = new Client(
                auth: new OAuthAuthentication(
                    clientId: env('EBAY_CLIENT_ID'),
                    clientSecret: env('EBAY_CLIENT_SECRET'),
                    redirectUri: env('EBAY_REDIRECT_URI'),
                    environment: 'sandbox',
                    options: [
                        'debug'     => env('EBAY_DEBUG'),
                        'caching'   => env('EBAY_CACHING'),
                        'locale'    => env('EBAY_LOCALE'),
                    ],
                    authorizationScopes: [
                        'https://api.ebay.com/oauth/api_scope',
                        'https://api.ebay.com/oauth/api_scope/commerce.feedback',
                        'https://api.ebay.com/oauth/api_scope/commerce.identity.readonly',
                        'https://api.ebay.com/oauth/api_scope/commerce.notification.subscription',
                        'https://api.ebay.com/oauth/api_scope/commerce.vero',
                        'https://api.ebay.com/oauth/api_scope/sell.account',
                        'https://api.ebay.com/oauth/api_scope/sell.analytics.readonly',
                        'https://api.ebay.com/oauth/api_scope/sell.finances',
                        'https://api.ebay.com/oauth/api_scope/sell.fulfillment',
                        'https://api.ebay.com/oauth/api_scope/sell.inventory',
                        'https://api.ebay.com/oauth/api_scope/sell.inventory.mapping',
                        'https://api.ebay.com/oauth/api_scope/sell.marketing',
                        'https://api.ebay.com/oauth/api_scope/sell.payment.dispute',
                        'https://api.ebay.com/oauth/api_scope/sell.reputation',
                        'https://api.ebay.com/oauth/api_scope/sell.stores',
                    ],
                    credentialScopes: [
                        'https://api.ebay.com/oauth/api_scope',
                        'https://api.ebay.com/oauth/api_scope/commerce.feedback.readonly',
                    ]
                ),
                environment: 'sandbox',
                options: [
                    'debug'     => env('EBAY_DEBUG'),
                    'caching'   => env('EBAY_CACHING'),
                    'locale'    => env('EBAY_CACHING'),
                ]
            );
            $client->setRefreshToken(env('PEST_EBAY_REFRESH_TOKEN'));
            $client->setTraditionalApplicationKeys(
                env('PEST_EBAY_APP_ID'),
                env('PEST_EBAY_DEV_ID'),
                env('PEST_EBAY_CERT_ID')
            );
            return $client;
        });
    }
}
