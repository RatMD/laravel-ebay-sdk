# Sync Orders Example <DocsBadge path="sell/fulfillment/resources/order/methods/getOrders" />

This guide shows a practical way to sync eBay orders on a schedule using a Laravel artisan console 
command. The example below fetches all orders modified since the first day of last month (UTC), 
paginates through the result set, and provides clear extension points where orders and line items 
can be persisted in your application.

The implementation is intentionally kept simple to make the underlying mechanics easy to understand 
and adapt.

## Prerequisites

Before running this command, make sure your SDK client (`Rat\eBaySDK\Client`) is configured and 
authenticated (as [described here](/guide/authorize)). You also need Fulfillment API read access. 
The following OAuth scopes are sufficient:

- `https://api.ebay.com/oauth/api_scope/sell.fulfillment`
- `https://api.ebay.com/oauth/api_scope/sell.fulfillment.readonly`

## Source

The example below uses a fixed time window and a three-hour schedule. You should adjust both the 
`$fromDate` logic and the scheduling interval (on the `console.php` file) to match your own data 
volume and business requirements.

In production setups, it is recommended to persist the timestamp of the last successful sync and 
use it as the starting point for the next run.

::: code-group

```php [App/Console/Commands/SyncOrders.php]
<?php declare(strict_types=1);

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Rat\eBaySDK\API\FulfillmentAPI\Order\GetOrders;
use Rat\eBaySDK\Client;
use Rat\eBaySDK\Support\FilterQuery;

class SyncOrders extends Command
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'ebay:sync-orders';

    /**
     * The console command description.
     * @var string
     */
    protected $description = 'Sync eBay Orders.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $client = app(Client::class);

        /**
         * This example fetches all orders modified since the first day of last month (UTC).
         * This is a safe fallback window for recurring jobs and initial imports.
         */
        $fromDate = (new \DateTimeImmutable('now', new \DateTimeZone('UTC')))
            ->modify('-1 month')
            ->modify('first day of this month')
            ->setTime(0, 0, 0);
        $filterDate = $fromDate->format('Y-m-d\TH:i:s.000\Z');

        $offset = 0;
        $continue = true;
        do {
            $response = $client->execute(new GetOrders(
                limit: 200,
                offset: $offset,
                filter: new FilterQuery([
                    'lastmodifieddate'  => sprintf('[%s..]', $filterDate)
                ])
            ));
            if (!$response->ok()) {
                break; // In production, you should log the response and exit gracefully
            }

            $content = $response->content();
            $continue = !empty($content['next'] ?? null);

            foreach ($content['orders'] AS $order) {
                // Do something with the order

                foreach ($order['lineItems'] AS $lineItem) {
                    // Do something with the order items
                }
            }

            if ($continue) {
                $offset += count($content['orders']);
            }
        } while($continue);
    }
}
```

```php [routes/console.php]
<?php declare(strict_types=1);

use App\Handler\SyncListingsHandler;
use Illuminate\Support\Facades\Schedule;

Schedule::command('ebay:sync-orders')->everyThreeHours();
```

:::

Of course, you can easily test your command using

```sh
php artisan ebay:sync-orders
```

## Notes

### Prefer `lastmodifieddate` over `creationdate`

Using `lastmodifieddate` is the safest approach and strongly recommended over `creationdate` for 
recurring sync jobs because it allows you to:

- catch updates (status changes, cancellations, address updates, etc.)
- safely re-run the command without missing anything
- implement idempotent upserts in your database