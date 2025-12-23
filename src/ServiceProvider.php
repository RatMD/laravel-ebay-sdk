<?php declare(strict_types=1);

namespace Rat\eBaySDK;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Rat\eBaySDK\Commands\AuthorizeCommand;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Register eBaySDK application services.
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/ebay-sdk.php', 'ebay-sdk');

        $this->app->bind(Client::class, fn ($app) =>  new Client());
    }

    /**
     * Boot eBaySDK application services.
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/ebay-sdk.php' => config_path('ebay-sdk.php'),
        ], 'ebay-sdk-config');

        if (config('ebay-sdk.oauth.routes', false)) {
            $this->loadRoutesFrom(__DIR__.'/../routes/oauth.php');
        }

        if (config('ebay-sdk.webhook.routes', false)) {
            $this->loadRoutesFrom(__DIR__.'/../routes/webhook.php');
        }

        if ($this->app->runningInConsole()) {
            $this->commands([
                AuthorizeCommand::class,
            ]);
        }
    }
}
