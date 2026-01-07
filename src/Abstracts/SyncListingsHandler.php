<?php declare(strict_types=1);

namespace Rat\eBaySDK\Abstracts;

use Rat\eBaySDK\API\TraditionalAPI\Listing\GetSellerList;
use Rat\eBaySDK\Response;

abstract class SyncListingsHandler
{
    /**
     * Called once before the first API request of the entire sync process.
     * @param string $cacheKey
     * @return void
     */
    public function onPrepare(string $cacheKey): void
    {
        //
    }

    /**
     * Called once after the sync process has fully completed.
     * @param string $cacheKey
     * @return void
     */
    public function onFinish(string $cacheKey): void
    {
        //
    }

    /**
     * Called before each GetSellerList API request is executed.
     * @param GetSellerList $request
     * @return GetSellerList
     */
    public function onBefore(GetSellerList $request): GetSellerList
    {
        return $request;
    }

    /**
     * Called after each GetSellerList API request has completed.
     * @param GetSellerList $request
     * @param Response $response
     * @return void
     */
    public function onAfter(GetSellerList $request, Response $response): void
    {
        //
    }

    /**
     * Called once per page with all items of that page.
     * @param array $chunk
     * @return void
     */
    public function onChunk(array $chunk): void
    {
        //
    }

    /**
     * Called for each individual listing item.
     * @param array $item
     * @return void
     */
    public function onItem(array $item): void
    {
        //
    }
}
