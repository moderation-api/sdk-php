# Account

## Overview

### Available Operations

* [retrieve](#retrieve) - Get account details

## retrieve

Get account details

### Example Usage

<!-- UsageSnippet language="php" operationID="getAccount" method="get" path="/account" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use ModerationApi;

$sdk = ModerationApi\ModerationApi::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->account->retrieve(

);

if ($response->object !== null) {
    // handle response
}
```

### Response

**[?Operations\GetAccountResponse](../../Models/Operations/GetAccountResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\AuthenticationError | 401                        | application/json           |
| Errors\RateLimitError      | 429                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |