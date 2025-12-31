---
outline: deep
---

# Finances API <Badge type="warning" style="margin-left:0.75rem;">v1.17.3</Badge> <DocsBadge path="sell/finances/static/overview.html" />

> [!CAUTION]
> Due to EU & UK Payments regulatory requirements, an additional security verification via Digital 
> Signatures is required for certain API calls that are made on behalf of EU/UK sellers, including 
> all Finances API methods. Please refer to Digital Signatures for APIs to learn more on the 
> impacted APIs and the process to create signatures to be included in the HTTP payload.

> [!NOTE]
> The Finances API does not support Team Access. Financial information, such as payouts or 
> transactions, is only returned for the user that makes the call. You cannot use any of the methods 
> in this API to return financial information for another user.

The Finances API is used by sellers to review/track financial information for their eBay account, 
such payouts to their bank account, loans/repayments, shipping costs, etc.

The information returned is similar to that available under the Payments tab of the Seller Hub in 
My eBay.

## Payout

### GetPayout <DocsBadge path="sell/finances/resources/payout/methods/getPayout" />

<ResourcePath method="GET">/payout/{payoutId}</ResourcePath>

This method retrieves details on a specific seller payout. The unique identifier of the payout is 
passed in as a path parameter at the end of the call URI.

The getPayouts method can be used to retrieve the unique identifier of a payout, or the user can 
check Seller Hub.

For split-payout cases, which are only available to sellers in mainland China, this method will 
return the payoutPercentage for the specified payout. This value indicates the current payout 
percentage allocated to a payment instrument. This method will also return the convertedToCurrency 
and convertedToValue response fields in CNY value.

```php
use Rat\eBaySDK\API\FinancesAPI\Payout\GetPayout;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetPayout(
    marketplaceId: (string) $marketplaceId,
    payoutId: (string) $payoutId,
);
$response = $client->execute($request);
```

### GetPayouts <DocsBadge path="sell/finances/resources/payout/methods/GetPayouts" />

<ResourcePath method="GET">/payout</ResourcePath>

This method is used to retrieve the details of one or more seller payouts. By using the filter query 
parameter, users can retrieve payouts processed within a specific date range, and/or they can 
retrieve payouts in a specific state.

There are also pagination and sort query parameters that allow users to control the payouts that are 
returned in the response.

If no payouts match the input criteria, an empty payload is returned.

For split-payout cases, which are only available to sellers in mainland China, this method will 
return the payoutPercentage for the specified payout. This value indicates the current payout 
percentage allocated to a payout instrument. This method will also return the convertedToCurrency 
and convertedTo response fields set to CNY value and the payoutReference, the unique identifier 
reference (not true payout).

By using the filter query parameter, users can retrieve the two true(actual) payouts associated with 
a payoutReference.

```php
use Rat\eBaySDK\API\FinancesAPI\Payout\GetPayouts;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetPayouts(
    marketplaceId: (string) $marketplaceId,
    payoutId: (string) $payoutId,
    limit: (int) $limit = 20,
    offset: (int) $offset = 0,
    filter: (string) $filter = null,
    sort: (string) $sort = null,
);
$response = $client->execute($request);
```

### GetPaymentSummary <DocsBadge path="sell/finances/resources/payout/methods/getPayoutSummary" />

<ResourcePath method="GET">/payout_summary</ResourcePath>

This method is used to retrieve cumulative values for payouts in a particular state, or all states. 
The metadata in the response includes total payouts, the total number of monetary transactions 
(sales, refunds, credits) associated with those payouts, and the total dollar value of all payouts.

If the filter query parameter is used to filter by payout status, only one payout status value may 
be used. If the filter query parameter is not used to filter by a specific payout status, cumulative 
values for payouts in all states are returned.

The user can also use the filter query parameter to specify a date range, and then only payouts that 
were processed within that date range are considered.

```php
use Rat\eBaySDK\API\FinancesAPI\Payout\GetPaymentSummary;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetPaymentSummary(
    marketplaceId: (string) $marketplaceId,
    filter: (string) $filter = null
);
$response = $client->execute($request);
```

## SellerFundsSummary

### GetSellerFundsSummary <DocsBadge path="sell/finances/resources/seller_funds_summary/methods/getSellerFundsSummary" />

<ResourcePath method="GET">/seller_funds_summary</ResourcePath>

This method retrieves all pending funds that have not yet been distibuted through a seller payout.

There are no input parameters for this method. The response payload includes available funds, funds 
being processed, funds on hold, and also an aggregate count of all three of these categories.

If there are no funds that are pending, on hold, or being processed for the seller's account, no 
response payload is returned, and an http status code of 204 - No Content is returned instead.

```php
use Rat\eBaySDK\API\FinancesAPI\SellerFundsSummary\GetSellerFundsSummary;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetSellerFundsSummary(
    marketplaceId: (string) $marketplaceId,
);
$response = $client->execute($request);
```

## Transaction

### GetTransactions <DocsBadge path="sell/finances/resources/transaction/methods/getTransactions" />

<ResourcePath method="GET">/transaction</ResourcePath>

The getTransactions method allows a seller to retrieve information about one or more of their 
monetary transactions.

```php
use Rat\eBaySDK\API\FinancesAPI\Transaction\GetTransactions;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetTransactions(
    marketplaceId: (string) $marketplaceId,
    limit: (int) $limit = 20,
    offset: (int) $offset = 0,
    filter: (string) $filter = null,
    sort: (string) $sort = null,
);
$response = $client->execute($request);
```

### GetTransactionSummary <DocsBadge path="sell/finances/resources/transaction/methods/getTransactionSummary" />

<ResourcePath method="GET">/transaction_summary</ResourcePath>

The getTransactionSummary method retrieves cumulative information for monetary transactions. If 
applicable, the number of payments with a transactionStatus equal to FUNDS_ON_HOLD and the total 
monetary amount of these on-hold payments are also returned.

```php
use Rat\eBaySDK\API\FinancesAPI\Transaction\GetTransactionSummary;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetTransactionSummary(
    marketplaceId: (string) $marketplaceId,
    filter: (string) $filter = null,
);
$response = $client->execute($request);
```

## Transfer 

### GetTransfer <DocsBadge path="sell/finances/resources/transfer/methods/getTransfer" />

<ResourcePath method="GET">/transfer/{transferId}</ResourcePath>

This method retrieves detailed information regarding a TRANSFER transaction type. A TRANSFER is a 
monetary transaction type that involves a seller transferring money to eBay for reimbursement of 
one or more charges. For example, when a seller reimburses eBay for a buyer refund.

If an ID is passed into the URI that is an identifier for another transaction type, this call will 
return an http status code of 404 Not found.

```php
use Rat\eBaySDK\API\FinancesAPI\Transfer\GetTransfer;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetTransfer(
    marketplaceId: (string) $marketplaceId,
    transferId: (string) $transferId,
);
$response = $client->execute($request);
```