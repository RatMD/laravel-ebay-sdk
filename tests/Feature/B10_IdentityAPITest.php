<?php declare(strict_types=1);

use Rat\eBaySDK\API\IdentityAPI\User\GetUser;
use Rat\eBaySDK\Client;

/**
 * @covers Rat\eBaySDK\API\AccountAPI\AdvertisingEligibility\GetAdvertisingEligibility
 */
it('can retrieve user using GetUser ', function ()  {
    $client = app(Client::class);

    $response = $client->execute(new GetUser);
    expect($response->ok())->toBeTrue();
    expect($response->content())
        ->toBeArray()
        ->toHaveKeys(['userId', 'username', 'accountType', 'registrationMarketplaceId']);
});
