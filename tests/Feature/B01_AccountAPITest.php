<?php declare(strict_types=1);

use Rat\eBaySDK\API\AccountAPI\AdvertisingEligibility\GetAdvertisingEligibility;
use Rat\eBaySDK\API\AccountAPI\CustomPolicy\GetCustomPolicies;
use Rat\eBaySDK\Client;

it('can retrieve policies using GetCustomPolicies', function ()  {
    $client = app(Client::class);

    $response = $client->execute(new GetCustomPolicies());
    expect($response->ok())->toBeTrue();
    expect($response->content())
        ->toBeArray()
        ->toHaveKeys(['total', 'customPolicies']);
});
