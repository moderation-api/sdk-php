# Projects

## Overview

### Available Operations

* [list](#list) - List projects
* [create](#create) - Create a project
* [retrieve](#retrieve) - Get a project
* [update](#update) - Update a project
* [delete](#delete) - Delete a project
* [duplicate](#duplicate) - Duplicate a project

## list

List the projects in the organization. The list is paginated. Needs the `projects:read` permission.

### Example Usage

<!-- UsageSnippet language="php" operationID="listProjects" method="get" path="/projects" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use ModerationApi;

$sdk = ModerationApi\ModerationApi::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$responses = $sdk->projects->list(
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

| Parameter          | Type               | Required           | Description        |
| ------------------ | ------------------ | ------------------ | ------------------ |
| `page`             | *?int*             | :heavy_minus_sign: | N/A                |
| `pageSize`         | *?int*             | :heavy_minus_sign: | N/A                |

### Response

**[?Operations\ListProjectsResponse](../../Models/Operations/ListProjectsResponse.md)**

### Errors

| Error Type                   | Status Code                  | Content Type                 |
| ---------------------------- | ---------------------------- | ---------------------------- |
| Errors\AuthenticationError   | 401                          | application/json             |
| Errors\PermissionDeniedError | 403                          | application/json             |
| Errors\RateLimitError        | 429                          | application/json             |
| Errors\APIException          | 4XX, 5XX                     | \*/\*                        |

## create

Create a project with one channel, a review queue inbox and a secret API key. Give a domain or context and the project suggests policies for the platform. Needs the `projects:write` permission and a key that reaches all projects.

### Example Usage

<!-- UsageSnippet language="php" operationID="createProject" method="post" path="/projects" -->
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

$request = new Operations\CreateProjectRequest(
    name: '<value>',
);

$response = $sdk->projects->create(
    request: $request
);

if ($response->projectWithKey !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                          | Type                                                                               | Required                                                                           | Description                                                                        |
| ---------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------- |
| `$request`                                                                         | [Operations\CreateProjectRequest](../../Models/Operations/CreateProjectRequest.md) | :heavy_check_mark:                                                                 | The request object to use for the request.                                         |

### Response

**[?Operations\CreateProjectResponse](../../Models/Operations/CreateProjectResponse.md)**

### Errors

| Error Type                   | Status Code                  | Content Type                 |
| ---------------------------- | ---------------------------- | ---------------------------- |
| Errors\BadRequestError       | 400                          | application/json             |
| Errors\AuthenticationError   | 401                          | application/json             |
| Errors\PermissionDeniedError | 403                          | application/json             |
| Errors\RateLimitError        | 429                          | application/json             |
| Errors\APIException          | 4XX, 5XX                     | \*/\*                        |

## retrieve

Get a project by ID. Needs the `projects:read` permission.

### Example Usage

<!-- UsageSnippet language="php" operationID="getProject" method="get" path="/projects/{id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use ModerationApi;

$sdk = ModerationApi\ModerationApi::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->projects->retrieve(
    id: '<id>'
);

if ($response->project !== null) {
    // handle response
}
```

### Parameters

| Parameter              | Type                   | Required               | Description            |
| ---------------------- | ---------------------- | ---------------------- | ---------------------- |
| `id`                   | *string*               | :heavy_check_mark:     | The ID of the project. |

### Response

**[?Operations\GetProjectResponse](../../Models/Operations/GetProjectResponse.md)**

### Errors

| Error Type                   | Status Code                  | Content Type                 |
| ---------------------------- | ---------------------------- | ---------------------------- |
| Errors\AuthenticationError   | 401                          | application/json             |
| Errors\PermissionDeniedError | 403                          | application/json             |
| Errors\NotFoundError         | 404                          | application/json             |
| Errors\RateLimitError        | 429                          | application/json             |
| Errors\APIException          | 4XX, 5XX                     | \*/\*                        |

## update

Update a project. Fields you leave out keep their value. Needs the `projects:write` permission.

### Example Usage

<!-- UsageSnippet language="php" operationID="updateProject" method="put" path="/projects/{id}" -->
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

$body = new Operations\UpdateProjectRequestBody();

$response = $sdk->projects->update(
    id: '<id>',
    body: $body

);

if ($response->project !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                  | Type                                                                                       | Required                                                                                   | Description                                                                                |
| ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ |
| `id`                                                                                       | *string*                                                                                   | :heavy_check_mark:                                                                         | The ID of the project to update.                                                           |
| `body`                                                                                     | [Operations\UpdateProjectRequestBody](../../Models/Operations/UpdateProjectRequestBody.md) | :heavy_check_mark:                                                                         | N/A                                                                                        |

### Response

**[?Operations\UpdateProjectResponse](../../Models/Operations/UpdateProjectResponse.md)**

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

Delete a project with everything in it: channels, queues, API keys and stored content. This can't be undone. The project's API keys stop working at once. Needs the `projects:write` permission.

### Example Usage

<!-- UsageSnippet language="php" operationID="deleteProject" method="delete" path="/projects/{id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use ModerationApi;

$sdk = ModerationApi\ModerationApi::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->projects->delete(
    id: '<id>'
);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter              | Type                   | Required               | Description            |
| ---------------------- | ---------------------- | ---------------------- | ---------------------- |
| `id`                   | *string*               | :heavy_check_mark:     | The ID of the project. |

### Response

**[?Operations\DeleteProjectResponse](../../Models/Operations/DeleteProjectResponse.md)**

### Errors

| Error Type                   | Status Code                  | Content Type                 |
| ---------------------------- | ---------------------------- | ---------------------------- |
| Errors\AuthenticationError   | 401                          | application/json             |
| Errors\PermissionDeniedError | 403                          | application/json             |
| Errors\NotFoundError         | 404                          | application/json             |
| Errors\RateLimitError        | 429                          | application/json             |
| Errors\APIException          | 4XX, 5XX                     | \*/\*                        |

## duplicate

Copy a project's configuration into a new project: its settings, every channel with its policies, rules and wordlists, its moderation actions and its review queues. The copy gets its own secret API key. Webhooks, integrations, API keys and content are not copied. Needs the `projects:write` permission and a key that reaches all projects.

### Example Usage

<!-- UsageSnippet language="php" operationID="duplicateProject" method="post" path="/projects/{id}/duplicate" -->
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

$body = new Operations\DuplicateProjectRequestBody();

$response = $sdk->projects->duplicate(
    id: '<id>',
    body: $body

);

if ($response->projectWithKey !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                        | Type                                                                                             | Required                                                                                         | Description                                                                                      |
| ------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------ |
| `id`                                                                                             | *string*                                                                                         | :heavy_check_mark:                                                                               | The ID of the project to copy.                                                                   |
| `body`                                                                                           | [Operations\DuplicateProjectRequestBody](../../Models/Operations/DuplicateProjectRequestBody.md) | :heavy_check_mark:                                                                               | N/A                                                                                              |

### Response

**[?Operations\DuplicateProjectResponse](../../Models/Operations/DuplicateProjectResponse.md)**

### Errors

| Error Type                   | Status Code                  | Content Type                 |
| ---------------------------- | ---------------------------- | ---------------------------- |
| Errors\BadRequestError       | 400                          | application/json             |
| Errors\AuthenticationError   | 401                          | application/json             |
| Errors\PermissionDeniedError | 403                          | application/json             |
| Errors\NotFoundError         | 404                          | application/json             |
| Errors\RateLimitError        | 429                          | application/json             |
| Errors\APIException          | 4XX, 5XX                     | \*/\*                        |