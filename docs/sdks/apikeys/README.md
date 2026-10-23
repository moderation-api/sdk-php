# Projects.ApiKeys

## Overview

### Available Operations

* [create](#create) - Create a project API key

## create

Create a new secret API key for a project and return it. Give each app or computer its own key, so you can revoke one without breaking the others. The project's existing keys keep working. Needs the `projects:write` permission.

### Example Usage

<!-- UsageSnippet language="php" operationID="createProjectApiKey" method="post" path="/projects/{id}/api-keys" -->
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

$body = new Operations\CreateProjectApiKeyRequestBody();

$response = $sdk->projects->apiKeys->create(
    id: '<id>',
    body: $body

);

if ($response->projectApiKey !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                              | Type                                                                                                   | Required                                                                                               | Description                                                                                            |
| ------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------ |
| `id`                                                                                                   | *string*                                                                                               | :heavy_check_mark:                                                                                     | The ID of the project.                                                                                 |
| `body`                                                                                                 | [Operations\CreateProjectApiKeyRequestBody](../../Models/Operations/CreateProjectApiKeyRequestBody.md) | :heavy_check_mark:                                                                                     | N/A                                                                                                    |

### Response

**[?Operations\CreateProjectApiKeyResponse](../../Models/Operations/CreateProjectApiKeyResponse.md)**

### Errors

| Error Type                   | Status Code                  | Content Type                 |
| ---------------------------- | ---------------------------- | ---------------------------- |
| Errors\BadRequestError       | 400                          | application/json             |
| Errors\AuthenticationError   | 401                          | application/json             |
| Errors\PermissionDeniedError | 403                          | application/json             |
| Errors\NotFoundError         | 404                          | application/json             |
| Errors\RateLimitError        | 429                          | application/json             |
| Errors\APIException          | 4XX, 5XX                     | \*/\*                        |