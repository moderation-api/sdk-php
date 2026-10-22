# Content

## Overview

### Available Operations

* [submit](#submit)

## submit

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

$request = new Operations\SubmitContentRequest(
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
    request: $request
);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                          | Type                                                                               | Required                                                                           | Description                                                                        |
| ---------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------- |
| `$request`                                                                         | [Operations\SubmitContentRequest](../../Models/Operations/SubmitContentRequest.md) | :heavy_check_mark:                                                                 | The request object to use for the request.                                         |

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