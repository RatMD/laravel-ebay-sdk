<?php declare(strict_types=1);

use Rat\eBaySDK\API\AnalyticsAPI\CustomerServiceMetric\GetCustomerServiceMetric;
use Rat\eBaySDK\Client;
use Rat\eBaySDK\Enums\CustomerServiceMetricType;
use Rat\eBaySDK\Enums\EvaluationType;
use Rat\eBaySDK\Enums\Marketplace;

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
