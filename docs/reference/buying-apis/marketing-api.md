---
outline: deep
---
# Marketing API <Badge type="warning" style="margin-left:0.75rem;">v1.1.0</Badge> <DocsBadge path="buy/marketing/v1/overview.html" />

> [!NOTE]
> This is the v1 version of the Marketing API. For the beta version, see [Marketing Beta API](/reference/buying-apis/marketing-beta-api.html).

The Marketing API is part of the eBay Buy APIs. It retrieves eBay products based on a metric, such 
as Best Selling. This API helps shoppers compare products and motivate them to purchase items. You 
can use the other Buy APIs to create a buying application that lets users, eBay members or guests, 
buy from eBay sellers without visiting the eBay site. The Buy APIs provide the opportunity to 
purchase eBay items in your app or website.

## MerchandisedProducts

### GetMerchandisedProducts <DocsBadge path="buy/marketing/v1/resources/merchandised_product/methods/getMerchandisedProducts" />

<ResourcePath method="GET">/merchandised_product</ResourcePath>

This method returns an array of products based on the category and metric specified. This includes 
details of the product, such as the eBay product ID (EPID), title, and user reviews and ratings for 
the product. You can use the epid returned by this method in the Browse API search method to 
retrieve items for this product.

```php
use Rat\eBaySDK\API\MarketingAPI\MerchandisedProducts\GetMerchandisedProducts;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetMerchandisedProducts(
    metricName: (string) $metricName,
    categoryId: (string) $categoryId,
    aspectFilter: (string) $aspectFilter = null,
    limit: (int) $limit = 8,
);
$response = $client->execute($request);
```

## MostWatchedItems

### GetMostWatchedItems <DocsBadge path="buy/marketing/v1/resources/most_watched_items/methods/getMostWatchedItems" />

<ResourcePath method="GET">/most_watched_items</ResourcePath>

This method retrieves items with the highest watch counts in a specific category.

The leaf category for which to retrieve items with the highest watch counts is specified by its 
category_id value. Up to 50 items can be returned for a specific category using this method. The 
number of items to return using this method can be specified through the max_result query parameter. 
If this parameter is not used, the top 20 most watched items will be returned for the specified 
category.

A successful call returns details about the most watched items in a specific category, such as the 
watch count, current price, shipping cost, and basic information about the listing. Returned items 
are ranked in descending order with the highest watch count appearing first.

```php
use Rat\eBaySDK\API\MarketingAPI\MostWatchedItems\GetMostWatchedItems;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetMostWatchedItems(
    marketplaceId: (string) $marketplaceId,
    categoryId: (string) $categoryId,
    maxResults: (int) $maxResults = 8,
    endUserCtx: (string) $endUserCtx = null
);
$response = $client->execute($request);
```

## SimilarItems

### GetSimilarItems <DocsBadge path="buy/marketing/v1/resources/similar_items/methods/getSimilarItems" />

<ResourcePath method="GET">/similar_items</ResourcePath>

This method retrieves items that are similar to the specified item.

Items are considered similar if they can serve as a replacement or alternative for the specified 
item. Similar items from a catalog are associated with the same product. For items not associated 
with a product, similarity is determined by keywords in the title and attribute value matches.

The item for which to retrieve similar items is specified by its item_id value, input as a required 
query parameter. A successful call returns a list of items similar to the specified item, as well as 
details about each item. This includes the current price and shipping costs are returned for each 
item, as well as basic information about the listing, such as its item ID, price, shipping cost, and 
time left on the listing.

```php
use Rat\eBaySDK\API\MarketingAPI\SimilarItems\GetSimilarItems;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetSimilarItems(
    marketplaceId: (string) $marketplaceId,
    itemId: (string) $itemId,
    excludedCategoryIds: (string) $excludedCategoryIds = null
    buyingOption: (string) $buyingOption = null
    filter: (string) $filter = null
    maxResults: (int) $maxResults = 20,
    endUserCtx: (string) $endUserCtx = null
);
$response = $client->execute($request);
```