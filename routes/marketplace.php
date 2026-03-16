<?php declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Rat\eBaySDK\Http\Controllers\MarketplaceDeletionController;

Route::prefix('ebay/marketplace')->name('ebay-sdk.')->group(function () {
    Route::match(['get', 'post'], '/deletion', [MarketplaceDeletionController::class, 'handle'])
        ->middleware(config('ebay-sdk.marketplace_deletion.middleware', []))
        ->name('marketplace.deletion');
});
