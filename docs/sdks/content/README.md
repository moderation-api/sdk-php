# Content

## Overview

### Available Operations

* [reject](#reject) - Reject content
* [allow](#allow) - Allow content
* [submit](#submit) - Submit content

## reject

Reject a content item with the built-in reject action, and resolve it in the review queue.

### Example Usage

<!-- UsageSnippet language="php" operationID="rejectContent" method="post" path="/content/{id}/reject" -->
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

$body = new Operations\RejectContentRequestBody(
    reason: 'Spam',
);

$response = $sdk->content->reject(
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
| `id`                                                                                                                                                                                                                                         | *string*                                                                                                                                                                                                                                     | :heavy_check_mark:                                                                                                                                                                                                                           | The content ID you sent when you submitted the content, or the ID Moderation API assigned.                                                                                                                                                   |
| `body`                                                                                                                                                                                                                                       | [Operations\RejectContentRequestBody](../../Models/Operations/RejectContentRequestBody.md)                                                                                                                                                   | :heavy_check_mark:                                                                                                                                                                                                                           | N/A                                                                                                                                                                                                                                          |
| `projectId`                                                                                                                                                                                                                                  | *?string*                                                                                                                                                                                                                                    | :heavy_minus_sign:                                                                                                                                                                                                                           | The project to act on, by ID or name. Required with an organization key unless the key reaches only one project; list projects with GET /projects. A project key acts on its own project and needs no value: naming another one is an error. |

### Response

**[?Operations\RejectContentResponse](../../Models/Operations/RejectContentResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\BadRequestError     | 400                        | application/json           |
| Errors\AuthenticationError | 401                        | application/json           |
| Errors\NotFoundError       | 404                        | application/json           |
| Errors\RateLimitError      | 429                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |

## allow

Allow a content item with the built-in allow action, and resolve it in the review queue.

### Example Usage

<!-- UsageSnippet language="php" operationID="allowContent" method="post" path="/content/{id}/allow" -->
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

$body = new Operations\AllowContentRequestBody();

$response = $sdk->content->allow(
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
| `id`                                                                                                                                                                                                                                         | *string*                                                                                                                                                                                                                                     | :heavy_check_mark:                                                                                                                                                                                                                           | The content ID you sent when you submitted the content, or the ID Moderation API assigned.                                                                                                                                                   |
| `body`                                                                                                                                                                                                                                       | [Operations\AllowContentRequestBody](../../Models/Operations/AllowContentRequestBody.md)                                                                                                                                                     | :heavy_check_mark:                                                                                                                                                                                                                           | N/A                                                                                                                                                                                                                                          |
| `projectId`                                                                                                                                                                                                                                  | *?string*                                                                                                                                                                                                                                    | :heavy_minus_sign:                                                                                                                                                                                                                           | The project to act on, by ID or name. Required with an organization key unless the key reaches only one project; list projects with GET /projects. A project key acts on its own project and needs no value: naming another one is an error. |

### Response

**[?Operations\AllowContentResponse](../../Models/Operations/AllowContentResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\BadRequestError     | 400                        | application/json           |
| Errors\AuthenticationError | 401                        | application/json           |
| Errors\NotFoundError       | 404                        | application/json           |
| Errors\RateLimitError      | 429                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |

## submit

Submit content

### Example Usage

<!-- UsageSnippet language="php" operationID="submitContent" method="post" path="/moderate" -->
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

$body = new Operations\SubmitContentRequestBody(
    content: new Operations\TextRequest(
        text: 'Hey, check out my profile for a deal!',
    ),
    contentId: 'message-48213',
    authorId: 'user-1092',
    conversationId: 'room-general',
    metadata: [
        'platform' => 'ios',
    ],
);

$response = $sdk->content->submit(
    body: $body
);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                                                                                                                    | Type                                                                                                                                                                                                                                         | Required                                                                                                                                                                                                                                     | Description                                                                                                                                                                                                                                  |
| -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `body`                                                                                                                                                                                                                                       | [Operations\SubmitContentRequestBody](../../Models/Operations/SubmitContentRequestBody.md)                                                                                                                                                   | :heavy_check_mark:                                                                                                                                                                                                                           | N/A                                                                                                                                                                                                                                          |
| `projectId`                                                                                                                                                                                                                                  | *?string*                                                                                                                                                                                                                                    | :heavy_minus_sign:                                                                                                                                                                                                                           | The project to act on, by ID or name. Required with an organization key unless the key reaches only one project; list projects with GET /projects. A project key acts on its own project and needs no value: naming another one is an error. |

### Response

**[?Operations\SubmitContentResponse](../../Models/Operations/SubmitContentResponse.md)**

### Errors

| Error Type                   | Status Code                  | Content Type                 |
| ---------------------------- | ---------------------------- | ---------------------------- |
| Errors\BadRequestError       | 400                          | application/json             |
| Errors\AuthenticationError   | 401                          | application/json             |
| Errors\PermissionDeniedError | 403                          | application/json             |
| Errors\RateLimitError        | 429                          | application/json             |
| Errors\InternalServerError   | 500                          | application/json             |
| Errors\APIException          | 4XX, 5XX                     | \*/\*                        |