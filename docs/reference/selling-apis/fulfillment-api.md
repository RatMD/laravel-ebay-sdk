---
outline: deep
---
# Fulfillment API <Badge type="warning" style="margin-left:0.75rem;">v1.20.7</Badge> <DocsBadge path="sell/fulfillment/static/overview.html" />

The outcome of a buyer's eBay checkout process is an order. This API enables sellers to manage the 
completion of an order in accordance with the payment method and timing specified at checkout. The 
line items in the order are grouped into one or more packages. As the seller addresses, handles, and 
ships each package, the set of specifications for this process is known as a fulfillment. Use the 
Fulfillment API to facilitate and monitor these activities from the order to completion. Sellers' 
status on eBay depend partly on their record of timely fulfillment.

> [!NOTE]
> The Fulfillment API covers only the transactions that have completed the checkout process. 
> This API does not cover pending payment purchases that require upfront payment before shipment.

In addition to the 'get orders' and 'shipping fulfillment' methods, the Fulfillment API also has a 
seller-initiated issueRefund method and a full suite of payment dispute methods.

The issueRefund method allows a seller to issue a full or partial refund to a buyer for an order. 
Full or partial refunds can be issued at the order level or line item level.

The payment dispute methods allow the seller to retrieve and manage buyer-initiated payment 
disputes. These particular payment disputes are disputes that buyers open up with their payment 
provider, such as PayPal or Visa, and then the seller is alerted once the payment disputes come into 
eBay's system

## Order

### GetOrder <DocsBadge path="sell/fulfillment/resources/order/methods/getOrder" />

<ResourcePath method="GET">/order/{orderId}</ResourcePath>

Use this call to retrieve the contents of an order based on its unique identifier, orderId. This 
value was returned in the getOrders call's orders.orderId field when you searched for orders by 
creation date, modification date, or fulfillment status. Include the optional fieldGroups query 
parameter set to TAX_BREAKDOWN to return a breakdown of the taxes and fees.

The returned Order object contains information you can use to create and process fulfillments, 
including:

- Information about the buyer and seller
- Information about the order's line items
- The plans for packaging, addressing and shipping the order
- The status of payment, packaging, addressing, and shipping the order
- A summary of monetary amounts specific to the order such as pricing, payments, and shipping costs
- A summary of applied taxes and fees, and optionally a breakdown of each

```php
use Rat\eBaySDK\API\FulfillmentAPI\Order\GetOrder;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetOrder(
    orderId: (string) $orderId,
    fieldGroups: (string) $fieldGroups = null,
);
$response = $client->execute($request);
```

### GetOrders <DocsBadge path="sell/fulfillment/resources/order/methods/getOrders" />

<ResourcePath method="GET">/order</ResourcePath>

Use this method to search for and retrieve one or more orders based on their creation date, last 
modification date, or fulfillment status using the filter parameter. You can alternatively specify a 
list of orders using the orderIds parameter. Include the optional fieldGroups query parameter set to 
TAX_BREAKDOWN to return a breakdown of the taxes and fees. By default, when no filters are used this 
call returns all orders created within the last 90 days.

The returned Order objects contain information you can use to create and process fulfillments, 
including:

- Information about the buyer and seller
- Information about the order's line items
- The plans for packaging, addressing and shipping the order
- The status of payment, packaging, addressing, and shipping the order
- A summary of monetary amounts specific to the order such as pricing, payments, and shipping costs
- A summary of applied taxes and fees, and optionally a breakdown of each

> [!NOTE]
> In this call, the cancelStatus.cancelRequests array is returned but is always empty. Use the 
> getOrder call instead, which returns this array fully populated with information about any 
> cancellation requests.

```php
use Rat\eBaySDK\API\FulfillmentAPI\Order\GetOrders;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetOrders(
    orderIds: (string) $orderIds = null,
    fieldGroups: (string) $fieldGroups = null,
    filter: (string) $filter = null,
    limit: (int) $limit = 50,
    offset: (int) $offset = 0,
);
$response = $client->execute($request);
```

