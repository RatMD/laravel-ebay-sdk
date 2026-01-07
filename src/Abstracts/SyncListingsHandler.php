<?php declare(strict_types=1);

namespace Rat\eBaySDK\Abstracts;

use Rat\eBaySDK\API\TraditionalAPI\Listing\GetSellerList;
use Rat\eBaySDK\Response;

abstract class SyncListingsHandler
{
    /**
     *
     * @param GetSellerList $request
     * @return GetSellerList
     */
    public function onBefore(GetSellerList $request): GetSellerList
    {
        return $request;
    }

    /**
     *
     * @param GetSellerList $request
     * @param Response $response
     * @return void
     */
    public function onAfter(GetSellerList $request, Response $response): void
    {
        //
    }

    /**
     *
     * @param array $chunk
     * @return void
     */
    public function onChunk(array $chunk): void
    {
        //
    }

    /**
     *
     * @param array $item
     * @return void
     */
    public function onItem(array $item): void
    {
        //
    }
}
