# Artisan Command: ebay:marketplace-token

This package provides a Laravel Artisan command that generates a valid verification token for the 
**Marketplace Account Deletion / Closure endpoint** required by eBay.

The verification token is used when registering the deletion endpoint in the eBay Developer Portal.
It must be between **32 and 80 characters** and must match the value configured in your application.

The command can either print the token to the console or write it directly to your `.env` file.

## Command Signature

```sh
php artisan ebay:marketplace-token
    {--l|length=64 : Token length (32-80)}
    {--write : Write token to your .env file}
```

## Options

### `--length`

Specify the desired token length. The length must be between 32 and 80 characters, as required by 
eBay. If omitted, the default length is 64.

```sh
php artisan ebay:marketplace-token --length=48
```

### `--write`

Write the generated token to your `.env` file as:

```
EBAY_MARKETPLACE_DELETION_VERIFICATION_TOKEN=xxxxxxxx
```

Example:

```sh
php artisan ebay:marketplace-token --write
```

If the variable already exists, it will be replaced. If it does not exist, it will be appended to 
the `.env` file. This option is recommended when setting up the deletion endpoint for the first time.