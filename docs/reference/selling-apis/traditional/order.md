---
outline: deep
---
# Traditional / Order Management <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/OrderManagementIndex.html" />

This Call Reference describes the elements and attributes for each Order Management call below.

## AddOrder <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/AddOrder.html" />

Combines two or more order line items into a single order, enabling a buyer to pay for all of those 
order line items with a single payment.

```php
use Rat\eBaySDK\API\TraditionalAPI\Order\AddOrder;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new AddOrder(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## CompleteSale <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/CompleteSale.html" />

Enables a seller to do various tasks after the creation of an order.

```php
use Rat\eBaySDK\API\TraditionalAPI\Order\CompleteSale;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CompleteSale(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetItemTransactions <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetItemTransactions.html" />

Retrieves order line item information for a specified ItemID.

```php
use Rat\eBaySDK\API\TraditionalAPI\Order\GetItemTransactions;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetItemTransactions(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetOrders <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetOrders.html" />

Retrieves the orders for which the authenticated user is a participant, either as the buyer or the seller.

```php
use Rat\eBaySDK\API\TraditionalAPI\Order\GetOrders;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetOrders(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## GetSellerTransactions <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/GetSellerTransactions.html" />

Retrieves order line item information for the user for which the call is made, and not for any other user.

```php
use Rat\eBaySDK\API\TraditionalAPI\Order\GetSellerTransactions;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetSellerTransactions(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```

## SendInvoice <DocsBadge path="https://developer.ebay.com/devzone/xml/docs/Reference/eBay/SendInvoice.html" />

Enables a seller to send an order invoice to a buyer.

```php
use Rat\eBaySDK\API\TraditionalAPI\Order\SendInvoice;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new SendInvoice(
    payload: (mixed) $payload = null
);
$response = $client->execute($request);
```