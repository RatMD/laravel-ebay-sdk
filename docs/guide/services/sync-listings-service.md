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

```sh
php artisan queue:work
```

For more information visit Laravel's [Queue documentation page](https://laravel.com/docs/12.x/queues).

## Basic Usage

```php
use Rat\eBaySDK\Services\SyncListingsService;
use App\Handlers\MySyncListingsHandler;

SyncListingsService::make()
    ->from('2020-01-01')
    ->to(now())
    ->limit(200)
    ->interval('+119 days 23 hours 59 minutes 59 seconds')
    ->timeout(180, true)
    ->handler(MySyncListingsHandler::class)
    ->dispatch();
```

### Scheduling

The following example syncs listings weekly at 02:00 AM, the `name()` method is required when using 
`withoutOverlapping()`.

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
->name('ebay:sync-listings')
->withoutOverlapping();
```

You can test your schedule task using the following command, checkout Laravels 
[Task Scheduling docs](https://laravel.com/docs/12.x/scheduling) for more details.

```sh
php artisan schedule:test --name="ebay:sync-listings"
```

## Configure your `SyncListingsService`

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

### `timeout(int $seconds, bool $failOnTimeout = false)`

<div style="margin-top: 1rem">
    <Badge type="danger">New</Badge> <Badge type="warning">Since 0.1.6</Badge>
</div>

Sets the default `timeout` in seconds and the `failOnTimeout` setting, see the 
[Queues Laravel documentation page](https://laravel.com/docs/12.x/queues#timeout) for more details.

```php
->timeout(180, true)
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

## Write your `SyncListingsHandler`

The handler defines how the retrieved data is processed. It receives callbacks at different stages 
of the sync lifecycle.

```php
use Rat\eBaySDK\Contracts\SyncListingsHandler;
use Rat\eBaySDK\Context\SyncListingsContext;
use Rat\eBaySDK\Response;

class MySyncListingsHandler extends SyncListingsHandler
{
    /**
     * Called once before the first API request of the entire sync process.
     * @param SyncListingsContext $context
     * @return void
     */
    public function onPrepare(SyncListingsContext $context): void
    {
        //
    }

    /**
     * Called once after the job failed.
     * @param null|Throwable $exception
     * @param SyncListingsContext $context
     * @return void
     */
    public function onFailed(?Throwable $exception, SyncListingsContext $context): void
    {
        //
    }

    /**
     * Called once after the sync process has fully completed.
     * @param SyncListingsContext $context
     * @return void
     */
    public function onFinish(SyncListingsContext $context): void
    {
        //
    }

    /**
     * Called before each GetSellerList API request is executed.
     * @param array $payload
     * @param SyncListingsContext $context
     * @return array
     */
    public function onBefore(array $payload, SyncListingsContext $context): array
    {
        return $payload;
    }

    /**
     * Called after each GetSellerList API request has completed.
     * @param GetSellerList $request
     * @param Response $response
     * @param SyncListingsContext $context
     * @return void
     */
    public function onAfter(GetSellerList $request, Response $response, SyncListingsContext $context): void
    {
        //
    }

    /**
     * Called once per page with all items of that page.
     * @param array $chunk
     * @param SyncListingsContext $context
     * @return void
     */
    public function onChunk(array $chunk, SyncListingsContext $context): void
    {
        //
    }

    /**
     * Called for each individual listing item.
     * @param array $item
     * @param SyncListingsContext $context
     * @return void
     */
    public function onItem(array $item, SyncListingsContext $context): void
    {
        //
    }
}
```

### onPrepare(SyncListingsContext $context)

Called once before the first API request of the entire sync process.

### onFailed(SyncListingsContext $context)

<div style="margin-top: 1rem">
    <Badge type="danger">New</Badge> <Badge type="warning">Since 0.1.6</Badge>
</div>

Called once after the job failed.

### onFinish(SyncListingsContext $context)

Called once after the sync process has fully completed.

### onBefore(array $payload, SyncListingsContext $context)

Called before each `GetSellerList` API request is executed.

### onAfter(GetSellerList $request, Response $response, SyncListingsContext $context)

Called after each `GetSellerList` API request has completed.

### onChunk(array $chunk, SyncListingsContext $context)

Called once per page with all items of that page.

### onItem(array $item, SyncListingsContext $context)

Called for each individual listing item.
