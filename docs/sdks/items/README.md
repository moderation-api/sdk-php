# Queue.Items

## Overview

### Available Operations

* [list](#list) - List queue items
* [resolve](#resolve) - Resolve a queue item
* [resolveMany](#resolvemany) - Resolve queue items
* [unresolve](#unresolve) - Unresolve a queue item

## list

List the items of a review queue, with the filters and the date window of the queue applied. By default only pending items. The list is paginated. Use the item `id` or `contentId` to resolve or unresolve an item.

### Example Usage

<!-- UsageSnippet language="php" operationID="listQueueItems" method="get" path="/queue/{id}/items" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use ModerationApi;
use ModerationApi\Models\Operations;

$sdk = ModerationApi\ModerationApi::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();

$request = new Operations\ListQueueItemsRequest(
    id: '<id>',
);

$responses = $sdk->queue->items->list(
    request: $request
);


foreach ($responses as $response) {
    if ($response->statusCode === 200) {
        // handle response
    }
}
```

### Parameters

| Parameter                                                                            | Type                                                                                 | Required                                                                             | Description                                                                          |
| ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------ |
| `$request`                                                                           | [Operations\ListQueueItemsRequest](../../Models/Operations/ListQueueItemsRequest.md) | :heavy_check_mark:                                                                   | The request object to use for the request.                                           |

### Response

**[?Operations\ListQueueItemsResponse](../../Models/Operations/ListQueueItemsResponse.md)**

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

## resolve

Mark an item of a queue as resolved. It is the same as a check-off in the dashboard: the item leaves the pending list and a QUEUE_ITEM_COMPLETED webhook is sent. `itemId` is the item `id` or your `contentId`. To also take a moderation action, use `POST /actions/execute`.

### Example Usage

<!-- UsageSnippet language="php" operationID="resolveQueueItem" method="post" path="/queue/{id}/items/{itemId}/resolve" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use ModerationApi;

$sdk = ModerationApi\ModerationApi::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->queue->items->resolve(
    id: '<id>',
    itemId: '<id>'

);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                                                                                                                      | Type                                                                                                                                                                                                                                           | Required                                                                                                                                                                                                                                       | Description                                                                                                                                                                                                                                    |
| ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `id`                                                                                                                                                                                                                                           | *string*                                                                                                                                                                                                                                       | :heavy_check_mark:                                                                                                                                                                                                                             | The queue ID.                                                                                                                                                                                                                                  |
| `itemId`                                                                                                                                                                                                                                       | *string*                                                                                                                                                                                                                                       | :heavy_check_mark:                                                                                                                                                                                                                             | The item to resolve: the item `id` from `GET /queue/{id}/items`, or the `contentId` you sent to `POST /moderate` (webhooks send it as `item.id`). For a content ID, the newest submission with that content ID is used, as the queue shows it. |
| `projectId`                                                                                                                                                                                                                                    | *?string*                                                                                                                                                                                                                                      | :heavy_minus_sign:                                                                                                                                                                                                                             | The project to act on, by ID or name. Required with an organization key unless the key reaches only one project; list projects with GET /projects. A project key acts on its own project and needs no value: naming another one is an error.   |

### Response

**[?Operations\ResolveQueueItemResponse](../../Models/Operations/ResolveQueueItemResponse.md)**

### Errors

| Error Type                   | Status Code                  | Content Type                 |
| ---------------------------- | ---------------------------- | ---------------------------- |
| Errors\BadRequestError       | 400                          | application/json             |
| Errors\AuthenticationError   | 401                          | application/json             |
| Errors\PermissionDeniedError | 403                          | application/json             |
| Errors\RateLimitError        | 429                          | application/json             |
| Errors\InternalServerError   | 500                          | application/json             |
| Errors\APIException          | 4XX, 5XX                     | \*/\*                        |

## resolveMany

Mark up to 100 items of a queue as resolved in one request. Each item is resolved the same as with `POST /queue/{id}/items/{itemId}/resolve`, and each ID is an item `id` or your `contentId`. IDs that match no item in the project are skipped and returned in `notFoundIds`.

### Example Usage

<!-- UsageSnippet language="php" operationID="resolveQueueItems" method="post" path="/queue/{id}/items/resolve" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use ModerationApi;
use ModerationApi\Models\Operations;

$sdk = ModerationApi\ModerationApi::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();

$body = new Operations\ResolveQueueItemsRequestBody(
    itemIds: [
        'clx8k2v0e000108l4a9bz3f7q',
        'clx8k2v0e000208l4h2mc6d1r',
    ],
);

$response = $sdk->queue->items->resolveMany(
    id: '<id>',
    body: $body

);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                                                                                                                    | Type                                                                                                                                                                                                                                         | Required                                                                                                                                                                                                                                     | Description                                                                                                                                                                                                                                  |
| -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `id`                                                                                                                                                                                                                                         | *string*                                                                                                                                                                                                                                     | :heavy_check_mark:                                                                                                                                                                                                                           | The queue ID.                                                                                                                                                                                                                                |
| `body`                                                                                                                                                                                                                                       | [Operations\ResolveQueueItemsRequestBody](../../Models/Operations/ResolveQueueItemsRequestBody.md)                                                                                                                                           | :heavy_check_mark:                                                                                                                                                                                                                           | N/A                                                                                                                                                                                                                                          |
| `projectId`                                                                                                                                                                                                                                  | *?string*                                                                                                                                                                                                                                    | :heavy_minus_sign:                                                                                                                                                                                                                           | The project to act on, by ID or name. Required with an organization key unless the key reaches only one project; list projects with GET /projects. A project key acts on its own project and needs no value: naming another one is an error. |

### Response

**[?Operations\ResolveQueueItemsResponse](../../Models/Operations/ResolveQueueItemsResponse.md)**

### Errors

| Error Type                   | Status Code                  | Content Type                 |
| ---------------------------- | ---------------------------- | ---------------------------- |
| Errors\BadRequestError       | 400                          | application/json             |
| Errors\AuthenticationError   | 401                          | application/json             |
| Errors\PermissionDeniedError | 403                          | application/json             |
| Errors\RateLimitError        | 429                          | application/json             |
| Errors\InternalServerError   | 500                          | application/json             |
| Errors\APIException          | 4XX, 5XX                     | \*/\*                        |

## unresolve

Mark a resolved item of a queue as pending again. It is the same as removing a check-off in the dashboard: the item comes back in the pending list. `itemId` is the item `id` or your `contentId`.

### Example Usage

<!-- UsageSnippet language="php" operationID="unresolveQueueItem" method="post" path="/queue/{id}/items/{itemId}/unresolve" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use ModerationApi;

$sdk = ModerationApi\ModerationApi::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->queue->items->unresolve(
    id: '<id>',
    itemId: '<id>'

);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                                                                                                                        | Type                                                                                                                                                                                                                                             | Required                                                                                                                                                                                                                                         | Description                                                                                                                                                                                                                                      |
| ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| `id`                                                                                                                                                                                                                                             | *string*                                                                                                                                                                                                                                         | :heavy_check_mark:                                                                                                                                                                                                                               | The queue ID.                                                                                                                                                                                                                                    |
| `itemId`                                                                                                                                                                                                                                         | *string*                                                                                                                                                                                                                                         | :heavy_check_mark:                                                                                                                                                                                                                               | The item to unresolve: the item `id` from `GET /queue/{id}/items`, or the `contentId` you sent to `POST /moderate` (webhooks send it as `item.id`). For a content ID, the newest submission with that content ID is used, as the queue shows it. |
| `projectId`                                                                                                                                                                                                                                      | *?string*                                                                                                                                                                                                                                        | :heavy_minus_sign:                                                                                                                                                                                                                               | The project to act on, by ID or name. Required with an organization key unless the key reaches only one project; list projects with GET /projects. A project key acts on its own project and needs no value: naming another one is an error.     |

### Response

**[?Operations\UnresolveQueueItemResponse](../../Models/Operations/UnresolveQueueItemResponse.md)**

### Errors

| Error Type                   | Status Code                  | Content Type                 |
| ---------------------------- | ---------------------------- | ---------------------------- |
| Errors\BadRequestError       | 400                          | application/json             |
| Errors\AuthenticationError   | 401                          | application/json             |
| Errors\PermissionDeniedError | 403                          | application/json             |
| Errors\RateLimitError        | 429                          | application/json             |
| Errors\InternalServerError   | 500                          | application/json             |
| Errors\APIException          | 4XX, 5XX                     | \*/\*                        |