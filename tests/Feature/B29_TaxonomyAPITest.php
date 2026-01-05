<?php declare(strict_types=1);

use Rat\eBaySDK\API\TaxonomyAPI\CategoryTree\FetchItemAspects;
use Rat\eBaySDK\API\TaxonomyAPI\CategoryTree\GetCategorySubtree;
use Rat\eBaySDK\API\TaxonomyAPI\CategoryTree\GetCategorySuggestions;
use Rat\eBaySDK\API\TaxonomyAPI\CategoryTree\GetCategoryTree;
use Rat\eBaySDK\API\TaxonomyAPI\CategoryTree\GetCompatibilityProperties;
use Rat\eBaySDK\API\TaxonomyAPI\CategoryTree\GetCompatibilityPropertyValues;
use Rat\eBaySDK\API\TaxonomyAPI\CategoryTree\GetDefaultCategoryTreeId;
use Rat\eBaySDK\API\TaxonomyAPI\CategoryTree\GetExpiredCategories;
use Rat\eBaySDK\API\TaxonomyAPI\CategoryTree\GetItemAspectsForCategory;
use Rat\eBaySDK\Client;
use Rat\eBaySDK\Support\FilterQuery;

/**
 * @covers Rat\eBaySDK\API\TaxonomyAPI\CategoryTree\FetchItemAspects
 */
it('can fetch item aspects using FetchItemAspects', function ()  {
    $client = app(Client::class);

    $response = $client->execute(new FetchItemAspects(77));
    expect($response->ok())->toBeTrue();
    expect($response->contentType)->toBe('application/octet-stream');
});

/**
 * @covers Rat\eBaySDK\API\TaxonomyAPI\CategoryTree\GetCategorySubTree
 */
it('can fetch category subtree using GetCategorySubTree', function ()  {
    $client = app(Client::class);

    $response = $client->execute(new GetCategorySubtree(77, 63));
    expect($response->ok())->toBeTrue();
    expect($response->content())
        ->toBeArray()
        ->toHaveKeys(['categoryTreeId', 'categoryTreeVersion', 'categorySubtreeNode']);
});

/**
 * @covers Rat\eBaySDK\API\TaxonomyAPI\CategoryTree\GetCategorySubTree
 */
it('can fetch gzipped category subtree using GetCategorySubTree', function ()  {
    $client = app(Client::class);

    $response = $client->execute(new GetCategorySubtree(77, 63, true));
    expect($response->ok())->toBeTrue();
    expect($response->headers['x-encoded-content-encoding'][0] ?? '')->toBe('gzip');
});

/**
 * @covers Rat\eBaySDK\API\TaxonomyAPI\CategoryTree\GetCategorySuggestions
 */
it('can receive suggestions using GetCategorySuggestions', function ()  {
    $client = app(Client::class);

    $response = $client->execute(new GetCategorySuggestions(77, 'Mass Effect: The Complete Comics Collection'));
    expect($response->ok())->toBeTrue();
    expect($response->content())
        ->toBeArray()
        ->toHaveKeys(['categorySuggestions', 'categoryTreeId', 'categoryTreeVersion']);
});

/**
 * @covers Rat\eBaySDK\API\TaxonomyAPI\CategoryTree\GetCategoryTree
 */
it('can fetch category tree using GetCategoryTree', function ()  {
    $client = app(Client::class);

    $response = $client->execute(new GetCategoryTree(77));
    expect($response->ok())->toBeTrue();
    expect($response->content())
        ->toBeArray()
        ->toHaveKeys(['categoryTreeId', 'categoryTreeVersion', 'rootCategoryNode', 'applicableMarketplaceIds']);
});

/**
 * @covers Rat\eBaySDK\API\TaxonomyAPI\CategoryTree\GetCategoryTree
 */
it('can fetch gzipped category subtree using GetCategoryTree', function ()  {
    $client = app(Client::class);

    $response = $client->execute(new GetCategoryTree(77, true));
    expect($response->ok())->toBeTrue();
    expect($response->headers['x-encoded-content-encoding'][0] ?? '')->toBe('gzip');
});

/**
 * @covers Rat\eBaySDK\API\TaxonomyAPI\CategoryTree\GetCompatibilityProperties
 */
it('can fetch compatibility properties using GetCompatibilityProperties', function ()  {
    $client = app(Client::class);

    $response = $client->execute(new GetCompatibilityProperties(77, 6030));
    expect($response->ok())->toBeTrue();
    expect($response->content())
        ->toBeArray()
        ->toHaveKeys(['compatibilityProperties']);
});

/**
 * @covers Rat\eBaySDK\API\TaxonomyAPI\CategoryTree\GetCompatibilityPropertyValues
 */
it('can fetch compatibility property values using GetCompatibilityPropertyValues', function ()  {
    $client = app(Client::class);

    $response = $client->execute(new GetCompatibilityPropertyValues(
        categoryTreeId: 77,
        categoryId: 6030,
        compatibilityProperty: "Engine",
        filter: new FilterQuery([
            'Year' => '2022',
            'Make' => 'Audi'
        ])
    ));
    expect($response->ok())->toBeTrue();
    expect($response->content())
        ->toBeArray()
        ->toHaveKeys(['compatibilityPropertyValues']);
})->skip(message: "62000");

/**
 * @covers Rat\eBaySDK\API\TaxonomyAPI\CategoryTree\GetDefaultCategoryTreeId
 */
it('can retrieve default category tree id using GetDefaultCategoryTreeId', function ()  {
    $client = app(Client::class);

    $response = $client->execute(new GetDefaultCategoryTreeId('EBAY_DE'));
    expect($response->ok())->toBeTrue();
    expect($response->content())
        ->toBeArray()
        ->toHaveKeys(['categoryTreeId', 'categoryTreeVersion']);
    expect($response->content()['categoryTreeId'])->toBe("77");
});

/**
 * @covers Rat\eBaySDK\API\TaxonomyAPI\CategoryTree\GetExpiredCategories
 */
it('can retrieve expired categories using GetExpiredCategories', function ()  {
    $client = app(Client::class);

    $response = $client->execute(new GetExpiredCategories(77));
    expect($response->ok())->toBeTrue();
    expect($response->content())
        ->toBeArray()
        ->toHaveKeys(['expiredCategories']);
});


/**
 * @covers Rat\eBaySDK\API\TaxonomyAPI\CategoryTree\GetExpiredCategories
 */
it('can retrieve item aspects for category using GetItemAspectsForCategory', function ()  {
    $client = app(Client::class);

    $response = $client->execute(new GetItemAspectsForCategory(77, 259109));
    expect($response->ok())->toBeTrue();
    expect($response->content())
        ->toBeArray()
        ->toHaveKeys(['aspects']);
});
