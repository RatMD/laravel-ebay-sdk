# Artisan Command: ebay:authorize

This package ships with a Laravel Artisan command that helps you complete eBay OAuth in two steps:

1. Generate an authorization URL you can open in a browser to grant access.
2. Exchange the returned authorization code (or the full callback URL) for an access token + refresh 
   token.

The command is designed for local/dev/CLI usage and writes the resulting token payload to disk so 
your SDK can use it later.

## Command Signature

```sh
php artisan ebay:authorize
    {code? : Authorization code to exchange, leave empty to generate a new URL}
    {--i|client-id= : Custom eBay OAuth client ID}
    {--s|client-secret= : Custom eBay OAuth client secret}
    {--r|redirect-uri= : Custom eBay redirect URI / RuName}
    {--e|environment= : Custom eBay API environment}
    {--a|auth-scopes=* : Custom list of OAuth authorization scopes}
    {--c|cred-scopes=* : Custom list of credential scopes}
    {--all-auth-scopes : Use all available OAuth authorization scopes}
    {--all-cred-scopes : Use all available credential scopes}
```

## Options

### `--client-id` / `--client-secret`

Override the configured OAuth client ID/secret at runtime:

```sh
php artisan ebay:authorize --client-id="YOUR_ID" --client-secret="YOUR_SECRET"
```

Useful if you have multiple apps or environments and do not want to change configuration files.

### `--redirect-uri`

Override the redirect URI / RuName used for the authorization flow:

```sh
php artisan ebay:authorize --redirect-uri="YOUR_RUNAME_OR_REDIRECT_URI"
```

### `--environment`

Override the eBay environment (using `sandbox` or `production`):

```sh
php artisan ebay:authorize --environment="production"
```

### `--auth-scopes` / `--cred-scopes`

Provide a custom list of scopes. These options can be passed multiple times:

```sh
php artisan ebay:authorize \
  --auth-scopes="https://api.ebay.com/oauth/api_scope/sell.inventory" \
  --auth-scopes="https://api.ebay.com/oauth/api_scope/sell.fulfillment" \
  --cred-scopes="https://api.ebay.com/oauth/api_scope" \
  --cred-scopes="https://api.ebay.com/oauth/api_scope/commerce.feedback.readonly"
```

### `--all-auth-scopes` / `--all-cred-scopes`

Use the built-in “all scopes” presets from the command:

```sh
php artisan ebay:authorize --all-auth-scopes --all-cred-scopes
```

## Security Notes

- Treat storage/.ebay.key like a password file.
- Never commit it to Git (`storage/*.key` should usually be in your `.gitignore` file).
- If you accidentally leak a refresh token, revoke it in your eBay developer/app settings and 
  generate a new one.

## Example

### Step 1: Generate an authorization URL

The command prints an eBay authorization URL. Open it in your browser, sign in to eBay, and approve 
the requested scopes. After approval, eBay redirects you to your configured redirect URI or an 
eBay internal website, where you’ll receive an authorization code.

### Step 2: Exchange the authorization code for tokens

Once you have the code (or the eBay internal resolved URL), pass it to the command:

```sh
php artisan ebay:authorize "v^1.1#i^1#f^0#..."
```

The command will exchange the authorization code and output a table containing the response fields 
(tokens are masked in console output). It also writes the full response payload to:

```
storage/.ebay.key
```

**Do not commit this file.** It contains the received credentials.