---
outline: deep
---
# Recommendation API <DocsBadge path="sell/recommendation/static/overview.html" />

The Recommendation API returns information that sellers can use to configure Promoted Listings ad 
campaigns.

> [!NOTE]
> The Recommendation API only applies to general strategy campaigns that use the Cost Per Sale (CPS) 
> funding model; it does not apply to priority strategy campaigns that use the Cost Per Click (CPC) 
> funding model.

The Recommendation API currently has a single recommendation type, AD, that returns information 
pertaining to Promoted Listings ad campaigns. Seller can use the recommendations returned as 
guidelines for setting up campaigns.

In the eBay marketplace, where an increased visibility directly correlates to the buyer conversion 
rate, information returned with the AD recommendation type can help you know which listings to 
promote and how to configure ad campaigns.

## ListingRecommendation

### FindListingRecommendations <DocsBadge path="sell/recommendation/static/overview.html" />

<ResourcePath method="GET">/find</ResourcePath>

The find method currently returns information for a single recommendation type (AD) which contains 
information that sellers can use to configure [Promoted Listings](https://developer.ebay.com/api-docs/sell/static/marketing/promoted-listings.html)
ad campaigns.

The response from this method includes an array of the seller's listing IDs, where each element in 
the array contains recommendations related to the associated listing ID. For details on how to use 
this method, [see Using the Recommendation API to help configure campaigns](https://developer.ebay.com/api-docs/sell/static/marketing/pl-reco-api.html).

```php
use Rat\eBaySDK\API\RecommendationAPI\ListingRecommendation\FindEligibleItems;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new FindEligibleItems(
    filter: (string) $filter = null,
    limit: (int) $limit = 10,
    offset: (int) $offset = 0,
);
$response = $client->execute($request);
```