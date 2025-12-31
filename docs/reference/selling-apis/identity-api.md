---
outline: deep
---
# Identity API <Badge type="warning" style="margin-left:0.75rem;">v1.1.0</Badge> <DocsBadge path="sell/identity/overview.html" />

> [!NOTE]
> Not all the account related fields are returned for an authenticated user. The fields returned in 
> the response are controlled by the scopes and are available only to select developers approved by 
> business units.

The Identity API returns data for an authenticated user (user access token) based on the OAuth 
scopes provided. Non-confidential information, such as eBay userID is returned using the default 
scope. Confidential data for an individual, such as address, email, phone, etc. are returned based 
on the OAuth scope you use in the call. For business users, all the public business information is 
returned using the default OAuth scope.

The Identity API can be used to let users log into your app or site using eBay, which frees you 
from needing to store and protect user's PII (Personal Identifiable Information) data.

> [!NOTE]
> All scopes require explicit consent from the user.

## User

### GetUser <DocsBadge path="sell/identity/resources/user/methods/getUser" />

<ResourcePath method="GET">/user</ResourcePath>

This method retrieves the account profile information for an authenticated user, which requires a 
User access token. What is returned is controlled by the scopes.

For a **business account** you use the default scope `commerce.identity.readonly`, which returns all 
the fields in the [businessAccount](https://developer.ebay.com/api-docs/commerce/identity/resources/user/methods/getUser#response.businessAccount) 
container. These are returned because this is all public information.

For an **individual account**, the fields returned in the 
[individualAccount](https://developer.ebay.com/api-docs/commerce/identity/resources/user/methods/getUser#response.individualAccount) 
container are based on the scope you use. Using the default scope, only public information, such as 
eBay user ID, are returned. For details about what each scope returns, see the 
[Identity API Overview](https://developer.ebay.com/api-docs/commerce/identity/overview.html).

> [!NOTE]
> In the Sandbox, this API returns mock data. 
> You must use the correct scope or scopes for the data you want returned.

```php
use Rat\eBaySDK\API\IdentityAPI\User\GetUser;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetUser();
$response = $client->execute($request);
```