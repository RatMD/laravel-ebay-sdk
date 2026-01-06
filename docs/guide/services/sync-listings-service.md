---
outline: deep
---

# Sync Listings using SyncListingsService

The `SyncListingsService` workflow provides a robust, resumable, rate-limited synchronization for 
eBay seller listings using the Trading API call [GetSellerList](/reference/selling-apis/traditional/listing.html#getsellerlist). 
It is designed for large data sets, supports automatic pagination, time-window chunking, and 
queue-based execution, and exposes well-defined lifecycle hooks via a single handler class.

> [!NOTE]
> This service is intended to be used in background jobs and scheduled tasks, not as a synchronous 
> request.

## Overview

- `\Rat\eBaySDK\Services\SyncListingsService`  
  Orchestrates the sync process, calculates time windows, manages checkpoints and rate limiting
- `\Rat\eBaySDK\Jobs\SyncListingsJob`  
  Executes one sync step, gets re-dispatched until finished
- `\Rat\eBaySDK\Abstracts\SyncListingsHandler`  
  User-provided abstract extension point, receives data and lifecycle callbacks

## Requirements

This sync must run in a queue. The service is intentionally designed to process large datasets over 
multiple jobs and must not be run synchronously.

At least one queue worker must be running (using the following local example):

```php
php artisan queue:work --queue=ebay-sync
```

For more information visit Laravel's [Queue documentation page](https://laravel.com/docs/12.x/queues).

## Usage

### Dispatching a Sync

```php
use Rat\eBaySDK\Services\SyncListingsService;
use App\Handlers\MySyncListingsHandler;

SyncListingsService::make()
    ->from('2020-01-01')
    ->to(now())
    ->limit(200)
    ->interval('+119 days 23 hours 59 minutes 59 seconds')
    ->handler(MySyncListingsHandler::class)
    ->dispatch();

```

### Writing a Handler

```php
use Rat\eBaySDK\Abstracts\SyncListingsHandler;

class MySyncListingsHandler extends SyncListingsHandler
{
    /**
     *
     * @param array $item
     * @return void
     */
    public function onChunk(array $chunk): void
    {
        // Handle the whole items chunk
    }

    /**
     *
     * @param array $item
     * @return void
     */
    public function onItem(array $item): void
    {
        // Handle each single listing item
    }
}
```

### Scheduling

The following example syncs listings weekly at 02:00 AM.

```php
use Illuminate\Console\Scheduling\Schedule;
use Rat\eBaySDK\Abstracts\SyncListingsHandler;

$schedule->call(function () {
    SyncListingsService::make()
        ->from('2018-01-01')
        ->to(now())
        ->handler(MySyncListingsHandler::class)
        ->dispatch('ebay-sync');
})
->weeklyAt('02:00')
->withoutOverlapping();
```

## Configuration

### `from(string|DateTimeInterface $date)`

Sets the start date of the sync range.

```php
->from('2018-01-01')
```

### `to(string|DateTimeInterface $date)`

Sets the end date of the sync range.

```php
->to(now())
```

### `limit(int $limit)`

Number of listings / items per page. Supports values between 1 and 200 (as per eBay limitations).

```php
->limit(200)
```

### `interval(string $interval)`

Time window size for each sync chunk. Must be compatible with `DateTimeImmutable::modify()` (See 
[Supported Date and time formats](https://www.php.net/manual/en/datetime.formats.php) on php.net).
Supports a maximum interval of 120 days (as per eBay limitations).

```php
->interval('+119 days 23 hours 59 minutes 59 seconds')
```

### `handler(class-string<SyncListingsHandler> $handler)`

Registers the handler class responsible for processing data. This is required for queue execution.

```php
->handler(MySyncListingsHandler::class)
```

### `dispatch(?string $queue = null)`

Dispatches the initial sync job.

```php
->dispatch('ebay-sync');
```

## `SyncListingsHandler`

The handler defines how the retrieved data is processed. It receives callbacks at different stages 
of the sync lifecycle.

```php
use Rat\eBaySDK\Contracts\SyncListingsHandler;
use Rat\eBaySDK\API\TraditionalAPI\Listing\GetSellerList;
use Rat\eBaySDK\Response;

class MySyncListingsHandler extends SyncListingsHandler
{
    public function onBefore(GetSellerList $request): GetSellerList
    {
        // Modify request (e.g. output selectors, detail level)
        return $request;
    }

    public function onAfter(GetSellerList $request, Response $response): void
    {
        // Logging, metrics, diagnostics
    }

    public function onChunk(array $chunk): void
    {
        // Bulk processing (recommended for database writes)
    }

    public function onItem(array $item): void
    {
        // Per-item processing (optional)
    }
}
```

### onBefore(GetSellerList $request)

Called before the API request is executed, must return the desired `GetSellerList` request instance.

### onAfter(GetSellerList $request, Response $response)

Called after the API request returns.

### onChunk(array $chunk)

Called once per page with all items of that page.

### onItem(array $item)

Called for each individual listing.

