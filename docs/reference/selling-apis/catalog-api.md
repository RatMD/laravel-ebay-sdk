---
outline: deep
---
# Catalog API <Badge type="warning" style="margin-left:0.75rem;">v1_beta.5.3</Badge> <DocsBadge path="sell/catalog/overview.html" />

The Catalog API allows users to search for and locate an eBay catalog product that is a direct match 
for the product that they wish to sell. Listing against an eBay catalog product helps insure that 
all listings (based off of that catalog product) have complete and accurate information. Buyers are 
then able to compare 'apples to apples', and base their purchasing decisions on real differences 
between listings, such as price, shipping cost, and any item promotions.

In addition to helping to create high-quality listings, another benefit to the seller of using 
catalog information to create listings is that much of the details of the listing will be prefilled, 
including the listing title, the listing description, the item specifics, and a stock image for the 
product (if available). Sellers will not have to enter item specifics themselves, and the overall 
listing process is a lot faster and easier.

For more information about finding eBay catalog products and using these products to list, see 
Matching inventory to catalog products in the Selling Integration Guide.

## Product

### GetProduct <DocsBadge path="sell/catalog/resources/product/methods/getProduct" />

<ResourcePath method="GET">/product/{epid}</ResourcePath>

This method retrieves details of the catalog product identified by the eBay product identifier 
(ePID) specified in the request. These details include the product's title and description, aspects 
and their values, associated images, applicable category IDs, and any recognized identifiers that 
apply to the product.

For a new listing, you can use the search method to identify candidate products on which to base 
the listing, then use the getProduct method to present the full details of those candidate products 
to the seller to make a a final selection.

```php
use Rat\eBaySDK\API\CatalogAPI\Product\GetProduct;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetProduct(
    epid: (string) $epid
);
$response = $client->execute($request);
```

## ProductSummary

### Search <DocsBadge path="sell/catalog/resources/product_summary/methods/search" />

<ResourcePath method="GET">/product_summary/search</ResourcePath>

This method searches for and retrieves summaries of one or more products in the eBay catalog that 
match the search criteria provided by a seller. The seller can use the summaries to select the 
product in the eBay catalog that corresponds to the item that the seller wants to offer for sale. 
When a corresponding product is found and adopted by the seller, eBay will use the product 
information to populate the item listing. The criteria supported by search include keywords, product 
categories, and category aspects. To see the full details of a selected product, use the getProduct 
call.

In addition to product summaries, this method can also be used to identify refinements, which help 
you to better pinpoint the product you're looking for. A refinement consists of one or more aspect 
values and a count of the number of times that each value has been used in previous eBay listings. 
An aspect is a property (e.g. color or size) of an eBay category, used by sellers to provide details 
about the items they're listing. The refinement container is returned when you include the 
fieldGroups query parameter in the request with a value of ASPECT_REFINEMENTS or FULL.

```php
use Rat\eBaySDK\API\CatalogAPI\ProductSummary\Search;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new Search(
    q: (string) $q = null,
    gtin: (string) $gtin = null,
    mpn: (string) $mpn = null,
    categoryIds: (string) $categoryIds = null,
    aspectFilter: (string) $aspectFilter = null,
    fieldGroups: (string) $fieldGroups = null,
    limit: (int) $limit = 50,
    offset: (int) $offset = 0,
);
$response = $client->execute($request);
```