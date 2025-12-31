<?php declare(strict_types=1);

use Rat\eBaySDK\API\AnalyticsAPI\CustomerServiceMetric\GetCustomerServiceMetric;
use Rat\eBaySDK\API\AnalyticsAPI\RateLimit\GetRateLimits;
use Rat\eBaySDK\API\AnalyticsAPI\SellerStandardsProfile\FindSellerStandardsProfiles;
use Rat\eBaySDK\API\AnalyticsAPI\SellerStandardsProfile\GetSellerStandardsProfile;
use Rat\eBaySDK\API\AnalyticsAPI\TrafficReport\GetTrafficReport;
use Rat\eBaySDK\API\AnalyticsAPI\UserRateLimit\GetUserRateLimits;
use Rat\eBaySDK\Client;
use Rat\eBaySDK\Enums\CustomerServiceMetricType;
use Rat\eBaySDK\Enums\CycleType;
use Rat\eBaySDK\Enums\EvaluationType;
use Rat\eBaySDK\Enums\Marketplace;
use Rat\eBaySDK\Enums\Program;
use Rat\eBaySDK\Enums\TrafficReportDimension;
use Rat\eBaySDK\Enums\TrafficReportMetric;
use Rat\eBaySDK\Support\FilterQuery;

/**
 * @covers Rat\eBaySDK\API\AnalyticsAPI\CustomerServiceMetric\GetCustomerServiceMetric
 */
it('can retrieve customer service metrics using GetCustomerServiceMetric', function ()  {
    $client = app(Client::class);

    $response = $client->execute(new GetCustomerServiceMetric(
        CustomerServiceMetricType::ITEM_NOT_RECEIVED,
        EvaluationType::CURRENT,
        Marketplace::EBAY_DE
    ));
    expect($response->ok())->toBeTrue();
    expect($response->content())
        ->toBeArray()
        ->toHaveKeys(['dimensionMetrics', 'evaluationCycle', 'marketplaceId']);
});

/**
 * @covers Rat\eBaySDK\API\AnalyticsAPI\RateLimit\GetRateLimits
 */
it('can retrieve rate limits using GetRateLimits', function ()  {
    $client = app(Client::class);

    $response = $client->execute(new GetRateLimits());
    expect($response->ok())->toBeTrue();
    expect($response->content())
        ->toBeArray()
        ->toHaveKeys(['rateLimits']);
});

/**
 * @covers Rat\eBaySDK\API\AnalyticsAPI\RateLimit\GetRateLimits
 */
it('can retrieve specific rate limit using GetRateLimits', function ()  {
    $client = app(Client::class);

    $response = $client->execute(new GetRateLimits(
        'api name'      // Sandbox doesn't provide real rateLimits
    ));
    expect($response->ok())->toBeTrue();
    expect($response->content())
        ->toBeArray()
        ->toHaveKeys(['rateLimits']);
});

/**
 * @covers Rat\eBaySDK\API\AnalyticsAPI\SellerStandardsProfile\FindSellerStandardsProfiles
 */
it('can find seller standard profiles using FindSellerStandardsProfiles', function ()  {
    $client = app(Client::class);

    $response = $client->execute(new FindSellerStandardsProfiles);
    expect($response->ok())->toBeTrue();
    expect($response->content())
        ->toBeArray()
        ->toHaveKeys(['standardsProfiles']);
});

/**
 * @covers Rat\eBaySDK\API\AnalyticsAPI\SellerStandardsProfile\GetSellerStandardsProfile
 */
it('can retrieve seller standard profiles using GetSellerStandardsProfile', function ()  {
    $client = app(Client::class);

    $response = $client->execute(new GetSellerStandardsProfile(
        Program::PROGRAM_DE,
        CycleType::CURRENT
    ));
    expect($response->ok())->toBeTrue();
    expect($response->content())
        ->toBeArray()
        ->toHaveKeys(['cycle', 'defaultProgram', 'evaluationReason', 'metrics', 'program', 'standardsLevel']);
});


/**
 * @covers Rat\eBaySDK\API\AnalyticsAPI\TrafficReport\GetTrafficReport
 */
it('can retrieve traffic report using GetTrafficReport', function ()  {
    $client = app(Client::class);

    $response = $client->execute(new GetTrafficReport(
        dimension: TrafficReportDimension::DAY,
        metric: [TrafficReportMetric::CLICK_THROUGH_RATE],
        filter: new FilterQuery([
            'marketplace_ids'   => '{EBAY_DE}',
            'date_range'        => '[20250101..20250131]'
        ])
    ));
    expect($response->ok())->toBeTrue();
})->skip(message: '404');

/**
 * @covers Rat\eBaySDK\API\AnalyticsAPI\UserRateLimit\GetUserRateLimits
 */
it('can retrieve user rate limits using GetUserRateLimits', function ()  {
    $client = app(Client::class);

    $response = $client->execute(new GetUserRateLimits());
    expect($response->ok())->toBeTrue();
    expect($response->content())
        ->toBeArray()
        ->toHaveKeys(['rateLimits']);
});
