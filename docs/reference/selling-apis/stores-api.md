---
outline: deep
---
# Stores API <Badge type="warning" style="margin-left:0.75rem;">v1.0.0</Badge> <DocsBadge path="sell/stores/overview.html" />

The Stores API is used to provide stores related resources for third-party developers to integrate. 
The Stores API has the following entities:

- **Store**: User must have an active eBay Store.
- **Category**: Leaf categories have listings.

> [!NOTE]
> Three levels of store categories are supported.

> [!CAUTION]
> If you initiate a category change, you cannot make additional category changes until the previous 
> change request has completed. Use getStoreTask (or getStoreTasks) method to get latest status of 
> your last request.

## Store

### AddStoreCategory <DocsBadge path="sell/stores/resources/store/methods/addStoreCategory" />

<ResourcePath method="POST">/store/categories</ResourcePath>

This method is used to add a single new custom category to a user's eBay store through an 
asynchronous request. A successful call returns the getStoreTask URI in the Location response 
header. Call getStoreTask (or getStoreTasks) method to retrieve the status of the add category
operation.

```php
use Rat\eBaySDK\API\StoresAPI\Store\AddStoreCategory;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new AddStoreCategory(
    payload: (array) $payload
);
$response = $client->execute($request);
```

### DeleteStoreCategory <DocsBadge path="sell/stores/resources/store/methods/deleteStoreCategory" />

<ResourcePath method="DELETE">/store/categories/{categoryId}</ResourcePath>

This method is used to delete one custom category of a user's eBay store through an asynchronous 
request. A successful call returns the getStoreTask URI in the Location response header. Call 
getStoreTask (or getStoreTasks) method to retrieve the status of the delete category operation.

```php
use Rat\eBaySDK\API\StoresAPI\Store\DeleteStoreCategory;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new DeleteStoreCategory(
    categoryId: (string) $categoryId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### GetStore <DocsBadge path="sell/stores/resources/store/methods/getStore" />

<ResourcePath method="GET">/store</ResourcePath>

This method is used to retrieve information for an eBay user's store such as store name, store URL, 
and description.

```php
use Rat\eBaySDK\API\StoresAPI\Store\GetStore;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetStore();
$response = $client->execute($request);
```

### GetStoreCategories <DocsBadge path="sell/stores/resources/store/methods/getStoreCategories" />

<ResourcePath method="GET">/store/categories</ResourcePath>

This method is used to retrieve the category hierarchy for an eBay user's store.

```php
use Rat\eBaySDK\API\StoresAPI\Store\GetStoreCategories;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetStoreCategories();
$response = $client->execute($request);
```

### GetStoreTask <DocsBadge path="sell/stores/resources/store/methods/getStoreTask" />

<ResourcePath method="GET">/store/task/{taskId}</ResourcePath>

This method retrieves the current status of a recent store operation. The unique identifier of the 
task is passed in as a path parameter.

```php
use Rat\eBaySDK\API\StoresAPI\Store\GetStoreTask;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetStoreTask(
    taskId: (string) $taskId
);
$response = $client->execute($request);
```

### GetStoreTasks <DocsBadge path="sell/stores/resources/store/methods/getStoreTasks" />

<ResourcePath method="GET">/store/task</ResourcePath>

This method retrieves the status of all async store tasks for a store. Every task is set as FAILED 
or COMPLETED once it's execution time reaches 24 hours.

```php
use Rat\eBaySDK\API\StoresAPI\Store\GetStoreTasks;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetStoreTasks();
$response = $client->execute($request);
```

### MoveStoreCategory <DocsBadge path="sell/stores/resources/store/methods/moveStoreCategory" />

<ResourcePath method="POST">/store/categories/move_category</ResourcePath>

This method is used to move an existing user's eBay store custom category through an asynchronous 
request. A successful call returns the getStoreTask URI in the Location response header. The user 
calls getStoreTask to retrieve the status of the move category operation.

```php
use Rat\eBaySDK\API\StoresAPI\Store\MoveStoreCategory;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new MoveStoreCategory(
    payload: (array) $payload
);
$response = $client->execute($request);
```

### RenameStoreCategory <DocsBadge path="sell/stores/resources/store/methods/renameStoreCategory" />

<ResourcePath method="PUT">/store/categories/{categoryId}</ResourcePath>

This method is used to rename the single category of a user's eBay store through an asynchronous 
request. A successful call returns the getStoreTask URI in the Location response header. The user 
calls getStoreTask to retrieve the status of the rename category operation.

```php
use Rat\eBaySDK\API\StoresAPI\Store\RenameStoreCategory;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new RenameStoreCategory(
    categoryId: (string) $categoryId,
    payload: (array) $payload
);
$response = $client->execute($request);
```