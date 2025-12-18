# eBay Push Notifications (Webhook)

The SDK supports eBay Platform Notifications (push) and provides built-in request validation for 
incoming webhook events.

Configure notifications in the [eBay Developer Portal](https://developer.ebay.com/). Go to the
"Alerts & Notifications" section in your eBay Developer Portal. Select Platform Notifications (push) 
and configure your webhook endpoint, for example:

```md
https://example.tld/ebay/notify
```

Make sure to enable the option: “My server is ready to receive events”.

To Secure your webhook endpoint the SDK supports an optional webhook_token in the `ebay-sdk.php` 
configuration file. This shared secret is used to validate incoming webhook requests from eBay. When 
a `webhook_token` is configured, include it in your webhook URL:

```md
https://example.tld/ebay/notify/{webhook_token}
```

Incoming requests will be rejected if the token does not match the configured value.