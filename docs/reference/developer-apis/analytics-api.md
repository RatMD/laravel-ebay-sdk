---
outline: deep
---
# Analytics API <Badge type="warning" style="margin-left:0.75rem;">v1_beta.0.1</Badge> <DocsBadge path="developer/analytics/static/overview.html" />

The Analytics API provides users with key information about their RESTful API and Trading API usage, 
and how that compares with the call quotas established for each API or API method or call.

The data pertaining to usage against the limit of a specific method or call is called rate-limit 
data, and you can use the Analytics API to get rate-limit data on a per-user or per-application 
basis.

## RateLimit

### GetRateLimits <DocsBadge path="developer/analytics/resources/rate_limit/methods/getRateLimits" />

<ResourcePath method="GET">/rate_limit</ResourcePath>

This method retrieves the call limit and utilization data for an application. The data is retrieved 
for all RESTful APIs and the legacy Trading API.

The response from getRateLimits includes a list of the applicable resources and the "call limit", or 
quota, that is set for each resource. In addition to quota information, the response also includes 
the number of remaining calls available before the limit is reached, the time remaining before the 
quota resets, the number of calls made to the specific resource, and the length of the "time window" 
to which the quota applies.

By default, this method returns utilization data for all RESTful API and the legacy Trading API 
resources. Use the api_name and api_context query parameters to filter the response to only the 
desired APIs.

```php
use Rat\eBaySDK\API\AnalyticsAPI\RateLimit\GetRateLimits;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetRateLimits(
    apiName: (string) $apiName = null,
    apiContext: (string) $apiContext = null,
);
$response = $client->execute($request);
```

## UserRateLimit

### GetUserRateLimits <DocsBadge path="developer/analytics/resources/user_rate_limit/methods/getUserRateLimits" />

<ResourcePath method="GET">/user_rate_limit</ResourcePath>

This method retrieves the call limit and utilization data for an application user. The call-limit 
data is returned for all RESTful APIs and the legacy Trading API that limit calls on a per-user 
basis.

The response from getUserRateLimits includes a list of the applicable resources and the 
"call limit", or quota, that is set for each resource. In addition to quota information, the 
response also includes the number of remaining calls available before the limit is reached, the time 
remaining before the quota resets, the number of calls made to the specific resource, and the length 
of the "time window" to which the quota applies.

By default, this method returns utilization data for all RESTful APIs resources and the legacy 
Trading API calls that limit request access by user. Use the api_name and api_context query 
parameters to filter the response to only the desired APIs.

```php
use Rat\eBaySDK\API\AnalyticsAPI\UserRateLimit\GetUserRateLimits;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetUserRateLimits(
    apiName: (string) $apiName = null,
    apiContext: (string) $apiContext = null,
);
$response = $client->execute($request);
```