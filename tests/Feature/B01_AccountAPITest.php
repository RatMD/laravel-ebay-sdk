<?php declare(strict_types=1);

use Illuminate\Support\Arr;
use Rat\eBaySDK\API\AccountAPI\CustomPolicy\CreateCustomPolicy;
use Rat\eBaySDK\API\AccountAPI\CustomPolicy\GetCustomPolicies;
use Rat\eBaySDK\API\AccountAPI\FulfillmentPolicy\CreateFulfillmentPolicy;
use Rat\eBaySDK\API\AccountAPI\Program\GetOptedInPrograms;
use Rat\eBaySDK\API\AccountAPI\Program\OptInToProgram;
use Rat\eBaySDK\Client;
use Rat\eBaySDK\Enums\CategoryType;
use Rat\eBaySDK\Enums\CustomPolicyType;
use Rat\eBaySDK\Enums\MarketplaceId;
use Rat\eBaySDK\Enums\ProgramType;

/**
 * @covers Rat\eBaySDK\API\AccountAPI\CustomPolicy\CreateCustomPolicy
 */
it('can create custom policy using CreateCustomPolicy', function ()  {
    $client = app(Client::class);

    $response = $client->execute(new CreateCustomPolicy([
        'name'          => 'internal_policy_name',
        'label'         => 'Policy Label',
        'description'   => 'Policy Description',
        'policyType'    => CustomPolicyType::TAKE_BACK,
    ]));
    expect($response->ok())->toBeTrue();
    expect($response->content())
        ->toBeArray()
        ->toHaveKeys(['total', 'customPolicies']);
})->skip(message: '20500');

/**
 * @covers Rat\eBaySDK\API\AccountAPI\CustomPolicy\GetCustomPolicies
 */
it('can retrieve custom policies using GetCustomPolicies', function ()  {
    $client = app(Client::class);

    $response = $client->execute(new GetCustomPolicies());
    expect($response->ok())->toBeTrue();
    expect($response->content())
        ->toBeArray()
        ->toHaveKeys(['total', 'customPolicies']);
});

/**
 * @covers Rat\eBaySDK\API\AccountAPI\CustomPolicy\CreateFulfillmentPolicy
 */
it('can create fulfillment policy using CreateFulfillmentPolicy', function ()  {
    $client = app(Client::class);

    // SELLING_POLICY_MANAGEMENT program is required
    $response = $client->execute(new GetOptedInPrograms);
    $programs = Arr::flatten($response->content()['programs'] ?? []);
    if (!in_array(ProgramType::SELLING_POLICY_MANAGEMENT->value, $programs)) {
        $response = $client->execute(
            new OptInToProgram(ProgramType::SELLING_POLICY_MANAGEMENT)
        );
        expect($response->ok())->toBeTrue();
    }

    // Create Fulfillment Policy
    $response = $client->execute(new CreateFulfillmentPolicy([
        'categoryTypes' => [
            [
                'default' => false,
                'name' => CategoryType::ALL_EXCLUDING_MOTORS_VEHICLES
            ]
        ],
        'marketplaceId' => MarketplaceId::EBAY_DE,
        'name' => 'Custom Fulfillment Policy',
    ]));
    dd($response);
    expect($response->ok())->toBeTrue();
    expect($response->content())
        ->toBeArray()
        ->toHaveKeys(['total', 'customPolicies']);
});
