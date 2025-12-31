---
outline: deep
---
# Analytics API <Badge type="warning" style="margin-left:0.75rem;">v1.3.2</Badge> <DocsBadge path="sell/analytics/static/overview.html" />

The Analytics API provides information about an individual seller’s business through different 
report and data gathering resources:

- Customer service metric ratings and benchmark data
- The Traffic Report
- The Seller Standard Profiles Report

Understanding the health and performance of your business is crucial to maintaining and planning 
your business growth.

The methods in the Analytics API return metric ratings and information that

- **Traffic reports** gives you insight in how buyers engage with your listings
- **Customer service metrics** detail how you are meeting buyers’ customer-service expectations
- **Seller profiles** detail the returns the eBay seller rating of a seller in the regions in which 
the seller is active.

The calls in the API support reporting changes over time, and depending on your trading history, you 
might have multiple years of available data to work with. You can look at different history 
configurations to see how seasonal changes affect your business, or use the tools do an other 
time-based analysis.

## CustomerServiceMetric

### GetCustomerServiceMetric <DocsBadge path="sell/analytics/resources/customer_service_metric/methods/getCustomerServiceMetric" />

<ResourcePath method="GET">/customer_service_metric/{customerServiceMetricType}/{evaluationType}</ResourcePath>

Use this method to retrieve a seller's performance and rating for the customer service metric.

Control the response from the **getCustomerServiceMetric** method using the following path and query 
parameters:

- **customer_service_metric_type** controls the type of customer service transactions evaluated for 
the metric rating.
- **evaluation_type** controls the period you want to review.
-- **evaluation_marketplace_id** specifies the target marketplace for the evaluation.

Currently, metric data is returned for only peer benchmarking. For details on the workings of peer 
benchmarking, see [Service metrics policy](https://www.ebay.com/help/policies/selling-policies/seller-performance-policy/service-metrics-policy?id=4769).

For details on using and understanding the response from this method, see 
[Interpreting customer service metric ratings](https://developer.ebay.com/api-docs/sell/static/performance/customer-service-metric.html).

```php
use Rat\eBaySDK\API\AnalyticsAPI\CustomerServiceMetric\GetCustomerServiceMetric;
use Rat\eBaySDK\Enums\CustomerServiceMetricType;
use Rat\eBaySDK\Enums\EvaluationType;
use Rat\eBaySDK\Enums\Marketplace;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetCustomerServiceMetric(
    customerServiceMetricType: CustomerServiceMetricType::ITEM_NOT_RECEIVED,
    evaluationType: EvaluationType::CURRENT,
    evaluationMarketplaceId: Marketplace::EBAY_US,
);
$response = $client->execute($request);
```

## SellerStandardsProfile

### FindSellerStandardsProfiles <DocsBadge path="sell/analytics/resources/seller_standards_profile/methods/findSellerStandardsProfiles" />

<ResourcePath method="GET">/seller_standards_profile</ResourcePath>

This call retrieves all the standards profiles for the associated seller.

A standards profile is a set of eBay seller metrics and the seller's associated compliance values 
(either TOP_RATED, ABOVE_STANDARD, or BELOW_STANDARD).

A seller's multiple profiles are distinguished by two criteria, a "program" and a "cycle." A 
profile's program is one of three regions where the seller may have done business, or PROGRAM_GLOBAL 
to indicate all marketplaces where the seller has done business. The cycle value specifies whether 
the standards compliance values were determined at the last official eBay evaluation or at the time 
of the request.

For more information on the interpreting the response payload of this method, see 
[Seller standards profile](https://developer.ebay.com/api-docs/sell/static/performance/seller-standards.html).

```php
use Rat\eBaySDK\API\AnalyticsAPI\SellerStandardsProfile\FindSellerStandardsProfiles;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new FindSellerStandardsProfiles();
$response = $client->execute($request);
```

### GetSellerStandardsProfile <DocsBadge path="sell/analytics/resources/seller_standards_profile/methods/getSellerStandardsProfile" />

<ResourcePath method="GET">/seller_standards_profile/{program}/{cycle}</ResourcePath>

This call retrieves a single standards profile for the associated seller.

A standards profile is a set of eBay seller metrics and the seller's associated compliance values 
(either TOP_RATED, ABOVE_STANDARD, or BELOW_STANDARD).

A seller can have multiple profiles distinguished by two criteria, a "program" and a "cycle." A 
profile's program is one of three regions where the seller may have done business, or PROGRAM_GLOBAL 
to indicate all marketplaces where the seller has done business. The cycle value specifies whether 
the standards compliance values were determined at the last official eBay evaluation (CURRENT) or at 
the time of the request (PROJECTED). Both cycle and a program values are required URI parameters for 
this method.

For more information on the interpreting the response payload of this method, see 
[Seller standards profile](https://developer.ebay.com/api-docs/sell/static/performance/seller-standards.html).

```php
use Rat\eBaySDK\API\AnalyticsAPI\SellerStandardsProfile\GetSellerStandardsProfile;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetSellerStandardsProfile(
    program: (string) $program,
    cycle: (string) $cycle,
);
$response = $client->execute($request);
```

## TrafficReport

### GetTrafficReport <DocsBadge path="sell/analytics/resources/traffic_report/methods/getTrafficReport" />

<ResourcePath method="GET">/traffic_report</ResourcePath>

This method returns a report that details the user traffic received by a seller's listings.

A traffic report gives sellers the ability to review how often their listings appeared on eBay, how 
many times their listings are viewed, and how many purchases were made. The report also returns the 
report's start and end dates, and the date the information was last updated.

For more information, see [Traffic report details](https://developer.ebay.com/api-docs/sell/static/performance/traffic-report.html).

```php
use Rat\eBaySDK\API\AnalyticsAPI\TrafficReport\GetTrafficReport;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetTrafficReport(
    dimension: (string) $dimension,
    metric: (string) $metric,
    filter: (string) $filter,
    sort: (string) $sort = null,
);
$response = $client->execute($request);
```