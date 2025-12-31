# HTTPMethod Enum <Badge type="info">Internal</Badge>

This enumeration defines the supported HTTP methods used internally for building request classes.
It is not part of the public API surface and exists solely to standardize how HTTP requests are 
constructed and executed within the SDK.

| Value     | Description         |
| --------- | ------------------- |
| `OPTIONS` | HTTP OPTIONS method |
| `GET`     | HTTP GET method     |
| `PATCH`   | HTTP PATCH method   |
| `POST`    | HTTP POST method    |
| `PUT`     | HTTP PUT method     |
| `DELETE`  | HTTP DELETE method  |

## Example

```php
use Rat\eBaySDK\Enums\HTTPMethod;

HTTPMethod::GET;
```
