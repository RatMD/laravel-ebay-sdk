<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Rat\eBaySDK\Http\Controllers\AuthController;

Route::prefix('ebay/oauth')->name('ebay-sdk.')->group(function () {
    Route::middleware(config('ebay-sdk.oauth.middleware', ['web', 'auth', 'throttle:30,1']))
        ->group(function() {
            Route::get('/authorize', [AuthController::class, 'authorize'])
                ->name('oauth.authorize');

            Route::get('/callback', [AuthController::class, 'handleCallback'])
                ->name('oauth.callback');

            Route::get('/rejected', [AuthController::class, 'rejected'])
                ->name('oauth.rejected');
        }
    );
});
