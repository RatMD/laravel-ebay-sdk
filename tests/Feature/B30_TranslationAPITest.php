<?php declare(strict_types=1);

use Rat\eBaySDK\API\TranslationAPI\Language\Translate;
use Rat\eBaySDK\Client;
use Rat\eBaySDK\Enums\TranslationContext;
use Rat\eBaySDK\Enums\TranslationLanguage;

/**
 * @covers Rat\eBaySDK\API\TranslationAPI\Language\Translate
 */
it('can translate using Translate', function ()  {
    $client = app(Client::class);

    $response = $client->execute(new Translate([
        'from'                  => TranslationLanguage::EN,
        'text'                  => ['Hello World'],
        'to'                    => TranslationLanguage::DE,
        'translationContext'    => TranslationContext::ITEM_TITLE,
    ]));
    expect($response->ok())->toBeTrue();
    expect($response->content())
        ->toBeArray()
        ->toHaveKeys(['from', 'to', 'translations']);
});
