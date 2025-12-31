---
outline: deep
---

# Feed API <Badge type="warning" style="margin-left:0.75rem;">v1.9.3</Badge> <DocsBadge path="sell/feed/overview.html" />

The Sell Feed API lets sellers upload and download feed files and reports, and create schedules. 
Both upload and download feed files are processed asynchronously by eBay. The status of all upload 
and download tasks are tracked with a unique 'task ID'. Each report can be customized with date 
ranges and other filter criteria.

## CustomerServiceMetricTask

### CreateCustomerServiceMetricTask <DocsBadge path="sell/feed/resources/customer_service_metric_task/methods/createCustomerServiceMetricTask" />

<ResourcePath method="POST">/customer_service_metric_task</ResourcePath>

Use this method to create a customer service metrics download task with filter criteria for the 
customer service metrics report. When using this method, specify the feedType and **filterCriteria** 
including both **evaluationMarketplaceId** and **customerServiceMetricType** for the report. The 
method returns the location response header containing the call URI to use with 
**getCustomerServiceMetricTask** to retrieve status and details on the task.

Only CURRENT Customer Service Metrics reports can be generated with the Sell Feed API. PROJECTED 
reports are not supported at this time. See the getCustomerServiceMetric method document in the 
Analytics API for more information about these two types of reports.

> [!NOTE]
> Before calling this API, retrieve the summary of the seller's performance and rating for the 
> customer service metric by calling getCustomerServiceMetric (part of the Analytics API). You can 
> then populate the create task request fields with the values from the response. This technique 
> eliminates failed tasks that request a report for a customerServiceMetricType and 
> evaluationMarketplaceId that are without evaluation.

```php
use Rat\eBaySDK\API\FeedAPI\CustomerServiceMetricTask\CreateCustomerServiceMetricTask;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateCustomerServiceMetricTask(
    payload: (array) $payload
);
$response = $client->execute($request);
```

### GetCustomerServiceMetricTask <DocsBadge path="sell/feed/resources/customer_service_metric_task/methods/getCustomerServiceMetricTask" />

<ResourcePath method="GET">/customer_service_metric_task/{taskId}</ResourcePath>

Use this method to retrieve customer service metric task details for the specified task. The input 
is **task_id**.

```php
use Rat\eBaySDK\API\FeedAPI\CustomerServiceMetricTask\GetCustomerServiceMetricTask;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetCustomerServiceMetricTask(
    taskId: (string) $taskId
);
$response = $client->execute($request);
```

### GetCustomerServiceMetricTasks <DocsBadge path="sell/feed/resources/customer_service_metric_task/methods/getCustomerServiceMetricTasks" />

<ResourcePath method="GET">/customer_service_metric_task</ResourcePath>

Use this method to return an array of customer service metric tasks. You can limit the tasks 
returned by specifying a date range.

> [!NOTE]
> You can pass in either the look_back_days or date_range, but not both.

```php
use Rat\eBaySDK\API\FeedAPI\CustomerServiceMetricTask\GetCustomerServiceMetricTasks;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetCustomerServiceMetricTasks(
    feedType: (string) $feedType,
    lookBackDays: (int) $lookBackDays = 7,
    dateRange: (string) $dateRange = null,
    limit: (int) $limit = 10,
    offset: (int) $offset = 0,
);
$response = $client->execute($request);
```

## InventoryTask

### CreateInventoryTask <DocsBadge path="sell/feed/resources/inventory_task/methods/createInventoryTask" />

<ResourcePath method="POST">/inventory_task</ResourcePath>

This method creates an inventory-related download task for a specified feed type with optional 
filter criteria. When using this method, specify the feedType.

This method returns the location response header containing the getInventoryTask call URI to 
retrieve the inventory task you just created. The URL includes the eBay-assigned task ID, which you 
can use to reference the inventory task.

To retrieve the status of the task, use the getInventoryTask method to retrieve a single task ID or 
the getInventoryTasks method to retrieve multiple task IDs.

> [!NOTE]
> The scope depends on the feed type. An error message results when an unsupported scope or feed 
> type is specified.

Presently, this method supports Active Inventory Report. The ActiveInventoryReport returns a report 
that contains price and quantity information for all of the active listings for a specific seller. A 
seller can use this information to maintain their inventory on eBay.

```php
use Rat\eBaySDK\API\FeedAPI\InventoryTask\CreateInventoryTask;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateInventoryTask(
    payload: (array) $payload
);
$response = $client->execute($request);
```

### GetInventoryTask <DocsBadge path="sell/feed/resources/inventory_task/methods/getInventoryTask" />

<ResourcePath method="GET">/inventory_task/{taskId}</ResourcePath>

This method retrieves the task details and status of the specified inventory-related task. The input 
is **task_id**.

