# Queue

## Overview

### Available Operations

* [retrieve](#retrieve) - Get a queue
* [getStats](#getstats) - Get queue statistics

## retrieve

Get a queue

### Example Usage

<!-- UsageSnippet language="php" operationID="getQueue" method="get" path="/queue/{id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use ModerationApi;

$sdk = ModerationApi\ModerationApi::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->queue->retrieve(
    id: '<id>'
);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                                                             | Type                                                                                                                                                                                  | Required                                                                                                                                                                              | Description                                                                                                                                                                           |
| ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `id`                                                                                                                                                                                  | *string*                                                                                                                                                                              | :heavy_check_mark:                                                                                                                                                                    | The queue ID                                                                                                                                                                          |
| `projectId`                                                                                                                                                                           | *?string*                                                                                                                                                                             | :heavy_minus_sign:                                                                                                                                                                    | The project to act on, when you call with an organization key. Optional when the organization has one project. A project key acts on its own project: naming another one is an error. |

### Response

**[?Operations\GetQueueResponse](../../Models/Operations/GetQueueResponse.md)**

### Errors

| Error Type                   | Status Code                  | Content Type                 |
| ---------------------------- | ---------------------------- | ---------------------------- |
| Errors\BadRequestError       | 400                          | application/json             |
| Errors\AuthenticationError   | 401                          | application/json             |
| Errors\PermissionDeniedError | 403                          | application/json             |
| Errors\NotFoundError         | 404                          | application/json             |
| Errors\RateLimitError        | 429                          | application/json             |
| Errors\InternalServerError   | 500                          | application/json             |
| Errors\APIException          | 4XX, 5XX                     | \*/\*                        |

## getStats

Get detailed statistics about a moderation queue including review times, action counts, and trends

### Example Usage

<!-- UsageSnippet language="php" operationID="getQueueStats" method="get" path="/queue/{id}/stats" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use ModerationApi;

$sdk = ModerationApi\ModerationApi::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->queue->getStats(
    id: '<id>',
    withinDays: 30

);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                                                             | Type                                                                                                                                                                                  | Required                                                                                                                                                                              | Description                                                                                                                                                                           |
| ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `id`                                                                                                                                                                                  | *string*                                                                                                                                                                              | :heavy_check_mark:                                                                                                                                                                    | The queue ID                                                                                                                                                                          |
| `withinDays`                                                                                                                                                                          | *?int*                                                                                                                                                                                | :heavy_minus_sign:                                                                                                                                                                    | N/A                                                                                                                                                                                   |
| `projectId`                                                                                                                                                                           | *?string*                                                                                                                                                                             | :heavy_minus_sign:                                                                                                                                                                    | The project to act on, when you call with an organization key. Optional when the organization has one project. A project key acts on its own project: naming another one is an error. |

### Response

**[?Operations\GetQueueStatsResponse](../../Models/Operations/GetQueueStatsResponse.md)**

### Errors

| Error Type                   | Status Code                  | Content Type                 |
| ---------------------------- | ---------------------------- | ---------------------------- |
| Errors\BadRequestError       | 400                          | application/json             |
| Errors\AuthenticationError   | 401                          | application/json             |
| Errors\PermissionDeniedError | 403                          | application/json             |
| Errors\NotFoundError         | 404                          | application/json             |
| Errors\RateLimitError        | 429                          | application/json             |
| Errors\InternalServerError   | 500                          | application/json             |
| Errors\APIException          | 4XX, 5XX                     | \*/\*                        |