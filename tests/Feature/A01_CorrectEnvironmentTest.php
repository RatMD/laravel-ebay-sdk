<?php declare(strict_types=1);

use Rat\eBaySDK\Client;

it('has the correct environment set', function ()  {
    expect(app(Client::class)->getEnvironment())->toBe('sandbox');
});