```php
use Rat\eBaySDK\API\FeedAPI\InventoryTask\GetInventoryTask;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetInventoryTask(
    taskId: (string) $taskId
);
$response = $client->execute($request);
```

### GetInventoryTasks <DocsBadge path="sell/feed/resources/inventory_task/methods/getInventoryTasks" />

<ResourcePath method="GET">/inventory_task</ResourcePath>

This method searches for multiple tasks of a specific feed type, and includes date filters and 
pagination.

```php
use Rat\eBaySDK\API\FeedAPI\InventoryTask\GetInventoryTasks;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetInventoryTasks(
    feedType: (string) $feedType,
    scheduleId: (string) $scheduleId = null,
    lookBackDays: (int) $lookBackDays = 7,
    dateRange: (string) $dateRange = null,
    limit: (int) $limit = 10,
    offset: (int) $offset = 0,
);
$response = $client->execute($request);
```

## OrderTask

### CreateOrderTask <DocsBadge path="sell/feed/resources/order_task/methods/createOrderTask" />

<ResourcePath method="POST">/order_task</ResourcePath>

This method creates an order download task with filter criteria for the order report. When using 
this method, specify the feedType, schemaVersion, and filterCriteria for the report. The method 
returns the location response header containing the getOrderTask call URI to retrieve the order 
task you just created. The URL includes the eBay-assigned task ID, which you can use to reference 
the order task.

To retrieve the status of the task, use the getOrderTask method to retrieve a single task ID or the 
getOrderTasks method to retrieve multiple order task IDs.

> [!NOTE]
> The scope depends on the feed type. An error message results when an unsupported scope or feed 
> type is specified.

The following list contains this method's authorization scope and its corresponding feed type:

- https://api.ebay.com/oauth/api_scope/sell.fulfillment: LMS_ORDER_REPORT

For details about how this method is used, see General feed types in the Selling Integration Guide.

> [!NOTE]
> At this time, the createOrderTask method only supports order creation date filters and not 
> modified order date filters. Do not include the modifiedDateRange filter in your request payload.

```php
use Rat\eBaySDK\API\FeedAPI\OrderTask\CreateOrderTask;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateOrderTask(
    payload: (array) $payload
);
$response = $client->execute($request);
```

### GetOrderTask <DocsBadge path="sell/feed/resources/order_task/methods/getOrderTask" />

<ResourcePath method="GET">/order_task/{taskId}</ResourcePath>

This method retrieves the task details and status of the specified task. The input is task_id.

```php
use Rat\eBaySDK\API\FeedAPI\OrderTask\GetOrderTask;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetOrderTask(
    taskId: (string) $taskId
);
$response = $client->execute($request);
```

### GetOrderTasks <DocsBadge path="sell/feed/resources/order_task/methods/getOrderTasks" />

<ResourcePath method="GET">/order_task</ResourcePath>

This method returns the details and status for an array of order tasks based on a specified 
feed_type or schedule_id. Specifying both feed_type and schedule_id results in an error. Since 
schedules are based on feed types, you can specify a schedule (schedule_id) that returns the 
needed feed_type.

If specifying the feed_type, limit which order tasks are returned by specifying filters such as the 
creation date range or period of time using look_back_days.

If specifying a schedule_id, the schedule template (that the schedule_id is based on) determines 
which order tasks are returned (see schedule_id for additional information). Each schedule_id 
applies to one feed_type.

```php
use Rat\eBaySDK\API\FeedAPI\OrderTask\GetOrderTasks;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetOrderTasks(
    feedType: (string) $feedType,
    scheduleId: (string) $scheduleId = null,
    lookBackDays: (int) $lookBackDays = 7,
    dateRange: (string) $dateRange = null,
    limit: (int) $limit = 10,
    offset: (int) $offset = 0,
);
$response = $client->execute($request);
```

## Schedule

### CreateSchedule <DocsBadge path="sell/feed/resources/schedule/methods/createSchedule" />

<ResourcePath method="POST">/schedule</ResourcePath>

This method creates a schedule, which is a subscription to the specified schedule template. A 
schedule periodically generates a report for the feedType specified by the template. Specify the 
same feedType as the feedType of the associated schedule template. When creating the schedule, if 
available from the template, you can specify a preferred trigger hour, day of the week, or day of 
the month. These and other fields are conditionally available as specified by the template.

> [!NOTE]
> Make sure to include all fields required by the schedule template (scheduleTemplateId). Call the 
> getScheduleTemplate method (or the getScheduleTemplates method), to find out which fields are 
> required or optional. If a field is optional and a default value is provided by the template, the 
> default value will be used if omitted from the payload.

