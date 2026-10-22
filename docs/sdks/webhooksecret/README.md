# WebhookSecret

## Overview

### Available Operations

* [retrieve](#retrieve) - Get the webhook signing secret

## retrieve

Get the signing secret used to sign webhook deliveries for this project, creating one if none exists yet. Verify deliveries by comparing the `modapi-signature` header to HMAC-SHA256(raw request body, secret) hex-encoded.

### Example Usage

<!-- UsageSnippet language="php" operationID="getWebhookSecret" method="get" path="/webhook-secret" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use ModerationApi;

$sdk = ModerationApi\ModerationApi::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();



$response = $sdk->webhookSecret->retrieve(

);

if ($response->object !== null) {
    // handle response
}
```

### Response

**[?Operations\GetWebhookSecretResponse](../../Models/Operations/GetWebhookSecretResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\AuthenticationError | 401                        | application/json           |
| Errors\RateLimitError      | 429                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |