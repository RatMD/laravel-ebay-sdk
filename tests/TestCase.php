<?php declare(strict_types=1);

namespace Rat\eBaySDK\Tests;

use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as Orchestra;
use Rat\eBaySDK\Authentication\OAuthAuthentication;
use Rat\eBaySDK\Client;
use Rat\eBaySDK\Environment;
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

        $emptyClient = empty(env('EBAY_CLIENT_ID', null));
        $emptySecret = empty(env('EBAY_CLIENT_SECRET', null));
        $emptyRedirect = empty(env('EBAY_REDIRECT_URI', null));
        $emptyDevId = empty(env('EBAY_DEV_ID', null));
        if ($emptyClient || $emptySecret || $emptyRedirect || $emptyDevId) {
            fwrite(\STDERR, "Missing required credentials configuration. Aborting tests.\n");
            exit(1);
        }

        if (env('EBAY_API_ENVIRONMENT') !== 'sandbox') {
            fwrite(\STDERR, "Invalid environment configuration. Expected 'sandbox'. Aborting tests.\n");
            exit(1);
        }

        if (empty(env('PEST_EBAY_REFRESH_TOKEN', null))) {
            fwrite(\STDERR, "Missing PEST_EBAY_REFRESH_TOKEN environment variable. Aborting tests.\n");
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
            $environment = new Environment(
                clientId: env('EBAY_CLIENT_ID'),
                clientSecret: env('EBAY_CLIENT_SECRET'),
                redirectUri: env('EBAY_REDIRECT_URI'),
                devId: env('EBAY_DEV_ID'),
                environment: env('EBAY_API_ENVIRONMENT'),
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
                ],
                debug: env('EBAY_DEBUG'),
                caching: env('EBAY_CACHING'),
                locale: env('EBAY_LOCALE'),
                compatibilityLevel: env('EBAY_COMPATIBILITY_LEVEL'),
                siteId: env('EBAY_SITE_ID')
            );

            $client = new Client(
                environment: $environment,
                auth: new OAuthAuthentication($environment),
            );
            $client->setRefreshToken(env('PEST_EBAY_REFRESH_TOKEN'));

            return $client;
        });
    }
}