### IssueRefund <DocsBadge path="sell/fulfillment/resources/order/methods/issueRefund" />

<ResourcePath method="POST">/order/{orderId}/issue_refund</ResourcePath>

> [!CAUTION] 
> Due to EU & UK Payments regulatory requirements, an additional security verification via Digital 
> Signatures is required for certain API calls that are made on behalf of EU/UK sellers, including 
> issueRefund. Please refer to Digital Signatures for APIs to learn more on the impacted APIs and 
> the process to create signatures to be included in the HTTP payload.

This method allows a seller to issue a full or partial refund to a buyer for an order. Full or 
partial refunds can be issued at the order level or line item level.

The refunds issued through this method are processed asynchronously, so the refund will not show as 
'Refunded' right away. A seller will have to make a subsequent getOrder call to check the status of 
the refund. The status of an order refund can be found in the paymentSummary.refunds.refundStatus 
field of the getOrder response.

```php
use Rat\eBaySDK\API\FulfillmentAPI\Order\IssueRefund;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new IssueRefund(
    orderId: (string) $orderId,
    payload: (array) $payload,
);
$response = $client->execute($request);
```

### ShippingFulfillment

#### CreateShippingFulfillment <DocsBadge path="sell/fulfillment/resources/order/shipping_fulfillment/methods/createShippingFulfillment" />

<ResourcePath method="POST">/order/{orderId}/shipping_fulfillment</ResourcePath>

When you group an order's line items into one or more packages, each package requires a 
corresponding plan for handling, addressing, and shipping; this is a shipping fulfillment. For each 
package, execute this call once to generate a shipping fulfillment associated with that package.

> [!NOTE]
> A single line item in an order can consist of multiple units of a purchased item, and one unit can 
> consist of multiple parts or components. Although these components might be provided by the 
> manufacturer in separate packaging, the seller must include all components of a given line item in 
> the same package.

Before using this call for a given package, you must determine which line items are in the package. 
If the package has been shipped, you should provide the date of shipment in the request. If not 
provided, it will default to the current date and time.

This method can also be used to provide proof of delivery for contested payment disputes. To do so, 
use this method to create a shipping fulfillment and provide shipment tracking information for all 
line items involved in the dispute. eBay will then pick up this information for the dispute directly.

```php
use Rat\eBaySDK\API\FulfillmentAPI\Order\ShippingFulfillment\CreateShippingFulfillment;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateShippingFulfillment(
    orderId: (string) $orderId,
    payload: (array) $payload,
);
$response = $client->execute($request);
```

#### GetShippingFulfillment <DocsBadge path="sell/fulfillment/resources/order/shipping_fulfillment/methods/getShippingFulfillment" />

<ResourcePath method="GET">/order/{orderId}/shipping_fulfillment/{fulfillmentId}</ResourcePath>

