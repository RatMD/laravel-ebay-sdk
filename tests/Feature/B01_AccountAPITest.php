<?php declare(strict_types=1);

use Rat\eBaySDK\API\AccountAPI\RateTable\GetRateTables;
use Rat\eBaySDK\Client;
use Rat\eBaySDK\Enums\CountryCode;

it('can retrieve RateTables', function ()  {
    $client = app(Client::class);

    $response = $client->execute(new GetRateTables(CountryCode::DE));
    dd($response);
});
