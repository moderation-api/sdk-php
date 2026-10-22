# Channels

## Overview

### Available Operations

* [list](#list) - List channels
* [create](#create) - Create a channel
* [retrieve](#retrieve) - Get a channel
* [update](#update) - Update a channel
* [delete](#delete) - Delete a channel
* [duplicate](#duplicate) - Duplicate a channel

## list

List the channels in a project. The list is paginated. Needs the `channels:read` permission.

### Example Usage

<!-- UsageSnippet language="php" operationID="listChannels" method="get" path="/projects/{projectId}/channels" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use ModerationApi;

$sdk = ModerationApi\ModerationApi::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$responses = $sdk->channels->list(
    projectId: '<id>',
    page: 1,
    pageSize: 20

);


foreach ($responses as $response) {
    if ($response->statusCode === 200) {
        // handle response
    }
}
```

### Parameters

| Parameter              | Type                   | Required               | Description            |
| ---------------------- | ---------------------- | ---------------------- | ---------------------- |
| `projectId`            | *string*               | :heavy_check_mark:     | The ID of the project. |
| `page`                 | *?int*                 | :heavy_minus_sign:     | N/A                    |
| `pageSize`             | *?int*                 | :heavy_minus_sign:     | N/A                    |

### Response

**[?Operations\ListChannelsResponse](../../Models/Operations/ListChannelsResponse.md)**

### Errors

| Error Type                   | Status Code                  | Content Type                 |
| ---------------------------- | ---------------------------- | ---------------------------- |
| Errors\AuthenticationError   | 401                          | application/json             |
| Errors\PermissionDeniedError | 403                          | application/json             |
| Errors\NotFoundError         | 404                          | application/json             |
| Errors\RateLimitError        | 429                          | application/json             |
| Errors\APIException          | 4XX, 5XX                     | \*/\*                        |

## create

Create a channel in a project, with the default rules. The project's first channel becomes its default. Needs the `channels:write` permission.

### Example Usage

<!-- UsageSnippet language="php" operationID="createChannel" method="post" path="/projects/{projectId}/channels" -->
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

$body = new Operations\CreateChannelRequestBody(
    name: '<value>',
);

$response = $sdk->channels->create(
    projectId: '<id>',
    body: $body

);

if ($response->channel !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                  | Type                                                                                       | Required                                                                                   | Description                                                                                |
| ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ |
| `projectId`                                                                                | *string*                                                                                   | :heavy_check_mark:                                                                         | The ID of the project to add the channel to.                                               |
| `body`                                                                                     | [Operations\CreateChannelRequestBody](../../Models/Operations/CreateChannelRequestBody.md) | :heavy_check_mark:                                                                         | N/A                                                                                        |

### Response

**[?Operations\CreateChannelResponse](../../Models/Operations/CreateChannelResponse.md)**

### Errors

| Error Type                   | Status Code                  | Content Type                 |
| ---------------------------- | ---------------------------- | ---------------------------- |
| Errors\BadRequestError       | 400                          | application/json             |
| Errors\AuthenticationError   | 401                          | application/json             |
| Errors\PermissionDeniedError | 403                          | application/json             |
| Errors\NotFoundError         | 404                          | application/json             |
| Errors\RateLimitError        | 429                          | application/json             |
| Errors\APIException          | 4XX, 5XX                     | \*/\*                        |

## retrieve

Get a channel by ID. Needs the `channels:read` permission.

### Example Usage

<!-- UsageSnippet language="php" operationID="getChannel" method="get" path="/channels/{id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use ModerationApi;

$sdk = ModerationApi\ModerationApi::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->channels->retrieve(
    id: '<id>'
);

if ($response->channel !== null) {
    // handle response
}
```

### Parameters

| Parameter              | Type                   | Required               | Description            |
| ---------------------- | ---------------------- | ---------------------- | ---------------------- |
| `id`                   | *string*               | :heavy_check_mark:     | The ID of the channel. |

### Response

**[?Operations\GetChannelResponse](../../Models/Operations/GetChannelResponse.md)**

### Errors

| Error Type                   | Status Code                  | Content Type                 |
| ---------------------------- | ---------------------------- | ---------------------------- |
| Errors\AuthenticationError   | 401                          | application/json             |
| Errors\PermissionDeniedError | 403                          | application/json             |
| Errors\NotFoundError         | 404                          | application/json             |
| Errors\RateLimitError        | 429                          | application/json             |
| Errors\APIException          | 4XX, 5XX                     | \*/\*                        |

## update

Update a channel. Fields you leave out keep their value. Needs the `channels:write` permission.

### Example Usage

<!-- UsageSnippet language="php" operationID="updateChannel" method="put" path="/channels/{id}" -->
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

$body = new Operations\UpdateChannelRequestBody();

$response = $sdk->channels->update(
    id: '<id>',
    body: $body

);

if ($response->channel !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                  | Type                                                                                       | Required                                                                                   | Description                                                                                |
| ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ |
| `id`                                                                                       | *string*                                                                                   | :heavy_check_mark:                                                                         | The ID of the channel to update.                                                           |
| `body`                                                                                     | [Operations\UpdateChannelRequestBody](../../Models/Operations/UpdateChannelRequestBody.md) | :heavy_check_mark:                                                                         | N/A                                                                                        |

### Response

**[?Operations\UpdateChannelResponse](../../Models/Operations/UpdateChannelResponse.md)**

### Errors

| Error Type                   | Status Code                  | Content Type                 |
| ---------------------------- | ---------------------------- | ---------------------------- |
| Errors\BadRequestError       | 400                          | application/json             |
| Errors\AuthenticationError   | 401                          | application/json             |
| Errors\PermissionDeniedError | 403                          | application/json             |
| Errors\NotFoundError         | 404                          | application/json             |
| Errors\RateLimitError        | 429                          | application/json             |
| Errors\APIException          | 4XX, 5XX                     | \*/\*                        |

## delete

Delete a channel. Its key is freed for a new channel. When it was the default, the oldest remaining channel becomes the default. A channel that still moderates a Slack workspace must be disconnected first. Needs the `channels:write` permission.

### Example Usage

<!-- UsageSnippet language="php" operationID="deleteChannel" method="delete" path="/channels/{id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use ModerationApi;

$sdk = ModerationApi\ModerationApi::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->channels->delete(
    id: '<id>'
);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter              | Type                   | Required               | Description            |
| ---------------------- | ---------------------- | ---------------------- | ---------------------- |
| `id`                   | *string*               | :heavy_check_mark:     | The ID of the channel. |

### Response

**[?Operations\DeleteChannelResponse](../../Models/Operations/DeleteChannelResponse.md)**

### Errors

| Error Type                   | Status Code                  | Content Type                 |
| ---------------------------- | ---------------------------- | ---------------------------- |
| Errors\BadRequestError       | 400                          | application/json             |
| Errors\AuthenticationError   | 401                          | application/json             |
| Errors\PermissionDeniedError | 403                          | application/json             |
| Errors\NotFoundError         | 404                          | application/json             |
| Errors\RateLimitError        | 429                          | application/json             |
| Errors\APIException          | 4XX, 5XX                     | \*/\*                        |

## duplicate

Copy a channel in its project, with every setting, policy, rule and wordlist. Integrations (Discord, Slack, WordPress) are not copied. Needs the `channels:write` permission.

### Example Usage

<!-- UsageSnippet language="php" operationID="duplicateChannel" method="post" path="/channels/{id}/duplicate" -->
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

$body = new Operations\DuplicateChannelRequestBody();

$response = $sdk->channels->duplicate(
    id: '<id>',
    body: $body

);

if ($response->channel !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                        | Type                                                                                             | Required                                                                                         | Description                                                                                      |
| ------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------ |
| `id`                                                                                             | *string*                                                                                         | :heavy_check_mark:                                                                               | The ID of the channel to copy.                                                                   |
| `body`                                                                                           | [Operations\DuplicateChannelRequestBody](../../Models/Operations/DuplicateChannelRequestBody.md) | :heavy_check_mark:                                                                               | N/A                                                                                              |

### Response

**[?Operations\DuplicateChannelResponse](../../Models/Operations/DuplicateChannelResponse.md)**

### Errors

| Error Type                   | Status Code                  | Content Type                 |
| ---------------------------- | ---------------------------- | ---------------------------- |
| Errors\BadRequestError       | 400                          | application/json             |
| Errors\AuthenticationError   | 401                          | application/json             |
| Errors\PermissionDeniedError | 403                          | application/json             |
| Errors\NotFoundError         | 404                          | application/json             |
| Errors\RateLimitError        | 429                          | application/json             |
| Errors\APIException          | 4XX, 5XX                     | \*/\*                        |