# Wordlist

## Overview

### Available Operations

* [list](#list) - List wordlists
* [retrieve](#retrieve) - Get wordlist
* [update](#update) - Update wordlist
* [getEmbeddingStatus](#getembeddingstatus) - Get embedding status

## list

List the wordlists of the organization. The list is paginated.

### Example Usage

<!-- UsageSnippet language="php" operationID="listWordlists" method="get" path="/wordlist" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use ModerationApi;

$sdk = ModerationApi\ModerationApi::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$responses = $sdk->wordlist->list(
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

**[?Operations\ListWordlistsResponse](../../Models/Operations/ListWordlistsResponse.md)**

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

## retrieve

Get a specific wordlist by ID

### Example Usage

<!-- UsageSnippet language="php" operationID="getWordlist" method="get" path="/wordlist/{id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use ModerationApi;

$sdk = ModerationApi\ModerationApi::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->wordlist->retrieve(
    id: '<id>'
);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter                 | Type                      | Required                  | Description               |
| ------------------------- | ------------------------- | ------------------------- | ------------------------- |
| `id`                      | *string*                  | :heavy_check_mark:        | ID of the wordlist to get |

### Response

**[?Operations\GetWordlistResponse](../../Models/Operations/GetWordlistResponse.md)**

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

## update

Update a wordlist

### Example Usage

<!-- UsageSnippet language="php" operationID="updateWordlist" method="put" path="/wordlist/{id}" -->
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

$body = new Operations\UpdateWordlistRequestBody();

$response = $sdk->wordlist->update(
    id: '<id>',
    body: $body

);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                    | Type                                                                                         | Required                                                                                     | Description                                                                                  |
| -------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------- |
| `id`                                                                                         | *string*                                                                                     | :heavy_check_mark:                                                                           | ID of the wordlist to update                                                                 |
| `body`                                                                                       | [Operations\UpdateWordlistRequestBody](../../Models/Operations/UpdateWordlistRequestBody.md) | :heavy_check_mark:                                                                           | N/A                                                                                          |

### Response

**[?Operations\UpdateWordlistResponse](../../Models/Operations/UpdateWordlistResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\BadRequestError     | 400                        | application/json           |
| Errors\AuthenticationError | 401                        | application/json           |
| Errors\NotFoundError       | 404                        | application/json           |
| Errors\RateLimitError      | 429                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |

## getEmbeddingStatus

Get the current embedding progress status for a wordlist

### Example Usage

<!-- UsageSnippet language="php" operationID="getWordlistEmbeddingStatus" method="get" path="/wordlist/{id}/embedding-status" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use ModerationApi;

$sdk = ModerationApi\ModerationApi::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->wordlist->getEmbeddingStatus(
    id: '<id>'
);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter                                        | Type                                             | Required                                         | Description                                      |
| ------------------------------------------------ | ------------------------------------------------ | ------------------------------------------------ | ------------------------------------------------ |
| `id`                                             | *string*                                         | :heavy_check_mark:                               | ID of the wordlist to check embedding status for |

### Response

**[?Operations\GetWordlistEmbeddingStatusResponse](../../Models/Operations/GetWordlistEmbeddingStatusResponse.md)**

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