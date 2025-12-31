---
outline: deep
---
# Account API <Badge type="warning" style="margin-left:0.75rem;">v1.9.3</Badge> <DocsBadge path="sell/account/overview.html" />

The Account API v1 is used by sellers to:

- Create and manage business policies used with their listings to set/control payment, shipping, and return policy settings/values
- Create and manage sales tax rates for different tax jurisdictions
- Retrieve various other seller account settings including eBay managed payments eligibility, selling limits, shipping rate tables, and other selling features

## AdvertisingEligibility

### GetAdvertisingEligibility <DocsBadge path="sell/account/resources/advertising_eligibility/methods/getAdvertisingEligibility" />

<ResourcePath method="GET">/advertising_eligibility</ResourcePath>

This method allows developers to check the seller eligibility status for eBay advertising programs.

```php
use Rat\eBaySDK\API\AccountAPI\AdvertisingEligibility\GetAdvertisingEligibility;
use Rat\eBaySDK\Client;
use Rat\eBaySDK\Enums\MarketplaceId;

$client = app(Client::class);
$request = new GetAdvertisingEligibility(
    marketplaceId: MarketplaceId::EBAY_AT,
    programTypes: (string) $programTypes = null
);
$response = $client->execute($request);
```

## CustomPolicy

### CreateCustomPolicy <DocsBadge path="sell/account/resources/custom_policy/methods/createCustomPolicy" />

<ResourcePath method="POST">/custom_policy</ResourcePath>

This method creates a new custom policy that specifies the seller's terms for complying with local 
governmental regulations. Each Custom Policy targets a **policyType**. Multiple policies may be 
created as using the following custom policy types:

- `PRODUCT_COMPLIANCE`: Product Compliance policies disclose product information as required for regulatory compliance.

> [!NOTE] NOTE: A maximum of 60 Product Compliance policies per seller may be created.

- `TAKE_BACK`: Takeback policies describe the seller's legal obligation to take back a previously purchased item when the buyer purchases a new one.

> [!NOTE] NOTE: A maximum of 18 Takeback policies per seller may be created.

A successful create policy call returns an HTTP status code of 201 Created with the system-generated policy ID included in the Location response header.

```php
use Rat\eBaySDK\API\AccountAPI\CustomPolicy\CreateCustomPolicy;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateCustomPolicy(
    payload: (array) $payload
);
$response = $client->execute($request);

if ($response->ok()) {
    $policyUrl = $response->location();
}
```

### GetCustomPolicies <DocsBadge path="sell/account/resources/custom_policy/methods/getCustomPolicies" />

<ResourcePath method="GET">/custom_policy</ResourcePath>

This method retrieves the list of custom policies defined for a seller's account. To limit the 
returned custom policies, specify the **policy_types** query parameter.

```php
use Rat\eBaySDK\API\AccountAPI\CustomPolicy\GetCustomPolicies;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetCustomPolicies(
    policyTypes: (string) $policyTypes = null
);
$response = $client->execute($request);
```

### GetCustomPolicy <DocsBadge path="sell/account/resources/custom_policy/methods/getCustomPolicy" />

<ResourcePath method="GET">/custom_policy/{customPolicyId}</ResourcePath>

This method retrieves the custom policy specified by the **custom_policy_id** path parameter.

```php
use Rat\eBaySDK\API\AccountAPI\CustomPolicy\GetCustomPolicy;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetCustomPolicy(
    customPolicyId: (string) $customPolicyId
);
$response = $client->execute($request);
```

### UpdateCustomPolicy <DocsBadge path="sell/account/resources/custom_policy/methods/updateCustomPolicy" />

<ResourcePath method="PUT">/custom_policy/{customPolicyId}</ResourcePath>

This method updates an existing custom policy specified by the **custom_policy_id** path parameter. 
Since this method overwrites the policy's `name`, `label`, and `description` fields, always include 
the complete and current text of all three policy fields in the request payload, even if they are 
not being updated.

For example, the value for the label field is to be updated, but the name and description values 
will remain unchanged. The existing name and description values, as they are defined in the current 
policy, must also be passed in.

A successful policy update call returns an HTTP status code of **204 No Content**.

