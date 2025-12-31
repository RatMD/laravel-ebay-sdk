# Debugging

The SDK provides one helper method to inspect and debug outgoing requests and incoming 
responses. This is especially useful when diagnosing payload issues, unexpected API errors, 
or mismatches with the official eBay documentation.

## Inspect Request

The `$client->inspect()` method allows you to inspect the final, fully-built HTTP request before it 
is sent to eBay. This includes:

- HTTP method
- Target URL
- Headers
- Request body
- Guzzle request options

This is particularly helpful when you want to verify how constructor parameters and payload data are 
translated into an actual HTTP request. Thus, using `inspect()` is a recommended way to debug 
`20500` / HTTP 4xx & 5xx errors and verifying request payload structures.

Since `inspect()` does not execute the request, it is safe to use in development and debugging 
scenarios without triggering actual API calls.

**Example**

```php
use Rat\eBaySDK\API\AccountAPI\CustomPolicy\CreateCustomPolicy;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateCustomPolicy([
    'name'          => 'internal_policy_name',
    'label'         => 'Policy Label',
    'description'   => 'Policy Description',
    'policyType'    => CustomPolicyType::TAKE_BACK,
]);
$result = $client->inspect($request);
dd($result);
```

The example above will output an associative array representing the final HTTP request structure.

> [!NOTE]
> Sensitive information such as the `Authorization` header and internal Guzzle handler objects are 
> intentionally stripped from the output.

**Example Output**

```php
$result = [
    "method" => "POST",
    "protocol" => "1.1",
    "url" => [
        "scheme" => "https",
        "userInfo" => "",
        "host" => "api.sandbox.ebay.com",
        "port" => null,
        "path" => "/sell/account/v1/custom_policy",
        "query" => "",
        "fragment" => "",
    ],
    "headers" => [
        "Header-Key" => ["Header-Value"]
    ],
    "body" => "{}",
    "target" => "/sell/account/v1/custom_policy"
    "options" => [
        "synchronous" => true,
        "base_uri" => [
            "scheme" => "https",
            "userInfo" => "",
            "host" => "api.sandbox.ebay.com",
            "port" => null,
            "path" => "/sell/account/v1/custom_policy",
            "query" => "",
            "fragment" => "",
        ],
        "http_errors" => false,
        "allow_redirects" => [
            "max" => 5,
            "protocols" => [
                0 => "http",
                1 => "https",
            ],
            "strict" => false,
            "referer" => false,
            "track_redirects" => false
        ],
        "decode_content" => true,
        "verify" => true,
        "cookies" => false,
        "idn_conversion" => false,
    ]
];
```