A successful call returns the location response header containing the getSchedule call URI to 
retrieve the schedule you just created. The URL includes the eBay-assigned schedule ID, which you 
can use to reference the schedule task.

To retrieve the details of the create schedule task, use the getSchedule method for a single 
schedule ID or the getSchedules method to retrieve all schedule details for the specified feed_type. 
The number of schedules for each feedType is limited. Error code 160031 is returned when you have 
reached this maximum.

> [!NOTE]
> Except for schedules with a HALF-HOUR frequency, all schedules will ideally run at the start of 
> each hour ('00' minutes). Actual start time may vary time may vary due to load and other factors.

```php
use Rat\eBaySDK\API\FeedAPI\Schedule\CreateSchedule;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateSchedule(
    payload: (array) $payload
);
$response = $client->execute($request);
```

### DeleteSchedule <DocsBadge path="sell/feed/resources/schedule/methods/deleteSchedule" />

<ResourcePath method="DELETE">/schedule/{scheduleId}</ResourcePath>

This method deletes an existing schedule. Specify the schedule to delete using the schedule_id path 
parameter.

```php
use Rat\eBaySDK\API\FeedAPI\Schedule\DeleteSchedule;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new DeleteSchedule(
    scheduleId: (string) $scheduleId
);
$response = $client->execute($request);
```

### GetLastResultFile <DocsBadge path="sell/feed/resources/schedule/methods/getLatestResultFile" />

<ResourcePath method="GET">/schedule/{scheduleId}/download_result_file</ResourcePath>

This method downloads the latest Order Report generated by the schedule. The response of this call 
is a compressed or uncompressed CSV, XML, or JSON file, with the applicable file extension (for 
example: csv.gz). Specify the schedule_id path parameter to download its last generated file.

```php
use Rat\eBaySDK\API\FeedAPI\Schedule\GetLastResultFile;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetLastResultFile(
    scheduleId: (string) $scheduleId
);
$response = $client->execute($request);
```

### GetSchedule <DocsBadge path="sell/feed/resources/schedule/methods/getSchedule" />

<ResourcePath method="GET">/schedule/{scheduleId}</ResourcePath>

This method retrieves schedule details and status of the specified schedule. Specify the schedule 
to retrieve using the schedule_id. Use the getSchedules method to find a schedule if you do not 
know the schedule_id.

```php
use Rat\eBaySDK\API\FeedAPI\Schedule\GetSchedule;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetSchedule(
    scheduleId: (string) $scheduleId
);
$response = $client->execute($request);
```

### GetSchedules <DocsBadge path="sell/feed/resources/schedule/methods/getSchedules" />

<ResourcePath method="GET">/schedule</ResourcePath>

This method retrieves an array containing the details and status of all schedules based on the 
specified feed_type. Use this method to find a schedule if you do not know the schedule_id.

```php
use Rat\eBaySDK\API\FeedAPI\Schedule\GetSchedules;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetSchedules(
    feedType: (string) $feedType,
    limit: (int) $limit = 10,
    offset: (int) $offset = 0,
);
$response = $client->execute($request);
```

### GetScheduleTemplate <DocsBadge path="sell/feed/resources/schedule/methods/getScheduleTemplate" />

<ResourcePath method="GET">/schedule_template/{scheduleTemplateId}</ResourcePath>

This method retrieves the details of the specified template. Specify the template to retrieve using 
the schedule_template_id path parameter. Use the getScheduleTemplates method to find a schedule 
template if you do not know the schedule_template_id.

```php
use Rat\eBaySDK\API\FeedAPI\Schedule\GetScheduleTemplate;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetScheduleTemplate(
    scheduleTemplateId: (string) $scheduleTemplateId,
);
$response = $client->execute($request);
```

### GetScheduleTemplates <DocsBadge path="sell/feed/resources/schedule/methods/getScheduleTemplates" />

<ResourcePath method="GET">/schedule_template</ResourcePath>

This method retrieves an array containing the details and status of all schedule templates based on
the specified feed_type. Use this method to find a schedule template if you do not know the 
schedule_template_id.

```php
use Rat\eBaySDK\API\FeedAPI\Schedule\GetScheduleTemplates;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetScheduleTemplates(
    feedType: (string) $feedType,
    limit: (int) $limit = 10,
    offset: (int) $offset = 0,
);
$response = $client->execute($request);
```

### UpdateSchedule <DocsBadge path="sell/feed/resources/schedule/methods/updateSchedule" />

<ResourcePath method="PUT">/schedule/{scheduleId}</ResourcePath>

This method updates an existing schedule. Specify the schedule to update using the schedule_id path 
parameter. If the schedule template has changed after the schedule was created or updated, the input 
will be validated using the changed template.