Use this call to retrieve the contents of a fulfillment based on its unique identifier, 
fulfillmentId (combined with the associated order's orderId). The fulfillmentId value was originally 
generated by the createShippingFulfillment call, and is returned by the getShippingFulfillments call 
in the members.fulfillmentId field.

```php
use Rat\eBaySDK\API\FulfillmentAPI\Order\ShippingFulfillment\GetShippingFulfillment;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetShippingFulfillment(
    orderId: (string) $orderId,
    fulfillmentId: (string) $fulfillmentId,
);
$response = $client->execute($request);
```

#### GetShippingFulfillments <DocsBadge path="sell/fulfillment/resources/order/shipping_fulfillment/methods/getShippingFulfillments" />

<ResourcePath method="GET">/order/{orderId}/shipping_fulfillment</ResourcePath>

Use this call to retrieve the contents of all fulfillments currently defined for a specified order 
based on the order's unique identifier, orderId. This value is returned in the getOrders call's 
members.orderId field when you search for orders by creation date or shipment status.

```php
use Rat\eBaySDK\API\FulfillmentAPI\Order\ShippingFulfillment\GetShippingFulfillments;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetShippingFulfillments(
    orderId: (string) $orderId,
);
$response = $client->execute($request);
```

## PaymentDispute

### AcceptPaymentDispute <DocsBadge path="sell/fulfillment/resources/payment_dispute/methods/acceptPaymentDispute" />

<ResourcePath method="POST">/payment_dispute/{paymentDisputeId}</ResourcePath>

This method is used if the seller wishes to accept a payment dispute. The unique identifier of the 
payment dispute is passed in as a path parameter, and unique identifiers for payment disputes can be 
retrieved with the getPaymentDisputeSummaries method.

The revision field in the request payload is required, and the returnAddress field should be 
supplied if the seller is expecting the buyer to return the item. See the Request Payload section 
for more information on these fields.

```php
use Rat\eBaySDK\API\FulfillmentAPI\PaymentDispute\AcceptPaymentDispute;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new AcceptPaymentDispute(
    paymentDisputeId: (string) $paymentDisputeId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### AddEvidence <DocsBadge path="sell/fulfillment/resources/payment_dispute/methods/addEvidence" />

<ResourcePath method="POST">/payment_dispute/{paymentDisputeId}/add_evidence</ResourcePath>

This method is used by the seller to add one or more evidence files to address a payment dispute 
initiated by the buyer. The unique identifier of the payment dispute is passed in as a path 
parameter, and unique identifiers for payment disputes can be retrieved with the 
getPaymentDisputeSummaries method.

> [!NOTE]
> All evidence files should be uploaded using addEvidence and updateEvidence before the seller 
> decides to contest the payment dispute. Once the seller has officially contested the dispute 
> (using contestPaymentDispute or through My eBay), the addEvidence and updateEvidence methods can 
> no longer be used. In the evidenceRequests array of the getPaymentDispute response, eBay prompts 
> the seller with the type of evidence file(s) that will be needed to contest the payment dispute.

The file(s) to add are identified through the files array in the request payload. Adding one or more 
new evidence files for a payment dispute triggers the creation of an evidence file, and the unique 
identifier for the new evidence file is automatically generated and returned in the evidenceId field 
of the addEvidence response payload upon a successful call.

The type of evidence being added should be specified in the evidenceType field. All files being 
added (if more than one) should correspond to this evidence type.

Upon a successful call, an evidenceId value is returned in the response. This indicates that a new 
evidence set has been created for the payment dispute, and this evidence set includes the evidence 
file(s) that were passed in to the fileId array. The evidenceId value will be needed if the seller 
wishes to add to the evidence set by using the updateEvidence method, or if they want to retrieve a 
specific evidence file within the evidence set by using the fetchEvidenceContent method.

```php
use Rat\eBaySDK\API\FulfillmentAPI\PaymentDispute\AddEvidence;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new AddEvidence(
    paymentDisputeId: (string) $paymentDisputeId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### ContestPaymentDispute <DocsBadge path="sell/fulfillment/resources/payment_dispute/methods/contestPaymentDispute" />

<ResourcePath method="POST">/payment_dispute/{paymentDisputeId}/contest</ResourcePath>

This method is used if the seller wishes to contest a payment dispute initiated by the buyer. The 
unique identifier of the payment dispute is passed in as a path parameter, and unique identifiers 
for payment disputes can be retrieved with the getPaymentDisputeSummaries method.

> [!NOTE]
> Before contesting a payment dispute, the seller must upload all supporting files using the 
> addEvidence and updateEvidence methods. Once the seller has officially contested the dispute 
> (using contestPaymentDispute), the addEvidence and updateEvidence methods can no longer be used. 
> In the evidenceRequests array of the getPaymentDispute response, eBay prompts the seller with the 
> type of supporting file(s) that will be needed to contest the payment dispute.

If a seller decides to contest a payment dispute, that seller should be prepared to provide 
supporting documents such as proof of delivery, proof of authentication, or other documents. The 
type of supporting documents that the seller will provide will depend on why the buyer filed the 
payment dispute.

The revision field in the request payload is required, and the returnAddress field should be 
supplied if the seller is expecting the buyer to return the item. See the Request Payload section 
for more information on these fields.

```php
use Rat\eBaySDK\API\FulfillmentAPI\PaymentDispute\ContestPaymentDispute;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new ContestPaymentDispute(
    paymentDisputeId: (string) $paymentDisputeId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### FetchEvidenceContent <DocsBadge path="sell/fulfillment/resources/payment_dispute/methods/fetchEvidenceContent" />

<ResourcePath method="GET">/payment_dispute/{paymentDisputeId}/fetch_evidence_content</ResourcePath>

This call retrieves a specific evidence file for a payment dispute. The following three identifying 
parameters are needed in the call URI:

- **payment_dispute_id**: the identifier of the payment dispute. The identifier of each payment 
dispute is returned in the getPaymentDisputeSummaries response.
- **evidence_id**: the identifier of the evidential file set. The identifier of an evidential file 
set for a payment dispute is returned under the evidence array in the getPaymentDispute response.
- **file_id**: the identifier of an evidential file. This file must belong to the evidential file 
set identified through the evidence_id query parameter. The identifier of each evidential file is 
returned under the evidence.files array in the getPaymentDispute response.

An actual binary file is returned if the call is successful. An error will occur if any of three 
identifiers are invalid.

```php
use Rat\eBaySDK\API\FulfillmentAPI\PaymentDispute\FetchEvidenceContent;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new FetchEvidenceContent(
    paymentDisputeId: (string) $paymentDisputeId,
    evidenceId: (string) $evidenceId
    fileId: (string) $fileId
);
$response = $client->execute($request);
```

### GetActivities <DocsBadge path="sell/fulfillment/resources/payment_dispute/methods/getActivities" />

<ResourcePath method="GET">/payment_dispute/{paymentDisputeId}/activity</ResourcePath>

This method retrieve a log of activity for a payment dispute. The identifier of the payment dispute 
is passed in as a path parameter. The output includes a timestamp for each action of the payment 
dispute, from creation to resolution, and all steps in between.

```php
use Rat\eBaySDK\API\FulfillmentAPI\PaymentDispute\GetActivities;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetActivities(
    paymentDisputeId: (string) $paymentDisputeId,
);
$response = $client->execute($request);
```

### GetPaymentDispute <DocsBadge path="sell/fulfillment/resources/payment_dispute/methods/getPaymentDispute" />

<ResourcePath method="GET">/payment_dispute/{paymentDisputeId}</ResourcePath>

This method retrieves detailed information on a specific payment dispute. The payment dispute 
identifier is passed in as path parameter at the end of the call URI.

Below is a summary of the information that is retrieved:
- Current status of payment dispute
- Amount of the payment dispute
- Reason the payment dispute was opened
- Order and line items associated with the payment dispute
- Seller response options if an action is currently required on the payment dispute
- Details on the results of the payment dispute if it has been closed
- Details on any evidence that was provided by the seller to fight the payment dispute

```php
use Rat\eBaySDK\API\FulfillmentAPI\PaymentDispute\GetPaymentDispute;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetPaymentDispute(
    paymentDisputeId: (string) $paymentDisputeId,
);
$response = $client->execute($request);
```

### GetPaymentDisputeSummaries <DocsBadge path="sell/fulfillment/resources/payment_dispute/methods/getPaymentDisputeSummaries" />

<ResourcePath method="GET">/payment_dispute_summary</ResourcePath>

This method is used retrieve one or more payment disputes filed against the seller. These payment 
disputes can be open or recently closed. The following filter types are available in the request 
payload to control the payment disputes that are returned:

- Dispute filed against a specific order (order_id parameter is used)
- Dispute(s) filed by a specific buyer (buyer_username parameter is used)
- Dispute(s) filed within a specific date range (open_date_from and/or open_date_to parameters are used)
- Disputes in a specific state (payment_dispute_status parameter is used)

More than one of these filter types can be used together. See the request payload request fields for 
more information about how each filter is used.

If none of the filters are used, all open and recently closed payment disputes are returned.

Pagination is also available. See the limit and offset fields for more information on how pagination 
is used for this method.

```php
use Rat\eBaySDK\API\FulfillmentAPI\PaymentDispute\GetPaymentDisputeSummaries;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetPaymentDisputeSummaries(
    orderId: (string) $orderId = null,
    buyerUsername: (string) $buyerUsername = null,
    openDateFrom: (string) $openDateFrom = null,
    openDateTo: (string) $openDateTo = null,
    paymentDisputeStatus: (string) $paymentDisputeStatus = null,
    limit: (int) $limit = 50,
    offset: (int) $offset = 0,
);
$response = $client->execute($request);
```

### UpdateEvidence <DocsBadge path="sell/fulfillment/resources/payment_dispute/methods/updateEvidence" />

<ResourcePath method="POST">/payment_dispute/{paymentDisputeId}/update_evidence</ResourcePath>

This method is used by the seller to update an existing evidence set for a payment dispute with one 
or more evidence files. The unique identifier of the payment dispute is passed in as a path 
parameter, and unique identifiers for payment disputes can be retrieved with the 
getPaymentDisputeSummaries method.

> [!NOTE]
> All evidence files should be uploaded using addEvidence and updateEvidence before the seller 
> decides to contest the payment dispute. Once the seller has officially contested the dispute 
> (using contestPaymentDispute or through My eBay), the addEvidence and updateEvidence methods can 
> no longer be used. In the evidenceRequests array of the getPaymentDispute response, eBay prompts 
> the seller with the type of evidence file(s) that will be needed to contest the payment dispute.

The unique identifier of the evidence set to update is specified through the evidenceId field, and 
the file(s) to add are identified through the files array in the request payload. The unique 
identifier for an evidence file is automatically generated and returned in the fileId field of the 
uploadEvidence response payload upon a successful call. Sellers must make sure to capture the fileId 
value for each evidence file that is uploaded with the uploadEvidence method.

The type of evidence being added should be specified in the evidenceType field. All files being 
added (if more than one) should correspond to this evidence type.

Upon a successful call, an http status code of 204 Success is returned. There is no response payload 
unless an error occurs. To verify that a new file is a part of the evidence set, the seller can use 
the fetchEvidenceContent method, passing in the proper evidenceId and fileId values.

```php
use Rat\eBaySDK\API\FulfillmentAPI\PaymentDispute\UpdateEvidence;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdateEvidence(
    paymentDisputeId: (string) $paymentDisputeId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### UploadEvidenceFile <DocsBadge path="sell/fulfillment/resources/payment_dispute/methods/uploadEvidenceFile" />

<ResourcePath method="POST">/payment_dispute/{paymentDisputeId}/upload_evidence_file</ResourcePath>

This method is used to upload an evidence file for a contested payment dispute. The unique 
identifier of the payment dispute is passed in as a path parameter, and unique identifiers for 
payment disputes can be retrieved with the getPaymentDisputeSummaries method.

The three image formats supported at this time are .JPEG, .JPG, and .PNG.

After the file is successfully uploaded, the seller will need to grab the fileId value in the 
response payload to add this file to a new evidence set using the addEvidence method, or to add this 
file to an existing evidence set using the updateEvidence method.

> [!CAUTION]
> This method only supports file upload. If PROOF_OF_DELIVERY is requested when contesting a payment 
> dispute, do not upload shipment tracking information for proof of order delivery using this method. 
> Instead, use the createShippingFulfillment to provide tracking information evidence for a dispute.

```php
use Rat\eBaySDK\API\FulfillmentAPI\PaymentDispute\UploadEvidenceFile;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UploadEvidenceFile(
    paymentDisputeId: (string) $paymentDisputeId,
    filePath: (string) $filePath,
    fileName: (string) $fileName = null
);
$response = $client->execute($request);
```