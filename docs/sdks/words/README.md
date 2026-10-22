# Wordlist.Words

## Overview

### Available Operations

* [add](#add) - Add words to wordlist
* [remove](#remove) - Remove words from wordlist

## add

Add words to an existing wordlist

### Example Usage

<!-- UsageSnippet language="php" operationID="addWordlistWords" method="post" path="/wordlist/{id}/words" -->
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

$body = new Operations\AddWordlistWordsRequestBody(
    words: [
        'free money',
        'click here',
    ],
);

$response = $sdk->wordlist->words->add(
    id: '<id>',
    body: $body

);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                                                             | Type                                                                                                                                                                                  | Required                                                                                                                                                                              | Description                                                                                                                                                                           |
| ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `id`                                                                                                                                                                                  | *string*                                                                                                                                                                              | :heavy_check_mark:                                                                                                                                                                    | ID of the wordlist to add words to                                                                                                                                                    |
| `body`                                                                                                                                                                                | [Operations\AddWordlistWordsRequestBody](../../Models/Operations/AddWordlistWordsRequestBody.md)                                                                                      | :heavy_check_mark:                                                                                                                                                                    | N/A                                                                                                                                                                                   |
| `projectId`                                                                                                                                                                           | *?string*                                                                                                                                                                             | :heavy_minus_sign:                                                                                                                                                                    | The project to act on, when you call with an organization key. Optional when the organization has one project. A project key acts on its own project: naming another one is an error. |

### Response

**[?Operations\AddWordlistWordsResponse](../../Models/Operations/AddWordlistWordsResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\BadRequestError     | 400                        | application/json           |
| Errors\AuthenticationError | 401                        | application/json           |
| Errors\NotFoundError       | 404                        | application/json           |
| Errors\RateLimitError      | 429                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |

## remove

Remove words from an existing wordlist

### Example Usage

<!-- UsageSnippet language="php" operationID="removeWordlistWords" method="delete" path="/wordlist/{id}/words" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use ModerationApi;

$sdk = ModerationApi\ModerationApi::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->wordlist->words->remove(
    id: '<id>',
    words: [
        '<value 1>',
        '<value 2>',
        '<value 3>',
    ]

);

if ($response->object !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                                                             | Type                                                                                                                                                                                  | Required                                                                                                                                                                              | Description                                                                                                                                                                           |
| ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `id`                                                                                                                                                                                  | *string*                                                                                                                                                                              | :heavy_check_mark:                                                                                                                                                                    | ID of the wordlist to remove words from                                                                                                                                               |
| `words`                                                                                                                                                                               | array<*string*>                                                                                                                                                                       | :heavy_check_mark:                                                                                                                                                                    | Array of words to remove from the wordlist                                                                                                                                            |
| `projectId`                                                                                                                                                                           | *?string*                                                                                                                                                                             | :heavy_minus_sign:                                                                                                                                                                    | The project to act on, when you call with an organization key. Optional when the organization has one project. A project key acts on its own project: naming another one is an error. |

### Response

**[?Operations\RemoveWordlistWordsResponse](../../Models/Operations/RemoveWordlistWordsResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\BadRequestError     | 400                        | application/json           |
| Errors\AuthenticationError | 401                        | application/json           |
| Errors\NotFoundError       | 404                        | application/json           |
| Errors\RateLimitError      | 429                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |