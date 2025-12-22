<?php declare(strict_types=1);

use Rat\eBaySDK\Client;

it('can refresh the access token', function ()  {
    $client = app(Client::class);
    $client->getAuthentication()->getAccessToken();
})->throwsNoExceptions();
