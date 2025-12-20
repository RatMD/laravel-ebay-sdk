---
outline: deep
---
# Marketing API <DocsBadge path="sell/marketing/static/overview.html" />

The Marketing API supports three eBay marketing features - Promoted Listings, Promotions Manager, 
and Store Email Campaigns. Used separately or together, these three marketing features can increase 
views and sales of the seller's items.

**Promoted Listings** is an eBay advertising service that increases the visibility of items included 
in a seller's ad campaigns. For more information on Promoted Listings, see the Promoted Listings 
Playbook.

**Discounts manager** is a free service that gives sellers the ability to offer price discounts on 
their items. For more information on Discounts manager, see the Discounts Manager section of the 
Selling Integration Guide.

**Email Store Campaigns** allow eBay store sellers to create and send email campaigns to subscribers, 
followers, and past customers who’ve signed up to receive newsletters from a seller’s store. For 
more information on email campaigns, see the Store Email Campaigns section of the Selling 
Integration Guide.

> [!NOTE]
> The Marketing API works with listings that have been created with the Trading API as well as 
> listings that are managed with the Inventory API.

## Ad

### BulkCreateAdsByInventoryReference <DocsBadge path="sell/marketing/resources/ad/methods/bulkCreateAdsByInventoryReference" />

<ResourcePath method="POST">/ad_campaign/{campaignId}/bulk_create_ads_by_inventory_reference</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Ad\BulkCreateAdsByInventoryReference;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new BulkCreateAdsByInventoryReference(
    campaignId: (string) $campaignId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### BulkCreateAdsByListingId <DocsBadge path="sell/marketing/resources/ad/methods/bulkCreateAdsByListingId" />

<ResourcePath method="POST">/ad_campaign/{campaignId}/bulk_create_ads_by_listing_id</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Ad\BulkCreateAdsByListingId;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new BulkCreateAdsByListingId(
    campaignId: (string) $campaignId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### BulkDeleteAdsByInventoryReference <DocsBadge path="sell/marketing/resources/ad/methods/bulkDeleteAdsByInventoryReference" />

<ResourcePath method="POST">/ad_campaign/{campaignId}/bulk_delete_ads_by_inventory_reference</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Ad\BulkDeleteAdsByInventoryReference;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new BulkDeleteAdsByInventoryReference(
    campaignId: (string) $campaignId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### BulkDeleteAdsByListingId <DocsBadge path="sell/marketing/resources/ad/methods/bulkDeleteAdsByListingId" />

<ResourcePath method="POST">/ad_campaign/{campaignId}/bulk_delete_ads_by_listing_id</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Ad\BulkDeleteAdsByListingId;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new BulkDeleteAdsByListingId(
    campaignId: (string) $campaignId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### BulkUpdateAdsBidByInventoryReference <DocsBadge path="sell/marketing/resources/ad/methods/bulkUpdateAdsBidByInventoryReference" />

<ResourcePath method="POST">/ad_campaign/{campaignId}/bulk_update_ads_bid_by_inventory_reference</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Ad\BulkUpdateAdsBidByInventoryReference;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new BulkUpdateAdsBidByInventoryReference(
    campaignId: (string) $campaignId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### BulkUpdateAdsBidByListingId <DocsBadge path="sell/marketing/resources/ad/methods/bulkUpdateAdsBidByListingId" />

<ResourcePath method="POST">/ad_campaign/{campaignId}/bulk_update_ads_bid_by_listing_id</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Ad\BulkUpdateAdsBidByListingId;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new BulkUpdateAdsBidByListingId(
    campaignId: (string) $campaignId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### BulkUpdateAdsStatus <DocsBadge path="sell/marketing/resources/ad/methods/bulkUpdateAdsStatus" />

<ResourcePath method="POST">/ad_campaign/{campaignId}/bulk_update_ads_status</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Ad\BulkUpdateAdsStatus;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new BulkUpdateAdsStatus(
    campaignId: (string) $campaignId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### BulkUpdateAdsStatusByListingId <DocsBadge path="sell/marketing/resources/ad/methods/bulkUpdateAdsStatusByListingId" />

<ResourcePath method="POST">/ad_campaign/{campaignId}/bulk_update_ads_status_by_listing_id</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Ad\BulkUpdateAdsStatusByListingId;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new BulkUpdateAdsStatusByListingId(
    campaignId: (string) $campaignId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### CreateAdByListingId <DocsBadge path="sell/marketing/resources/ad/methods/createAdByListingId" />

<ResourcePath method="POST">/ad_campaign/{campaignId}/ad</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Ad\CreateAdByListingId;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateAdByListingId(
    campaignId: (string) $campaignId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### CreateAdsByInventoryReference <DocsBadge path="sell/marketing/resources/ad/methods/createAdsByInventoryReference" />

<ResourcePath method="POST">/ad_campaign/{campaignId}/create_ads_by_inventory_reference</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Ad\CreateAdsByInventoryReference;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateAdsByInventoryReference(
    campaignId: (string) $campaignId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### DeleteAd <DocsBadge path="sell/marketing/resources/ad/methods/deleteAd" />

<ResourcePath method="DELETE">/ad_campaign/{campaignId}/ad/{adId}</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Ad\DeleteAd;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new DeleteAd(
    campaignId: (string) $campaignId,
    adId: (string) $adId
);
$response = $client->execute($request);
```

### DeleteAdsByInventoryReference <DocsBadge path="sell/marketing/resources/ad/methods/deleteAdsByInventoryReference" />

<ResourcePath method="POST">/ad_campaign/{campaignId}/delete_ads_by_inventory_reference</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Ad\DeleteAdsByInventoryReference;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new DeleteAdsByInventoryReference(
    campaignId: (string) $campaignId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### GetAd <DocsBadge path="sell/marketing/resources/ad/methods/getAd" />

<ResourcePath method="GET">/ad_campaign/{campaignId}/ad/{adId}</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Ad\GetAd;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetAd(
    campaignId: (string) $campaignId,
    adId: (array) $adId
);
$response = $client->execute($request);
```

### GetAds <DocsBadge path="sell/marketing/resources/ad/methods/getAds" />

<ResourcePath method="GET">/ad_campaign/{campaignId}/ad</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Ad\GetAds;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetAds(
    campaignId: (string) $campaignId,
    listingIds: (string) $listingIds = null,
    adGroupIds: (string) $adGroupIds = null,
    adStatus: (string) $adStatus = null,
    limit: (int) $limit = 10,
    offset: (int) $offset = 0
);
$response = $client->execute($request);
```

### GetAdsByInventoryReference <DocsBadge path="sell/marketing/resources/ad/methods/getAdsByInventoryReference" />

<ResourcePath method="GET">/ad_campaign/{campaignId}/get_ads_by_inventory_reference</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Ad\GetAdsByInventoryReference;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetAdsByInventoryReference(
    campaignId: (string) $campaignId,
    inventoryReferenceType: (string) $inventoryReferenceType,
    inventoryReferenceId: (string) $inventoryReferenceId,
);
$response = $client->execute($request);
```

### UpdateBid <DocsBadge path="sell/marketing/resources/ad/methods/updateBid" />

<ResourcePath method="POST">/ad_campaign/{campaignId}/ad/{adId}/update_bid</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Ad\UpdateBid;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdateBid(
    campaignId: (string) $campaignId,
    adId: (string) $adId,
    payload: (array) $payload,
);
$response = $client->execute($request);
```

## AdGroup

### CreateAdGroup <DocsBadge path="sell/marketing/resources/ad_group/methods/createAdGroup" />

<ResourcePath method="POST">/ad_campaign/{campaignId}/ad_group</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\AdGroup\CreateAdGroup;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateAdGroup(
    campaignId: (string) $campaignId,
    payload: (array) $payload,
);
$response = $client->execute($request);
```

### GetAdGroup <DocsBadge path="sell/marketing/resources/ad_group/methods/getAdGroup" />

<ResourcePath method="GET">/ad_campaign/{campaignId}/ad_group/{adGroupId}</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\AdGroup\GetAdGroup;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetAdGroup(
    campaignId: (string) $campaignId,
    adGroupId: (string) $adGroupId,
);
$response = $client->execute($request);
```

### GetAdGroups <DocsBadge path="sell/marketing/resources/ad_group/methods/getAdGroups" />

<ResourcePath method="GET">/ad_campaign/{campaignId}/ad_group</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\AdGroup\GetAdGroups;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetAdGroups(
    campaignId: (string) $campaignId,
    adGroupStatus: (string) $adGroupStatus,
    limit: (int) $limit = 10,
    offset: (int) $offset = 0,
);
$response = $client->execute($request);
```

### SuggestBids <DocsBadge path="sell/marketing/resources/ad_group/methods/suggestBids" />

<ResourcePath method="POST">/ad_campaign/{campaignId}/ad_group{adGroupId}/suggest_bids</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\AdGroup\SuggestBids;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new SuggestBids(
    campaignId: (string) $campaignId,
    adGroupId: (string) $adGroupId,
    payload: (array) $payload,
);
$response = $client->execute($request);
```

### SuggestKeywords <DocsBadge path="sell/marketing/resources/ad_group/methods/suggestKeywords" />

<ResourcePath method="POST">/ad_campaign/{campaignId}/ad_group{adGroupId}/suggest_keywords</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\AdGroup\SuggestKeywords;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new SuggestKeywords(
    campaignId: (string) $campaignId,
    adGroupId: (string) $adGroupId,
    payload: (array) $payload,
);
$response = $client->execute($request);
```

### UpdateAdGroup <DocsBadge path="sell/marketing/resources/ad_group/methods/updateAdGroup" />

<ResourcePath method="PUT">/ad_campaign/{campaignId}/ad_group{adGroupId}</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\AdGroup\UpdateAdGroup;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdateAdGroup(
    campaignId: (string) $campaignId,
    adGroupId: (string) $adGroupId,
    payload: (array) $payload,
);
$response = $client->execute($request);
```

## AdReport 

### GetReport <DocsBadge path="sell/marketing/resources/ad_report/methods/getReport" />

<ResourcePath method="GET">/ad_report/{reportId}</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\AdReport\GetReport;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetReport(
    reportId: (string) $reportId,
);
$response = $client->execute($request);
```

## AdReportMetadata 

### GetReportMetadata <DocsBadge path="sell/marketing/resources/ad_report_metadata/methods/getReportMetadata" />

<ResourcePath method="GET">/ad_report_metadata</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\AdReportMetadata\GetReportMetadata;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetReportMetadata(
    fundingModel: (string) $fundingModel = null,
    channel: (string) $channel = null,
);
$response = $client->execute($request);
```

## AdReportTask 

### CreateReportTask <DocsBadge path="sell/marketing/resources/ad_report_task/methods/CreateReportTask" />

<ResourcePath method="POST">/ad_report_task</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\AdReportTask\CreateReportTask;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateReportTask(
    payload: (array) $payload,
);
$response = $client->execute($request);
```

### DeleteReportTask <DocsBadge path="sell/marketing/resources/ad_report_task/methods/deleteReportTask" />

<ResourcePath method="DELETE">/ad_report_task/{reportTaskId}</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\AdReportTask\DeleteReportTask;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new DeleteReportTask(
    reportTaskId: (string) $reportTaskId,
);
$response = $client->execute($request);
```

### GetReportTask <DocsBadge path="sell/marketing/resources/ad_report_task/methods/getReportTask" />

<ResourcePath method="GET">/ad_report_task/{reportTaskId}</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\AdReportTask\GetReportTask;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetReportTask(
    reportTaskId: (string) $reportTaskId,
);
$response = $client->execute($request);
```

### GetReportTasks <DocsBadge path="sell/marketing/resources/ad_report_task/methods/getReportTasks" />

<ResourcePath method="GET">/ad_report_task</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\AdReportTask\GetReportTasks;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetReportTasks(
    reportTaskStatuses: (string) $reportTaskStatuses = null,
    limit: (int) $limit = 10,
    offset: (int) $offset = 0,
);
$response = $client->execute($request);
```

## Campaign 

### CloneCampaign <DocsBadge path="sell/marketing/resources/campaign/methods/cloneCampaign" />

<ResourcePath method="POST">/ad_campaign/{campaignId}</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Campaign\CloneCampaign;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CloneCampaign(
    campaignId: (string) $campaignId,
    payload: (array) $payload,
);
$response = $client->execute($request);
```

### CreateCampaign <DocsBadge path="sell/marketing/resources/campaign/methods/createCampaign" />

<ResourcePath method="POST">/ad_campaign</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Campaign\CreateCampaign;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateCampaign(
    payload: (array) $payload,
);
$response = $client->execute($request);
```

### DeleteCampaign <DocsBadge path="sell/marketing/resources/campaign/methods/deleteCampaign" />

<ResourcePath method="DELETE">/ad_campaign/{campaignId}</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Campaign\DeleteCampaign;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new DeleteCampaign(
    campaignId: (string) $campaignId,
);
$response = $client->execute($request);
```

### EndCampaign <DocsBadge path="sell/marketing/resources/campaign/methods/endCampaign" />

<ResourcePath method="POST">/ad_campaign/{campaignId}/end</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Campaign\EndCampaign;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new EndCampaign(
    campaignId: (string) $campaignId,
);
$response = $client->execute($request);
```

### FindCampaignByAdReference <DocsBadge path="sell/marketing/resources/campaign/methods/findCampaignByAdReference" />

<ResourcePath method="GET">/ad_campaign/find_campaign_by_ad_reference</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Campaign\FindCampaignByAdReference;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new FindCampaignByAdReference(
    listingId: (string) $listingId = null,
    inventoryReferenceId: (string) $inventoryReferenceId = null,
    inventoryReferenceType: (string) $inventoryReferenceType = null,
);
$response = $client->execute($request);
```

### GetCampaign <DocsBadge path="sell/marketing/resources/campaign/methods/getCampaign" />

<ResourcePath method="GET">/ad_campaign/{campaignId}</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Campaign\GetCampaign;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetCampaign(
    campaignId: (string) $campaignId,
);
$response = $client->execute($request);
```

### GetCampaignByName <DocsBadge path="sell/marketing/resources/campaign/methods/getCampaignByName" />

<ResourcePath method="GET">/ad_campaign</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Campaign\GetCampaignByName;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetCampaignByName(
    campaignName: (string) $campaignName,
);
$response = $client->execute($request);
```

### GetCampaigns <DocsBadge path="sell/marketing/resources/campaign/methods/GetCampaigns" />

<ResourcePath method="GET">/ad_campaign</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Campaign\GetCampaigns;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetCampaigns(
    campaignStatus: (string) $campaignStatus = null,
    startDateRange: (string) $startDateRange = null,
    endDateRange: (string) $endDateRange = null,
    campaignName: (string) $campaignName = null,
    fundingStrategy: (string) $fundingStrategy = null,
    channels: (string) $channels = null,
    campaignTargetingTypes: (string) $campaignTargetingTypes = null,
    limit: (int) $limit = 10,
    offset: (int) $offset = 0,
);
$response = $client->execute($request);
```

### LaunchCampaign <DocsBadge path="sell/marketing/resources/campaign/methods/launchCampaign" />

<ResourcePath method="POST">/ad_campaign/{campaignId}/launch</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Campaign\LaunchCampaign;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new LaunchCampaign(
    campaignId: (string) $campaignId,
);
$response = $client->execute($request);
```

### PauseCampaign <DocsBadge path="sell/marketing/resources/campaign/methods/pauseCampaign" />

<ResourcePath method="POST">/ad_campaign/{campaignId}/pause</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Campaign\PauseCampaign;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new PauseCampaign(
    campaignId: (string) $campaignId,
);
$response = $client->execute($request);
```

### ResumeCampaign <DocsBadge path="sell/marketing/resources/campaign/methods/resumeCampaign" />

<ResourcePath method="POST">/ad_campaign/{campaignId}/resume</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Campaign\ResumeCampaign;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new ResumeCampaign(
    campaignId: (string) $campaignId,
);
$response = $client->execute($request);
```

### SetupQuickCampaign <DocsBadge path="sell/marketing/resources/campaign/methods/setupQuickCampaign" />

<ResourcePath method="POST">/ad_campaign/setup_quick_campaign</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Campaign\SetupQuickCampaign;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new SetupQuickCampaign(
    payload: (array) $payload,
);
$response = $client->execute($request);
```

### SuggestBudget <DocsBadge path="sell/marketing/resources/campaign/methods/suggestBudget" />

<ResourcePath method="GET">/ad_campaign/suggest_budget</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Campaign\SuggestBudget;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new SuggestBudget(
    marketplaceId: (string) $marketplaceId,
);
$response = $client->execute($request);
```

### SuggestItems <DocsBadge path="sell/marketing/resources/campaign/methods/suggestItems" />

<ResourcePath method="GET">/ad_campaign/{campaignId}/suggest_items</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Campaign\SuggestItems;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new SuggestItems(
    campaignId: (string) $campaignId,
    categoryIds: (string) $categoryIds = null,
    limit: (int) $limit = 10,
    offset: (int) $offset = 0,
);
$response = $client->execute($request);
```

### SuggestMaxCpc <DocsBadge path="sell/marketing/resources/campaign/methods/suggestMaxCpc" />

<ResourcePath method="POST">/ad_campaign/suggest_max_cpc</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Campaign\SuggestMaxCpc;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new SuggestMaxCpc(
    payload: (array) $payload,
);
$response = $client->execute($request);
```

### UpdateAdRateStrategy <DocsBadge path="sell/marketing/resources/campaign/methods/updateAdRateStrategy" />

<ResourcePath method="POST">/ad_campaign/{campaignId}/update_ad_rate_strategy</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Campaign\UpdateAdRateStrategy;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdateAdRateStrategy(
    campaignId: (string) $campaignId,
    payload: (array) $payload,
);
$response = $client->execute($request);
```

### UpdateBiddingStrategy <DocsBadge path="sell/marketing/resources/campaign/methods/updateBiddingStrategy" />

<ResourcePath method="POST">/ad_campaign/{campaignId}/update_bidding_strategy</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Campaign\UpdateBiddingStrategy;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdateBiddingStrategy(
    campaignId: (string) $campaignId,
    payload: (array) $payload,
);
$response = $client->execute($request);
```

### UpdateCampaignIdentification <DocsBadge path="sell/marketing/resources/campaign/methods/updateCampaignIdentification" />

<ResourcePath method="POST">/ad_campaign/{campaignId}/update_campaign_identification</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Campaign\UpdateCampaignIdentification;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdateCampaignIdentification(
    campaignId: (string) $campaignId,
    payload: (array) $payload,
);
$response = $client->execute($request);
```

### UpdateCampaignStrategy <DocsBadge path="sell/marketing/resources/campaign/methods/updateCampaignStrategy" />

<ResourcePath method="POST">/ad_campaign/{campaignId}/update_campaign_budget</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Campaign\UpdateCampaignStrategy;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdateCampaignStrategy(
    campaignId: (string) $campaignId,
    payload: (array) $payload,
);
$response = $client->execute($request);
```

## EmailCampaign

### CreateEmailCampaign <DocsBadge path="sell/marketing/resources/email_campaign/methods/createEmailCampaign" />

<ResourcePath method="POST">/email_campaign</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\EmailCampaign\CreateEmailCampaign;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateEmailCampaign(
    marketplaceId: (string) $marketplaceId,
    payload: (array) $payload,
);
$response = $client->execute($request);
```

### DeleteEmailCampaign <DocsBadge path="sell/marketing/resources/email_campaign/methods/deleteEmailCampaign" />

<ResourcePath method="DELETE">/email_campaign/{emailCampaignId}</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\EmailCampaign\DeleteEmailCampaign;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new DeleteEmailCampaign(
    emailCampaignId: (string) $emailCampaignId,
);
$response = $client->execute($request);
```

### GetAudiences <DocsBadge path="sell/marketing/resources/email_campaign/methods/getAudiences" />

<ResourcePath method="GET">/email_campaign/audience</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\EmailCampaign\GetAudiences;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetAudiences(
    emailCampaignType: (string) $emailCampaignType,
    limit: (int) $limit = 100,
    offset: (int) $offset = 0,
);
$response = $client->execute($request);
```

### GetEmailCampaign <DocsBadge path="sell/marketing/resources/email_campaign/methods/getEmailCampaign" />

<ResourcePath method="GET">/email_campaign/{emailCampaignId}</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\EmailCampaign\GetEmailCampaign;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetEmailCampaign(
    emailCampaignId: (string) $emailCampaignId,
);
$response = $client->execute($request);
```

### GetEmailCampaigns <DocsBadge path="sell/marketing/resources/email_campaign/methods/getEmailCampaigns" />

<ResourcePath method="GET">/email_campaign</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\EmailCampaign\GetEmailCampaigns;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetEmailCampaigns(
    q: (string) $q,
    sort: (string) $sort,
    limit: (int) $limit = 10,
    offset: (int) $offset = 0,
);
$response = $client->execute($request);
```

### GetEmailPreview <DocsBadge path="sell/marketing/resources/email_campaign/methods/getEmailPreview" />

<ResourcePath method="GET">/email_campaign/{emailCampaignId}/email_preview</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\EmailCampaign\GetEmailPreview;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetEmailPreview(
    emailCampaignId: (string) $emailCampaignId,
);
$response = $client->execute($request);
```

### GetEmailReport <DocsBadge path="sell/marketing/resources/email_campaign/methods/getEmailReport" />

<ResourcePath method="GET">/email_campaign/report</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\EmailCampaign\GetEmailReport;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetEmailReport(
    startDate: (string) $startDate,
    endDate: (string) $endDate,
);
$response = $client->execute($request);
```

### UpdateEmailCampaign <DocsBadge path="sell/marketing/resources/email_campaign/methods/updateEmailCampaign" />

<ResourcePath method="PUT">/email_campaign/{emailCampaignId}</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\EmailCampaign\UpdateEmailCampaign;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdateEmailCampaign(
    emailCampaignId: (string) $emailCampaignId,
    payload: (array) $payload,
);
$response = $client->execute($request);
```

## ItemPriceMarkdown

### CreateItemPriceMarkdownPromotion <DocsBadge path="sell/marketing/resources/item_price_markdown/methods/createItemPriceMarkdownPromotion" />

<ResourcePath method="POST">/item_price_markdown</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\ItemPriceMarkdown\CreateItemPriceMarkdownPromotion;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateItemPriceMarkdownPromotion(
    payload: (array) $payload,
);
$response = $client->execute($request);
```

### DeleteItemPriceMarkdownPromotion <DocsBadge path="sell/marketing/resources/item_price_markdown/methods/deleteItemPriceMarkdownPromotion" />

<ResourcePath method="DELETE">/item_price_markdown/{promotionId}</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\ItemPriceMarkdown\DeleteItemPriceMarkdownPromotion;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new DeleteItemPriceMarkdownPromotion(
    promotionId: (string) $promotionId,
);
$response = $client->execute($request);
```

### GetItemPriceMarkdownPromotion <DocsBadge path="sell/marketing/resources/item_price_markdown/methods/getItemPriceMarkdownPromotion" />

<ResourcePath method="GET">/item_price_markdown/{promotionId}</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\ItemPriceMarkdown\GetItemPriceMarkdownPromotion;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetItemPriceMarkdownPromotion(
    promotionId: (string) $promotionId,
);
$response = $client->execute($request);
```

### UpdateItemPriceMarkdownPromotion <DocsBadge path="sell/marketing/resources/item_price_markdown/methods/updateItemPriceMarkdownPromotion" />

<ResourcePath method="PUT">/item_price_markdown/{promotionId}</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\ItemPriceMarkdown\UpdateItemPriceMarkdownPromotion;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdateItemPriceMarkdownPromotion(
    promotionId: (string) $promotionId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

## ItemPromotion

### CreateItemPromotion <DocsBadge path="sell/marketing/resources/item_promotion/methods/createItemPromotion" />

<ResourcePath method="POST">/item_promotion</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\ItemPromotion\CreateItemPromotion;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateItemPromotion(
    payload: (array) $payload,
);
$response = $client->execute($request);
```

### DeleteItemPromotion <DocsBadge path="sell/marketing/resources/item_promotion/methods/deleteItemPromotion" />

<ResourcePath method="DELETE">/item_promotion/{promotionId}</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\ItemPromotion\DeleteItemPromotion;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new DeleteItemPromotion(
    promotionId: (string) $promotionId,
);
$response = $client->execute($request);
```

### GetItemPromotion <DocsBadge path="sell/marketing/resources/item_promotion/methods/getItemPromotion" />

<ResourcePath method="GET">/item_promotion/{promotionId}</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\ItemPromotion\GetItemPromotion;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetItemPromotion(
    promotionId: (string) $promotionId,
);
$response = $client->execute($request);
```

### UpdateItemPromotion <DocsBadge path="sell/marketing/resources/item_promotion/methods/updateItemPromotion" />

<ResourcePath method="PUT">/item_promotion/{promotionId}</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\ItemPromotion\UpdateItemPromotion;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdateItemPromotion(
    promotionId: (string) $promotionId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

## Keyword

### BulkCreateKeyword <DocsBadge path="sell/marketing/resources/keyword/methods/bulkCreateKeyword" />

<ResourcePath method="POST">/ad_campaign/{campaignId}/bulk_create_keyword</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Keyword\BulkCreateKeyword;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new BulkCreateKeyword(
    campaignId: (string) $campaignId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### BulkUpdateKeyword <DocsBadge path="sell/marketing/resources/keyword/methods/bulkUpdateKeyword" />

<ResourcePath method="POST">/ad_campaign/{campaignId}/bulk_update_keyword</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Keyword\BulkUpdateKeyword;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new BulkUpdateKeyword(
    campaignId: (string) $campaignId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### CreateKeyword <DocsBadge path="sell/marketing/resources/keyword/methods/createKeyword" />

<ResourcePath method="POST">/ad_campaign/{campaignId}/keyword</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Keyword\CreateKeyword;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateKeyword(
    campaignId: (string) $campaignId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

### GetKeyword <DocsBadge path="sell/marketing/resources/keyword/methods/getKeyword" />

<ResourcePath method="GET">/ad_campaign/{campaignId}/keyword/{keywordId}</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Keyword\GetKeyword;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetKeyword(
    campaignId: (string) $campaignId,
    keywordId: (string) $keywordId,
);
$response = $client->execute($request);
```

### GetKeywords <DocsBadge path="sell/marketing/resources/keyword/methods/getKeywords" />

<ResourcePath method="GET">/ad_campaign/{campaignId}/keyword</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Keyword\GetKeywords;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetKeywords(
    campaignId: (string) $campaignId,
    adGroupId: (string) $adGroupId = null,
    keywordStatus: (string) $keywordStatus = null,
    limit: (int) $limit = 10,
    offset: (int) $offset = 0,
);
$response = $client->execute($request);
```

### UpdateKeyword <DocsBadge path="sell/marketing/resources/keyword/methods/updateKeyword" />

<ResourcePath method="PUT">/ad_campaign/{campaignId}/keyword/{keywordId}</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Keyword\UpdateKeyword;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdateKeyword(
    campaignId: (string) $campaignId,
    keywordId: (string) $keywordId,
    payload: (array) $payload
)
$response = $client->execute($request);
```

## NegativeKeyword

### BulkCreateNegativeKeyword <DocsBadge path="sell/marketing/resources/keyword/negative_keyword/bulkCreateNegativeKeyword" />

<ResourcePath method="POST">/bulk_create_negative_keyword</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\NegativeKeyword\BulkCreateNegativeKeyword;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new BulkCreateNegativeKeyword(
    payload: (array) $payload
);
$response = $client->execute($request);
```

### BulkUpdateNegativeKeyword <DocsBadge path="sell/marketing/resources/negative_keyword/methods/bulkUpdateNegativeKeyword" />

<ResourcePath method="POST">/bulk_update_negative_keyword</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\NegativeKeyword\BulkUpdateNegativeKeyword;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new BulkUpdateNegativeKeyword(
    payload: (array) $payload
);
$response = $client->execute($request);
```

### CreateNegativeKeyword <DocsBadge path="sell/marketing/resources/negative_keyword/methods/createNegativeKeyword" />

<ResourcePath method="POST">/negative_keyword</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\NegativeKeyword\CreateNegativeKeyword;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateNegativeKeyword(
    payload: (array) $payload
);
$response = $client->execute($request);
```

### GetNegativeKeyword <DocsBadge path="sell/marketing/resources/negative_keyword/methods/getNegativeKeyword" />

<ResourcePath method="GET">/negative_keyword/{negativeKeywordId}</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\NegativeKeyword\GetNegativeKeyword;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetNegativeKeyword(
    negativeKeywordId: (string) $negativeKeywordId,
);
$response = $client->execute($request);
```

### GetNegativeKeywords <DocsBadge path="sell/marketing/resources/negative_keyword/methods/getNegativeKeywords" />

<ResourcePath method="GET">/negative_keyword</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\NegativeKeyword\GetNegativeKeywords;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetNegativeKeywords(
    adGroupIds: (string) $adGroupIds = null,
    campaignIds: (string) $campaignIds = null,
    negativeKeywordStatus: (string) $negativeKeywordStatus = null,
    limit: (int) $limit = 10,
    offset: (int) $offset = 0,
);
$response = $client->execute($request);
```

### UpdateNegativeKeyword <DocsBadge path="sell/marketing/resources/negative_keyword/methods/updateNegativeKeyword" />

<ResourcePath method="PUT">/negative_keyword/{negativeKeywordId}</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\NegativeKeyword\UpdateNegativeKeyword;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdateNegativeKeyword(
    negativeKeywordId: (string) $negativeKeywordId,
    payload: (array) $payload
)
$response = $client->execute($request);
```

## Promotion

### GetListingSet <DocsBadge path="sell/marketing/resources/promotion/methods/getListingSet" />

<ResourcePath method="GET">/promotion/{promotionId}/get_listing_set</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Promotion\GetListingSet;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetListingSet(
    promotionId: (string) $promotionId,
    q: (string) $q = null,
    status: (string) $status = null,
    sort: (string) $sort = null,
    limit: (int) $limit = 200,
    offset: (int) $offset = 0
)
$response = $client->execute($request);
```

### GetPromotions <DocsBadge path="sell/marketing/resources/promotion/methods/getPromotions" />

<ResourcePath method="GET">/promotion</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Promotion\GetPromotions;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetPromotions(
    marketplaceId: (string) $marketplaceId,
    q: (string) $q = null,
    promotionStatus: (string) $promotionStatus = null,
    promotionType: (string) $promotionType = null,
    sort: (string) $sort = null,
    limit: (int) $limit = 200,
    offset: (int) $offset = 0
)
$response = $client->execute($request);
```

### PausePromotion <DocsBadge path="sell/marketing/resources/promotion/methods/pausePromotion" />

<ResourcePath method="POST">/promotion/{promotionId}/pause</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Promotion\PausePromotion;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new PausePromotion(
    promotionId: (string) $promotionId,
)
$response = $client->execute($request);
```

### ResumePromotion <DocsBadge path="sell/marketing/resources/promotion/methods/resumePromotion" />

<ResourcePath method="POST">/promotion/{promotionId}/resume</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\Promotion\ResumePromotion;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new ResumePromotion(
    promotionId: (string) $promotionId,
)
$response = $client->execute($request);
```

## PromotionReports

### GetPromotionReports <DocsBadge path="sell/marketing/resources/promotion_report/methods/getPromotionReports" />

<ResourcePath method="POST">/promotion_report</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\PromotionReports\GetPromotionReports;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetPromotionReports(
    marketplaceId: (string) $marketplaceId,
    q: (string) $q = null,
    promotionStatus: (string) $promotionStatus = null,
    promotionType: (string) $promotionType = null,
    limit: (int) $limit = 200,
    offset: (int) $offset = 0
)
$response = $client->execute($request);
```

## PromotionReport

### GetPromotionSummaryReport <DocsBadge path="sell/marketing/resources/promotion_summary_report/methods/getPromotionSummaryReport" />

<ResourcePath method="POST">/promotion_report</ResourcePath>

```php
use Rat\eBaySDK\API\MarketingAPI\PromotionReport\GetPromotionSummaryReport;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetPromotionSummaryReport(
    marketplaceId: (string) $marketplaceId,
)
$response = $client->execute($request);
```