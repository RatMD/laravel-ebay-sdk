---
outline: deep
---
# Key Management API <Badge type="warning" style="margin-left:0.75rem;">v1.0.0</Badge> <DocsBadge path="developer/key-management/overview.html" />

Due to regulatory requirements applicable to our EU/UK sellers, for certain APIs, developers need to 
add digital signatures to the respective HTTP call.

The Key Management API creates keypairs that are required when creating digital signatures for the 
following APIs:

- All methods in the [Finances API](https://developer.ebay.com/api-docs/sell/finances/resources/methods)
- [issueRefund](https://developer.ebay.com/api-docs/sell/fulfillment/resources/order/methods/issueRefund) in the Fulfillment API
- [GetAccount](https://developer.ebay.com/Devzone/XML/docs/Reference/eBay/GetAccount.html) in the Trading API
- The following methods in the Post-Order API:
  - [Issue Inquiry Refund](https://developer.ebay.com/Devzone/post-order/post-order_v2_inquiry-inquiryid_issue_refund__post.html)
  - [Issue case refund](https://developer.ebay.com/Devzone/post-order/post-order_v2_casemanagement-caseid_issue_refund__post.html)
  - [Issue return refund](https://developer.ebay.com/Devzone/post-order/post-order_v2_return-returnid_issue_refund__post.html)
  - [Process Return Request](https://developer.ebay.com/Devzone/post-order/post-order_v2_return-returnid_decide__post.html)
  - [Approve Cancellation Request](https://developer.ebay.com/devzone/post-order/post-order_v2_cancellation-cancelid_approve__post.html)
  - [Create Cancellation Request](https://developer.ebay.com/devzone/post-order/post-order_v2_cancellation__post.html)

Any eBay API that accesses confidential financial information must include a digital signature for 
every HTTP call made on behalf of a customer that is domiciled in the EU/UK.

## SigningKey

### CreateSigningKey <DocsBadge path="developer/key-management/resources/signing_key/methods/createSigningKey" />

<ResourcePath method="POST">/signing_key</ResourcePath>

This method creates keypairs using one of the following ciphers:
- ED25519 (Edwards Curve)
- RSA

> [!NOTE] 
> The recommended signature cipher is ED25519 (Edwards Curve) since it uses much shorter keys and 
> therefore decreases the header size. However, for development frameworks that do not support 
> ED25519, RSA is also supported.

Following a successful completion, the following keys are returned:

- Private Key
- Public Key
- Public Key as JWE

Once keypairs are created, developers are strongly advised to create and store a local copy of each 
keypair for future reference. Although the Public Key, Public Key as JWE, and metadata for keypairs 
may be retrieved by the getSigningKey and getSigningKeys methods, in order to further ensure the 
security of confidential client information, eBay does not store the Private Key value in any 
system. If a developer loses their Private Key they must generate new keypairs using the 
createSigningKey method.

```php
use Rat\eBaySDK\API\KeyManagementAPI\SigningKey\CreateSigningKey;
use Rat\eBaySDK\Enums\SigningKeyCipher;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateSigningKey(
    signingKeyCipher: SigningKeyCipher::ED25519,
);
$response = $client->execute($request);
```

### GetSigningKey <DocsBadge path="developer/key-management/resources/signing_key/methods/getSigningKey" />

<ResourcePath method="POST">/signing_key/{signingKeyId}</ResourcePath>

This method returns the Public Key, Public Key as JWE, and metadata for a specified signingKeyId 
associated with the application key making the call.

> [!NOTE] 
> It is important to note that the privateKey value is not returned. In order to further ensure the 
> security of confidential client information, eBay does not store the privateKey value in any 
> system. If a developer loses their privateKey they must generate new keypairs using the 
> createSigningKey method.

```php
use Rat\eBaySDK\API\KeyManagementAPI\SigningKey\GetSigningKey;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetSigningKey(
    signingKeyId: (string) $signingKeyId,
);
$response = $client->execute($request);
```

### GetSigningKeys <DocsBadge path="developer/key-management/resources/signing_key/methods/getSigningKeys" />

<ResourcePath method="POST">/signing_key/{signingKeyId}</ResourcePath>

This method returns the Public Key, Public Key as JWE, and metadata for all keypairs associated with 
the application key making the call.

> [!NOTE]
> It is important to note that privateKey values are not returned. In order to further ensure the 
> security of confidential client information, eBay does not store privateKey values in any system. 
> If a developer loses their privateKey they must generate new keypairs set using the 
> createSigningKey method.

```php
use Rat\eBaySDK\API\KeyManagementAPI\SigningKey\GetSigningKeys;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetSigningKeys();
$response = $client->execute($request);
```
