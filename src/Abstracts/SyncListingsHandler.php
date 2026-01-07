<?php declare(strict_types=1);

namespace Rat\eBaySDK\Abstracts;

use Rat\eBaySDK\API\TraditionalAPI\Listing\GetSellerList;
use Rat\eBaySDK\Context\SyncListingsContext;
use Rat\eBaySDK\Response;

abstract class SyncListingsHandler
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