```php
use Rat\eBaySDK\API\AccountAPI\CustomPolicy\UpdateCustomPolicy;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdateCustomPolicy(
    customPolicyId: (string) $customPolicyId, 
    payload: (array) $payload
);
$response = $client->execute($request);
```

## FulfillmentPolicy

### CreateFulfillmentPolicy <DocsBadge path="sell/account/resources/fulfillment_policy/methods/createFulfillmentPolicy" />

<ResourcePath method="POST">/fulfillment_policy</ResourcePath>

This method creates a new fulfillment policy for an eBay marketplace where the policy encapsulates 
seller's terms for fulfilling item purchases. Fulfillment policies include the shipment options that 
the seller offers to buyers.

A successful request returns the getFulfillmentPolicy URI to the new policy in the Location response 
header and the ID for the new policy is returned in the response payload.

> [!TIP] 
> For details on creating and using the business policies supported by the Account API, 
> [see eBay business policies](https://developer.ebay.com/api-docs/sell/static/seller-accounts/business-policies.html).

```php
use Rat\eBaySDK\API\AccountAPI\FulfillmentPolicy\CreateFulfillmentPolicy;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateFulfillmentPolicy(
    payload: (array) $payload
);
$response = $client->execute($request);
```

### DeleteFulfillmentPolicy <DocsBadge path="sell/account/resources/fulfillment_policy/methods/deleteFulfillmentPolicy" />

<ResourcePath method="DELETE">/fulfillment_policy/{fulfillmentPolicyId}</ResourcePath>

This method deletes a fulfillment policy. Supply the ID of the policy you want to delete in the 
**fulfillmentPolicyId** path parameter.

```php
use Rat\eBaySDK\API\AccountAPI\FulfillmentPolicy\DeleteFulfillmentPolicy;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new DeleteFulfillmentPolicy(
    fulfillmentPolicyId: (string) $fulfillmentPolicyId
);
$response = $client->execute($request);
```

### GetFulfillmentPolicies <DocsBadge path="sell/account/resources/fulfillment_policy/methods/getFulfillmentPolicies" />

<ResourcePath method="GET">/fulfillment_policy</ResourcePath>

This method retrieves all the fulfillment policies configured for the marketplace you specify using 
the `marketplace_id` query parameter.

```php
use Rat\eBaySDK\API\AccountAPI\FulfillmentPolicy\GetFulfillmentPolicies;
use Rat\eBaySDK\Enums\Marketplace;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetFulfillmentPolicies(
    marketplaceId: Marketplace::EBAY_US
);
$response = $client->execute($request);
```

### GetFulfillmentPolicy <DocsBadge path="sell/account/resources/fulfillment_policy/methods/getFulfillmentPolicy" />

<ResourcePath method="GET">/fulfillment_policy/{fulfillmentPolicyId}</ResourcePath>

This method retrieves the complete details of a fulfillment policy. Supply the ID of the policy you 
want to retrieve using the **fulfillmentPolicyId** path parameter.

```php
use Rat\eBaySDK\API\AccountAPI\FulfillmentPolicy\GetFulfillmentPolicy;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetFulfillmentPolicy(
    fulfillmentPolicyId: (string) $fulfillmentPolicyId
);
$response = $client->execute($request);
```

### GetFulfillmentPolicyByName <DocsBadge path="sell/account/resources/fulfillment_policy/methods/getFulfillmentPolicyByName" />

<ResourcePath method="GET">/fulfillment_policy/get_by_policy_name</ResourcePath>

This method retrieves the details for a specific fulfillment policy. In the request, supply both the 
policy `name` and its associated `marketplace_id` as query parameters.

```php
use Rat\eBaySDK\API\AccountAPI\FulfillmentPolicy\GetFulfillmentPolicyByName;
use Rat\eBaySDK\Enums\Marketplace;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetFulfillmentPolicyByName(
    marketplaceId: Marketplace::EBAY_US,
    name: (string) $name
);
$response = $client->execute($request);
```

### UpdateFulfillmentPolicy <DocsBadge path="sell/account/resources/fulfillment_policy/methods/updateFulfillmentPolicy" />

<ResourcePath method="PUT">/fulfillment_policy/{fulfillmentPolicyId}</ResourcePath>

This method updates an existing fulfillment policy. Specify the policy you want to update using the 
**fulfillment_policy_id** path parameter. Supply a complete policy payload with the updates you want 
to make; this call overwrites the existing policy with the new details specified in the payload.

```php
use Rat\eBaySDK\API\AccountAPI\FulfillmentPolicy\UpdateFulfillmentPolicy;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdateFulfillmentPolicy(
    fulfillmentPolicyId: (string) $fulfillmentPolicyId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

## KYC 

### GetKYC <DocsBadge path="sell/account/resources/kyc/methods/getKYC" />

<ResourcePath method="GET">/kyc</ResourcePath>

> [!NOTE]
> This method was originally created to see which onboarding requirements were still pending for 
> sellers being onboarded for eBay managed payments, but now that all seller accounts are onboarded 
> globally, this method should now just return an empty payload with a 204 No Content HTTP status 
> code.

```php
use Rat\eBaySDK\API\AccountAPI\KYC\GetKYC;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetKYC();
$response = $client->execute($request);
```

## PaymentPolicy

### CreatePaymentPolicy <DocsBadge path="sell/account/resources/payment_policy/methods/createPaymentPolicy" />

<ResourcePath method="POST">/payment_policy</ResourcePath>

This method creates a new payment policy where the policy encapsulates seller's terms for order 
payments.

A successful request returns the **getPaymentPolicy** URI to the new policy in the **Location** 
response header and the ID for the new policy is returned in the response payload.

> [!TIP]
> For details on creating and using the business policies supported by the Account API, see 
> [eBay business policies](https://developer.ebay.com/api-docs/sell/static/seller-accounts/business-policies.html).

```php
use Rat\eBaySDK\API\AccountAPI\PaymentPolicy\CreatePaymentPolicy;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreatePaymentPolicy(
    payload: (array) $payload
);
$response = $client->execute($request);
```

### DeletePaymentPolicy <DocsBadge path="sell/account/resources/payment_policy/methods/deletePaymentPolicy" />

<ResourcePath method="DELETE">/payment_policy/{paymentPolicyId}</ResourcePath>

This method deletes a payment policy. Supply the ID of the policy you want to delete in the 
**paymentPolicyId** path parameter.

```php
use Rat\eBaySDK\API\AccountAPI\PaymentPolicy\DeletePaymentPolicy;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new DeletePaymentPolicy(
    paymentPolicyId: (string) $paymentPolicyId
);
$response = $client->execute($request);
```

### GetPaymentPolicies <DocsBadge path="sell/account/resources/payment_policy/methods/getPaymentPolicies" />

<ResourcePath method="GET">/payment_policy</ResourcePath>

This method retrieves all the payment business policies configured for the marketplace you specify 
using the `marketplace_id` query parameter.

```php
use Rat\eBaySDK\API\AccountAPI\PaymentPolicy\GetPaymentPolicies;
use Rat\eBaySDK\Enums\Marketplace;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetPaymentPolicies(
    marketplaceId: Marketplace::EBAY_US
);
$response = $client->execute($request);
```

### GetPaymentPolicy <DocsBadge path="sell/account/resources/payment_policy/methods/getPaymentPolicy" />

<ResourcePath method="GET">/payment_policy/{paymentPolicyId}</ResourcePath>

This method retrieves the complete details of a payment policy. Supply the ID of the policy you want 
to retrieve using the **paymentPolicyId** path parameter.

```php
use Rat\eBaySDK\API\AccountAPI\PaymentPolicy\GetPaymentPolicy;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetPaymentPolicy(
    paymentPolicyId: (string) $paymentPolicyId
);
$response = $client->execute($request);
```

### GetPaymentPolicyByName <DocsBadge path="sell/account/resources/payment_policy/methods/getPaymentPolicyByName" />

<ResourcePath method="GET">/payment_policy/get_by_policy_name</ResourcePath>

This method retrieves the details of a specific payment policy. Supply both the policy `name` and 
its associated `marketplace_id` in the request query parameters.

```php
use Rat\eBaySDK\API\AccountAPI\PaymentPolicy\GetPaymentPolicyByName;
use Rat\eBaySDK\Enums\Marketplace;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetPaymentPolicyByName(
    marketplaceId: Marketplace::EBAY_US,
    name: (string) $name
);
$response = $client->execute($request);
```

### UpdatePaymentPolicy <DocsBadge path="sell/account/resources/payment_policy/methods/updatePaymentPolicy" />

<ResourcePath method="PUT">/payment_policy/{paymentPolicyId}</ResourcePath>

This method updates an existing payment policy. Specify the policy you want to update using the 
**payment_policy_id** path parameter. Supply a complete policy payload with the updates you want to 
make; this call overwrites the existing policy with the new details specified in the payload.

```php
use Rat\eBaySDK\API\AccountAPI\PaymentPolicy\UpdatePaymentPolicy;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdatePaymentPolicy(
    paymentPolicyId: (string) $paymentPolicyId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

## PaymentsProgram

### GetPaymentsProgram <DocsBadge path="sell/account/resources/payments_program/methods/getPaymentsProgram" />

<ResourcePath method="GET">/payments_program/{marketplaceId}/{paymentsProgramType}</ResourcePath>

> [!NOTE]
> This method is no longer applicable, as all seller accounts globally have been enabled for the new 
> eBay payment and checkout flow.

This method returns whether or not the user is opted-in to the specified payments program. Sellers 
opt-in to payments programs by marketplace and you use the **marketplace_id** path parameter to 
specify the marketplace of the status flag you want returned.

```php
use Rat\eBaySDK\API\AccountAPI\PaymentsProgram\GetPaymentsProgram;
use Rat\eBaySDK\Enums\Marketplace;
use Rat\eBaySDK\Enums\PaymentsProgramType;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetPaymentsProgram(
    marketplaceId: Marketplace::EBAY_US,
    paymentsProgramType: PaymentsProgramType::EBAY_PAYMENTS
);
$response = $client->execute($request);
```

### Onboarding

#### GetPaymentsProgram <DocsBadge path="sell/account/resources/payments_program/onboarding/methods/getPaymentsProgramOnboarding" />

<ResourcePath method="GET">/payments_program/{marketplaceId}/{paymentsProgramType}/onboarding</ResourcePath>

> [!NOTE]
> This method is no longer applicable, as all seller accounts globally have been enabled for the new 
> eBay payment and checkout flow.

This method retrieves a seller's onboarding status for a payments program for a specified 
marketplace. The overall onboarding status of the seller and the status of each onboarding step is 
returned.

```php
use Rat\eBaySDK\API\AccountAPI\PaymentsProgram\GetPaymentsProgram;
use Rat\eBaySDK\Enums\Marketplace;
use Rat\eBaySDK\Enums\PaymentsProgramType;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetPaymentsProgram(
    marketplaceId: Marketplace::EBAY_US,
    paymentsProgramType: PaymentsProgramType::EBAY_PAYMENTS
);
$response = $client->execute($request);
```

## Privilege 

### GetPrivileges <DocsBadge path="sell/account/resources/privilege/methods/getPrivileges" />

<ResourcePath method="GET">/privilege</ResourcePath>

This method retrieves the seller's current set of privileges, including whether or not the seller's 
eBay registration has been completed, as well as the details of their site-wide sellingLimit (the 
amount and quantity they can sell on a given day).

```php
use Rat\eBaySDK\API\AccountAPI\Privilege\GetPrivileges;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetPrivileges();
$response = $client->execute($request);
```

## Program 

### GetOptedInPrograms <DocsBadge path="sell/account/resources/program/methods/getOptedInPrograms" />

<ResourcePath method="GET">/program/get_opted_in_programs</ResourcePath>

This method gets a list of the seller programs that the seller has opted-in to.

```php
use Rat\eBaySDK\API\AccountAPI\Program\GetOptedInPrograms;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetOptedInPrograms();
$response = $client->execute($request);
```

### OptInToProgram <DocsBadge path="sell/account/resources/program/methods/optInToProgram" />

<ResourcePath method="POST">/program/opt_in</ResourcePath>

This method opts the seller in to an eBay seller program. Refer to the [Account API overview] (https://developer.ebay.com/api-docs/sell/account/overview.html#opt-in) 
for information about available eBay seller programs.

> [!NOTE]
> It can take up to 24-hours for eBay to process your request to opt-in to a Seller Program. Use 
> the getOptedInPrograms call to check the status of your request after the processing period has 
> passed.

```php
use Rat\eBaySDK\API\AccountAPI\Program\OptInToProgram;
use Rat\eBaySDK\Enums\ProgramType;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new OptInToProgram(
    programType: ProgramType::OUT_OF_STOCK_CONTROL
);
$response = $client->execute($request);
```

### OptOutOfProgram <DocsBadge path="sell/account/resources/program/methods/optOutOfProgram" />

<ResourcePath method="POST">/program/opt_out</ResourcePath>

This method opts the seller out of a seller program in which they are currently opted in to. A 
seller can retrieve a list of the seller programs they are opted-in to using the 
**getOptedInPrograms** method.

```php
use Rat\eBaySDK\API\AccountAPI\Program\OptOutOfProgram;
use Rat\eBaySDK\Enums\ProgramType;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new OptOutOfProgram(
    programType: ProgramType::OUT_OF_STOCK_CONTROL
);
$response = $client->execute($request);
```

## RateTable

### GetRateTables <DocsBadge path="sell/account/resources/rate_table/methods/getRateTables" />

<ResourcePath method="GET">/rate_table</ResourcePath>

This method retrieves a seller's shipping rate tables for the country specified in the country_code 
query parameter. If you call this method without specifying a country code, the call returns all of 
the seller's shipping rate tables.

The method's response includes a **rateTableId** for each table defined by the seller. This 
**rateTableId** value is used in add/revise item call or in create/update fulfillment business 
policy call to specify the shipping rate table to use for that policy's domestic or international 
shipping options.

This call currently supports getting rate tables related to the following marketplaces: 
United States, Canada, United Kingdom, Germany, Australia, France, Italy, and Spain.

> [!NOTE]
> Rate tables created with the Trading API might not have been assigned a rateTableId at the time of
> their creation. This method can assign and return rateTableId values for rate tables with missing
> IDs if you make a request using the country_code where the seller has defined rate tables.

Sellers can define up to 40 shipping rate tables for their account, which lets them set up different 
rate tables for each of the marketplaces they sell into. Go to Shipping rate tables in My eBay to 
create and update rate tables.

```php
use Rat\eBaySDK\API\AccountAPI\RateTable\GetRateTables;
use Rat\eBaySDK\Enums\CountryCode;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetRateTables(
    countryCode: CountryCode::AT ?? null
);
$response = $client->execute($request);
```

## ReturnPolicy

### CreateReturnPolicy <DocsBadge path="sell/account/resources/return_policy/methods/createReturnPolicy" />

<ResourcePath method="POST">/return_policy</ResourcePath>

This method creates a new return policy where the policy encapsulates seller's terms for returning 
items.

Each policy targets a specific marketplace, and you can create multiple policies for each 
marketplace. Return policies are not applicable to motor-vehicle listings.

A successful request returns the **getReturnPolicy** URI to the new policy in the Location response 
header and the ID for the new policy is returned in the response payload.

> [!TIP]
> For details on creating and using the business policies supported by the Account API, see 
> [eBay business policies](https://developer.ebay.com/api-docs/sell/static/seller-accounts/business-policies.html).

```php
use Rat\eBaySDK\API\AccountAPI\ReturnPolicy\CreateReturnPolicy;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateReturnPolicy(
    payload: (array) $payload
);
$response = $client->execute($request);
```

### DeleteReturnPolicy <DocsBadge path="sell/account/resources/return_policy/methods/deleteReturnPolicy" />

<ResourcePath method="DELETE">/return_policy/{returnPolicyId}</ResourcePath>

This method deletes a return policy. Supply the ID of the policy you want to delete in the 
**returnPolicyId** path parameter.

```php
use Rat\eBaySDK\API\AccountAPI\ReturnPolicy\DeleteReturnPolicy;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new DeleteReturnPolicy(
    returnPolicyId: (string) $returnPolicyId
);
$response = $client->execute($request);
```

### GetReturnPolicies <DocsBadge path="sell/account/resources/return_policy/methods/getReturnPolicies" />

<ResourcePath method="GET">/return_policy</ResourcePath>

This method retrieves all the return policies configured for the marketplace you specify using the 
`marketplace_id` query parameter.

```php
use Rat\eBaySDK\API\AccountAPI\ReturnPolicy\GetReturnPolicies;
use Rat\eBaySDK\Enums\Marketplace;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetReturnPolicies(
    marketplaceId: Marketplace::EBAY_US
);
$response = $client->execute($request);
```

### GetReturnPolicy <DocsBadge path="sell/account/resources/return_policy/methods/getReturnPolicy" />

<ResourcePath method="GET">/return_policy/{returnPolicyId}</ResourcePath>

This method retrieves the complete details of the return policy specified by the 
**returnPolicyId** path parameter.

```php
use Rat\eBaySDK\API\AccountAPI\ReturnPolicy\GetReturnPolicy;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetReturnPolicy(
    returnPolicyId: (string) $returnPolicyId
);
$response = $client->execute($request);
```

### GetReturnPolicyByName <DocsBadge path="sell/account/resources/return_policy/methods/getReturnPolicyByName" />

<ResourcePath method="GET">/return_policy/get_by_policy_name</ResourcePath>

This method retrieves the details of a specific return policy. Supply both the policy `name` and its 
associated `marketplace_id` in the request query parameters.

```php
use Rat\eBaySDK\API\AccountAPI\ReturnPolicy\GetReturnPolicyByName;
use Rat\eBaySDK\Enums\Marketplace;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetReturnPolicyByName(
    marketplaceId: Marketplace::EBAY_US,
    name: (string) $name
);
$response = $client->execute($request);
```

### UpdateReturnPolicy <DocsBadge path="sell/account/resources/return_policy/methods/updateReturnPolicy" />

<ResourcePath method="PUT">/return_policy/{returnPolicyId}</ResourcePath>

This method updates an existing return policy. Specify the policy you want to update using the 
**return_policy_id** path parameter. Supply a complete policy payload with the updates you want to 
make; this call overwrites the existing policy with the new details specified in the payload.

```php
use Rat\eBaySDK\API\AccountAPI\ReturnPolicy\UpdateReturnPolicy;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdateReturnPolicy(
    returnPolicyId: (string) $returnPolicyId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

## SalesTax

### BulkCreateOrReplaceSalesTax <DocsBadge path="sell/account/resources/sales_tax/methods/bulkCreateOrReplaceSalesTax" />

<ResourcePath method="POST">/bulk_create_or_replace_sales_tax</ResourcePath>

This method creates or updates multiple sales-tax table entries.

Sales-tax tables can be set up for countries that support different tax jurisdictions.

> [!NOTE]
> Sales-tax tables are only available for the US (EBAY_US) and Canada (EBAY_CA) marketplaces.

Each sales-tax table entry comprises the following parameters: `countryCode`, `jurisdictionId`, 
`salesTaxPercentage`, `shippingAndHandlingTaxed`

Valid jurisdiction IDs are retrieved using [getSalesTaxJurisdictions](https://developer.ebay.com/api-docs/sell/metadata/resources/country/methods/getSalesTaxJurisdictions) 
in the Metadata API. For details about using this call, refer to Establishing sales-tax tables.

```php
use Rat\eBaySDK\API\AccountAPI\SalesTax\BulkCreateOrReplaceSalesTax;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new BulkCreateOrReplaceSalesTax(
    payload: (array) $payload
);
$response = $client->execute($request);
```

### CreateOrReplaceSalesTax <DocsBadge path="sell/account/resources/sales_tax/methods/createOrReplaceSalesTax" />

<ResourcePath method="POST">/sales_tax/{countryCode}/{jurisdictionId}</ResourcePath>

This method creates or updates a sales-tax table entry for a jurisdiction. Specify the tax table 
entry you want to configure using the two path parameters: **countryCode** and **jurisdictionId**.

A tax table entry for a jurisdiction is comprised of two fields: one for the jurisdiction's 
sales-tax rate and another that's a boolean value indicating whether or not shipping and handling 
are taxed in the jurisdiction.

You can set up sales-tax tables for countries that support different tax jurisdictions.

> [!NOTE]
> Sales-tax tables are only available for the US (EBAY_US) and Canada (EBAY_CA) marketplaces.

Valid jurisdiction IDs are retrieved using [getSalesTaxJurisdictions](https://developer.ebay.com/api-docs/sell/metadata/resources/country/methods/getSalesTaxJurisdictions) 
in the Metadata API. For details about using this call, refer to Establishing sales-tax tables.

```php
use Rat\eBaySDK\API\AccountAPI\SalesTax\CreateOrReplaceSalesTax;
use Rat\eBaySDK\Enums\CountryCode;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateOrReplaceSalesTax(
    countryCode: CountryCode::AT,
    jurisdictionId: (string) $jurisdictionId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### DeleteSalesTax <DocsBadge path="sell/account/resources/sales_tax/methods/deleteSalesTax" />

<ResourcePath method="DELETE">/sales_tax/{countryCode}/{jurisdictionId}</ResourcePath>

This call deletes a sales-tax table entry for a jurisdiction. Specify the jurisdiction to delete 
using the **countryCode** and **jurisdictionId** path parameters.

> [!NOTE]
> Sales-tax tables are only available for the US (EBAY_US) and Canada (EBAY_CA) marketplaces.

```php
use Rat\eBaySDK\API\AccountAPI\SalesTax\DeleteSalesTax;
use Rat\eBaySDK\Enums\CountryCode;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new DeleteSalesTax(
    countryCode: CountryCode::AT,
    jurisdictionId: (string) $jurisdictionId,
);
$response = $client->execute($request);
```

### GetSalesTax <DocsBadge path="sell/account/resources/sales_tax/methods/getSalesTax" />

<ResourcePath method="GET">/sales_tax/{countryCode}/{jurisdictionId}</ResourcePath>

This call retrieves the current sales-tax table entry for a specific tax jurisdiction. Specify the 
jurisdiction to retrieve using the **countryCode** and **jurisdictionId** path parameters. All four 
response fields will be returned if a sales-tax entry exists for the tax jurisdiction. Otherwise, 
the response will be returned as empty.

> [!NOTE]
> Sales-tax tables are only available for the US (EBAY_US) and Canada (EBAY_CA) marketplaces.

```php
use Rat\eBaySDK\API\AccountAPI\SalesTax\GetSalesTax;
use Rat\eBaySDK\Enums\CountryCode;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetSalesTax(
    countryCode: CountryCode::AT,
    jurisdictionId: (string) $jurisdictionId,
);
$response = $client->execute($request);
```

### GetSalesTaxes <DocsBadge path="sell/account/resources/sales_tax/methods/getSalesTaxes" />

<ResourcePath method="GET">/sales_tax</ResourcePath>

Use this call to retrieve all sales tax table entries that the seller has defined for a specific 
country. All four response fields will be returned for each tax jurisdiction that matches the search 
criteria. If no sales tax rates are defined for the specified, a 204 No Content status code is 
returned with no response payload.

> [!NOTE]
> Sales-tax tables are only available for the US (EBAY_US) and Canada (EBAY_CA) marketplaces.

```php
use Rat\eBaySDK\API\AccountAPI\SalesTax\GetSalesTaxes;
use Rat\eBaySDK\Enums\CountryCode;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetSalesTaxes(
    countryCode: CountryCode::AT,
);
$response = $client->execute($request);
```

## Subscription 

### GetSubscription <DocsBadge path="sell/account/resources/subscription/methods/getSubscription" />

<ResourcePath method="GET">/subscription</ResourcePath>

This method retrieves a list of subscriptions associated with the seller account.

```php
use Rat\eBaySDK\API\AccountAPI\Subscription\GetSubscription;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetSubscription(
    limit: (int) $limit ?? null,
    continuationToken: (string) $continuationToken ?? null
);
$response = $client->execute($request);
```