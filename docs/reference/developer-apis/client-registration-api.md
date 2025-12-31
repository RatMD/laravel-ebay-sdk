---
outline: deep
---
# Client Registration API <Badge type="warning" style="margin-left:0.75rem;">v1.0.0</Badge> <DocsBadge path="developer/client-registration/overview.html" />

> [!NOTE]
> The Client Registration API is not intended for use by developers who have previously registered 
> for a Developer Account on the eBay platform.

The Client Registration API registers a new regulated third-party financial application with eBay. 
Payment services regulations applicable in the EU and the UK require all regulated Account Servicing 
Payment Service Providers (ASPSPs) to provide secure APIs that allow regulated Third Party Payment 
Providers (TPPs) to access account and payment services on behalf of account holders. The 
regulations further dictate that a TPP should be able to use a qualified certificate issued by any 
Electronic Identification, Authentication and Trust Services (eIDAS) Qualified Trust Service 
Provider (QTSP) in order to identify and authenticate themselves to an ASPSP.

## Register

### RegisterClient <DocsBadge path="developer/client-registration/resources/register/methods/registerClient" />

<ResourcePath method="POST">/client/register</ResourcePath>

> [!NOTE]
> The Client Registration API is not intended for use by developers who have previously registered 
> for a Developer Account on the eBay platform.

This call registers a new third party financial application with eBay.

> [!CAUTION]
> When calling the registerClient method, Third Party Providers (TPPs) are required to pass their 
> valid eIDAS certificate to eBay via Mutual Transport Layer Security (MTLS) handshake Certificate 
> Request messages.

```php
use Rat\eBaySDK\API\ClientRegistrationAPI\Register\RegisterClient;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new RegisterClient(
    payload: (array) $payload,
);
$response = $client->execute($request);
```
