---
outline: deep
---
# Marketing Beta API <Badge type="warning" style="margin-left:0.75rem;">v1_beta.2.0</Badge> <DocsBadge path="buy/marketing/static/overview.html" />

> [!NOTE]
> This is the beta version of the Marketing API. For the v1 version, see [Marketing API](/reference/buying-apis/marketing-api.html).

The Marketing Beta API is part of the eBay Buy APIs. It retrieves eBay products based on a metric, 
such as Best Selling. This API helps shoppers compare products and motivate them to purchase items. 
You can use the other Buy APIs to create a buying application that lets users, eBay members or 
guests, buy from eBay sellers without visiting the eBay site. The Buy APIs provide the opportunity 
to purchase eBay items in your app or website

## MerchandisedProduct

### GetMerchandisedProducts <DocsBadge path="buy/marketing/resources/merchandised_product/methods/getMerchandisedProducts" />

<ResourcePath method="GET">/merchandised_product</ResourcePath>

This method returns an array of products based on the category and metric specified. This includes 
details of the product, such as the eBay product ID (EPID), title, and user reviews and ratings for 
the product. You can use the epid returned by this method in the Browse API search method to 
retrieve items for this product.

```php
use Rat\eBaySDK\API\MarketingBetaAPI\MerchandisedProduct\GetMerchandisedProducts;
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