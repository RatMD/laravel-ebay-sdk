<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Rat\eBaySDK\Http\Controllers\AuthController;
use Rat\eBaySDK\Http\Controllers\EventController;

Route::prefix('ebay')->name('ebay-sdk.')->group(function () {
    Route::post('/notify/{token?}', [EventController::class, 'dispatch'])
        ->name('webhook.notify');

    Route::get('/oauth/authorize', [AuthController::class, 'authorize'])
        ->name('oauth.authorize')
        ->middleware('web');

    Route::get('/oauth/callback', [AuthController::class, 'handleCallback'])
        ->name('oauth.callback')
        ->middleware('web');

    Route::get('/oauth/rejected', [AuthController::class, 'rejected'])
        ->name('oauth.rejected')
        ->middleware('web');
});