> [!NOTE]
> Make sure to include all fields required by the schedule template (scheduleTemplateId). Call the 
> getScheduleTemplate method (or the getScheduleTemplates method), to find out which fields are 
> required or optional. If you do not know the scheduleTemplateId, call the getSchedule method to 
> find out.

```php
use Rat\eBaySDK\API\FeedAPI\Schedule\UpdateSchedule;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UpdateSchedule(
    scheduleId: (string) $scheduleId,
    payload: (array) $payload
);
$response = $client->execute($request);
```

## Task

### CreateTask <DocsBadge path="sell/feed/resources/task/methods/createTask" />

<ResourcePath method="POST">/task</ResourcePath>

This method creates an upload task or a download task without filter criteria. When using this 
method, specify the feedType and the feed file schemaVersion. The feed type specified sets the task 
as a download or an upload task.

> [!NOTE]
> Note: The scope depends on the feed type. An error message results when an unsupported scope or 
> feed type is specified.

The following list contains this method's authorization scopes and their corresponding feed types:

- https://api.ebay.com/oauth/api_scope/sell.inventory: See LMS FeedTypes
- https://api.ebay.com/oauth/api_scope/sell.fulfillment: LMS_ORDER_ACK (specify for upload tasks). Also see LMS FeedTypes
- https://api.ebay.com/oauth/api_scope/sell.marketing: None*
- https://api.ebay.com/oauth/api_scope/commerce.catalog.readonly: None*

* Reserved for future release

```php
use Rat\eBaySDK\API\FeedAPI\Task\CreateTask;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new CreateTask(
    payload: (array) $payload
);
$response = $client->execute($request);
```

### GetInputFile <DocsBadge path="sell/feed/resources/task/methods/getInputFile" />

<ResourcePath method="GET">/task/{taskId}/download_input_file</ResourcePath>

This method downloads the file previously uploaded using uploadFile. Specify the task_id from the 
uploadFile call.

```php
use Rat\eBaySDK\API\FeedAPI\Task\GetInputFile;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetInputFile(
    taskId: (string) $taskId
);
$response = $client->execute($request);
```

### GetResultFile <DocsBadge path="sell/feed/resources/task/methods/getResultFile" />

<ResourcePath method="GET">/task/{taskId}/download_result_file</ResourcePath>

This method retrieves the generated file that is associated with the specified task ID. The response 
of this call is a compressed or uncompressed CSV, XML, or JSON file, with the applicable file 
extension (for example: csv.gz).

```php
use Rat\eBaySDK\API\FeedAPI\Task\GetResultFile;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetResultFile(
    taskId: (string) $taskId
);
$response = $client->execute($request);
```

### GetTask <DocsBadge path="sell/feed/resources/task/methods/getTask" />

<ResourcePath method="GET">/task/{taskId}</ResourcePath>

This method retrieves the details and status of the specified task. The input is task_id.

```php
use Rat\eBaySDK\API\FeedAPI\Task\GetTask;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetTask(
    taskId: (string) $taskId
);
$response = $client->execute($request);
```

### GetTasks <DocsBadge path="sell/feed/resources/task/methods/getTasks" />

<ResourcePath method="GET">/task</ResourcePath>

This method returns the details and status for an array of tasks based on a specified feed_type or 
schedule_id. Specifying both feed_type and schedule_id results in an error. Since schedules are 
based on feed types, you can specify a schedule (schedule_id) that returns the needed feed_type.

If specifying the feed_type, limit which tasks are returned by specifying filters, such as the 
creation date range or period of time using look_back_days. Also, by specifying the feed_type, both 
on-demand and scheduled reports are returned.

If specifying a schedule_id, the schedule template (that the schedule ID is based on) determines 
which tasks are returned (see schedule_id for additional information). Each scheduledId applies to 
one feed_type.

```php
use Rat\eBaySDK\API\FeedAPI\Task\GetTasks;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new GetTasks(
    feedType: (string) $feedType,
    scheduleId: (string) $scheduleId = null,
    lookBackDays: (int) $lookBackDays = 7,
    dateRange: (string) $dateRange = null,
    limit: (int) $limit = 10,
    offset: (int) $offset = 0,
);
$response = $client->execute($request);
```

### UploadFile <DocsBadge path="sell/feed/resources/task/methods/uploadFile" />

<ResourcePath method="POST">/task/{taskId}/upload_file</ResourcePath>

This method associates the specified file with the specified task ID and uploads the input file. 
After the file has been uploaded, the processing of the file begins.

```php
use Rat\eBaySDK\API\FeedAPI\Task\UploadFile;
use Rat\eBaySDK\Client;

$client = app(Client::class);
$request = new UploadFile(
    taskId: (string) $taskId,
    filePath: (string) $filePath,
    fileName: (string) $fileName = null,
);
$response = $client->execute($request);
```