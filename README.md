<!-- Start Custom [intro] -->
# Moderation API PHP SDK

[![Packagist](https://img.shields.io/packagist/v/moderation-api/sdk-php.svg)](https://packagist.org/packages/moderation-api/sdk-php)

The official PHP library for [Moderation API](https://moderationapi.com). Use it to moderate text, images, video and audio, manage authors, review queues, actions and wordlists, and verify webhooks.

- Get an API key in the [dashboard](https://dash.moderationapi.com).
- Read the [documentation](https://docs.moderationapi.com) and the [API reference](https://docs.moderationapi.com/api-reference/introduction).
<!-- End Custom [intro] -->

<!-- Start Summary [summary] -->
## Summary

Moderation API: Moderate text, images, video and audio in real time, manage authors, review queues and actions, and receive webhooks.

More information about the API can be found at https://docs.moderationapi.com
<!-- End Summary [summary] -->

<!-- Start Table of Contents [toc] -->
## Table of Contents
<!-- $toc-max-depth=2 -->
* [Moderation API PHP SDK](#moderation-api-php-sdk)
  * [SDK Installation](#sdk-installation)
  * [SDK Example Usage](#sdk-example-usage)
  * [Moderating content](#moderating-content)
  * [Verifying webhooks](#verifying-webhooks)
  * [Authentication](#authentication)
  * [Available Resources and Operations](#available-resources-and-operations)
  * [Pagination](#pagination)
  * [Error Handling](#error-handling)
  * [Server Selection](#server-selection)
  * [Timeouts](#timeouts)
  * [Requirements](#requirements)
  * [Support](#support)
* [Development](#development)
  * [Maturity](#maturity)
  * [Contributions](#contributions)

<!-- End Table of Contents [toc] -->

<!-- Start SDK Installation [installation] -->
## SDK Installation

The SDK relies on [Composer](https://getcomposer.org/) to manage its dependencies.

To install the SDK and add it as a dependency to an existing `composer.json` file:
```bash
composer require "moderation-api/sdk-php"
```
<!-- End SDK Installation [installation] -->

<!-- Start SDK Example Usage [usage] -->
## SDK Example Usage

### Example

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
<!-- End SDK Example Usage [usage] -->
<!-- Start Custom [guide] -->
## Moderating content

Use `content->submit` to moderate text, images, video, audio, or objects with several fields. All parameters except `content` are optional.

Pass your API key to `setSecurity`. The examples read it from the `MODAPI_SECRET_KEY` environment variable.

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use ModerationApi\ModerationApi;
use ModerationApi\Models\Operations;

$sdk = ModerationApi::builder()
    ->setSecurity(getenv('MODAPI_SECRET_KEY'))
    ->build();

// Text
$sdk->content->submit(new Operations\SubmitContentRequestBody(
    content: new Operations\TextRequest(text: 'Your text here'),
    contentId: 'message-123', // your ID for the content
    authorId: 'user-123', // your ID for the user who wrote it
    conversationId: 'room-123', // groups related content
    metadata: ['platform' => 'ios'],
));

// Image, video and audio: send a URL
$sdk->content->submit(new Operations\SubmitContentRequestBody(
    content: new Operations\ImageRequest(url: 'https://example.com/image.jpg'),
));
$sdk->content->submit(new Operations\SubmitContentRequestBody(
    content: new Operations\VideoRequest(url: 'https://example.com/video.mp4'),
));
$sdk->content->submit(new Operations\SubmitContentRequestBody(
    content: new Operations\AudioRequest(url: 'https://example.com/audio.mp3'),
));

// An object with several fields, moderated together
$sdk->content->submit(new Operations\SubmitContentRequestBody(
    content: new Operations\ObjectT(data: [
        'title' => new Operations\DataText(text: 'Post title'),
        'body' => new Operations\DataText(text: 'Post content'),
        'thumbnail' => new Operations\DataImage(url: 'https://example.com/thumb.jpg'),
    ]),
));
```

### Using the result

`evaluation->flagged` tells you if any policy flagged the content. `recommendation->action` is the action the API recommends after it applies your thresholds and rules: `allow`, `review` or `reject`.

```php
$response = $sdk->content->submit(new Operations\SubmitContentRequestBody(
    content: new Operations\TextRequest(text: 'Some content'),
));
$result = $response->object;

if ($result->evaluation->flagged) {
    echo "A policy flagged the content\n";
}

switch ($result->recommendation->action) {
    case Operations\SubmitContentRecommendationAction::Reject:
        // Block the content
        break;
    case Operations\SubmitContentRecommendationAction::Review:
        // Publish or hold it, and send it to a review queue
        break;
    case Operations\SubmitContentRecommendationAction::Allow:
        // Publish the content
        break;
}

foreach ($result->policies as $policy) {
    echo "{$policy->id}: flagged=" . var_export($policy->flagged, true) . "\n";
}
```

## Verifying webhooks

Moderation API signs every webhook delivery with your project's webhook signing secret. The signature is in the `modapi-signature` header.

### Webhook signing secret

Find the secret on the [API keys page in the dashboard](https://dash.moderationapi.com/project/latest/configure/api-keys), or get it with `$sdk->webhookSecret->retrieve()`. Store it in the `MODAPI_WEBHOOK_SECRET` environment variable. It is not your API key. Get it once, for example in a setup script, and do not call `retrieve` for each delivery, so verification does not depend on a call to the API. Keep it as secret as your API key: anyone with it can sign webhooks.

### Verify a delivery

`WebhookSignature::constructEvent` checks the signature against the raw body and returns the event as an array. It reads the secret from `MODAPI_WEBHOOK_SECRET`; to set it in code, pass it as the third argument. It throws `WebhookSignatureException` if the signature does not match.

```php
use ModerationApi\WebhookSignature;
use ModerationApi\WebhookSignatureException;

$payload = file_get_contents('php://input'); // the raw body, not parsed JSON
$signature = $_SERVER['HTTP_MODAPI_SIGNATURE'] ?? null;

try {
    $event = WebhookSignature::constructEvent($payload, $signature);
} catch (WebhookSignatureException $e) {
    http_response_code(400);
    exit;
}

error_log($event['type']);
http_response_code(200);
```
<!-- End Custom [guide] -->


<!-- Start Authentication [security] -->
## Authentication

### Per-Client Security Schemes

This SDK supports the following security scheme globally:

| Name        | Type | Scheme      |
| ----------- | ---- | ----------- |
| `secretKey` | http | HTTP Bearer |

To authenticate with the API the `secretKey` parameter must be set when initializing the SDK. For example:
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

$request = new Operations\ListAuthorsRequest();

$responses = $sdk->authors->list(
    request: $request
);


foreach ($responses as $response) {
    if ($response->statusCode === 200) {
        // handle response
    }
}
```
<!-- End Authentication [security] -->
<!-- Start Custom [auth] -->
### Project and organization keys

Moderation API has two kinds of API keys:

- A **project key** works with one project: content, authors, review queues, actions, wordlists, webhooks and the account. Most integrations need only this key.
- An **organization key** works with the [management API](https://docs.moderationapi.com/api-reference/management-api): projects and channels. It can also use any project's endpoints: name the project with `projectId`.

A project key can't call the management API: the API returns `403` with the code `organization_key_required`. If you use both kinds of key, create one client for each:

```php
use ModerationApi\ModerationApi;

// Project key
$sdk = ModerationApi::builder()
    ->setSecurity(getenv('MODAPI_SECRET_KEY'))
    ->build();

// Organization key
$management = ModerationApi::builder()
    ->setSecurity(getenv('MODAPI_ORGANIZATION_KEY'))
    ->build();

foreach ($management->projects->list() as $response) {
    foreach ($response->object->data as $project) {
        echo $project->id, ' ', $project->name, "\n";
    }
}
```

Create the organization client only where you manage projects and channels, for example in a setup script, and keep the organization key out of the code that moderates content.
<!-- End Custom [auth] -->


<!-- Start Available Resources and Operations [operations] -->
## Available Resources and Operations

<details open>
<summary>Available methods</summary>

### [Account](docs/sdks/account/README.md)

* [retrieve](docs/sdks/account/README.md#retrieve) - Get account details

### [Actions](docs/sdks/actions/README.md)

* [list](docs/sdks/actions/README.md#list) - List moderation actions
* [create](docs/sdks/actions/README.md#create) - Create an action
* [retrieve](docs/sdks/actions/README.md#retrieve) - Get an action
* [update](docs/sdks/actions/README.md#update) - Update an action
* [delete](docs/sdks/actions/README.md#delete) - Delete an action
* [execute](docs/sdks/actions/README.md#execute) - Execute moderation action

### [Authors](docs/sdks/authors/README.md)

* [list](docs/sdks/authors/README.md#list) - List authors
* [create](docs/sdks/authors/README.md#create) - Create a new author
* [retrieve](docs/sdks/authors/README.md#retrieve) - Get author details
* [update](docs/sdks/authors/README.md#update) - Update author details
* [delete](docs/sdks/authors/README.md#delete) - Delete an author

### [Channels](docs/sdks/channels/README.md)

* [list](docs/sdks/channels/README.md#list) - List channels
* [create](docs/sdks/channels/README.md#create) - Create a channel
* [retrieve](docs/sdks/channels/README.md#retrieve) - Get a channel
* [update](docs/sdks/channels/README.md#update) - Update a channel
* [delete](docs/sdks/channels/README.md#delete) - Delete a channel
* [duplicate](docs/sdks/channels/README.md#duplicate) - Duplicate a channel

### [Content](docs/sdks/content/README.md)

* [submit](docs/sdks/content/README.md#submit) - Submit content

### [Projects](docs/sdks/projects/README.md)

* [list](docs/sdks/projects/README.md#list) - List projects
* [create](docs/sdks/projects/README.md#create) - Create a project
* [retrieve](docs/sdks/projects/README.md#retrieve) - Get a project
* [update](docs/sdks/projects/README.md#update) - Update a project
* [delete](docs/sdks/projects/README.md#delete) - Delete a project
* [duplicate](docs/sdks/projects/README.md#duplicate) - Duplicate a project

#### [Projects.ApiKeys](docs/sdks/apikeys/README.md)

* [create](docs/sdks/apikeys/README.md#create) - Create a project API key

### [Queue](docs/sdks/queue/README.md)

* [retrieve](docs/sdks/queue/README.md#retrieve) - Get a queue
* [getStats](docs/sdks/queue/README.md#getstats) - Get queue statistics

#### [Queue.Items](docs/sdks/items/README.md)

* [list](docs/sdks/items/README.md#list) - Get queue items
* [resolve](docs/sdks/items/README.md#resolve) - Resolve a queue item
* [unresolve](docs/sdks/items/README.md#unresolve) - Unresolve a queue item

### [Webhooks](docs/sdks/webhooks/README.md)

* [list](docs/sdks/webhooks/README.md#list) - List webhooks
* [create](docs/sdks/webhooks/README.md#create) - Create a webhook
* [retrieve](docs/sdks/webhooks/README.md#retrieve) - Get a webhook
* [update](docs/sdks/webhooks/README.md#update) - Update a webhook
* [delete](docs/sdks/webhooks/README.md#delete) - Delete a webhook

### [WebhookSecret](docs/sdks/webhooksecret/README.md)

* [retrieve](docs/sdks/webhooksecret/README.md#retrieve) - Get the webhook signing secret

### [Wordlist](docs/sdks/wordlist/README.md)

* [list](docs/sdks/wordlist/README.md#list) - List wordlists
* [retrieve](docs/sdks/wordlist/README.md#retrieve) - Get wordlist
* [update](docs/sdks/wordlist/README.md#update) - Update wordlist
* [getEmbeddingStatus](docs/sdks/wordlist/README.md#getembeddingstatus) - Get embedding status

#### [Wordlist.Words](docs/sdks/words/README.md)

* [add](docs/sdks/words/README.md#add) - Add words to wordlist
* [remove](docs/sdks/words/README.md#remove) - Remove words from wordlist

</details>
<!-- End Available Resources and Operations [operations] -->

<!-- Start Pagination [pagination] -->
## Pagination

Some of the endpoints in this SDK support pagination. To use pagination, you make your SDK calls as usual, but the
returned object will be a `Generator` instead of an individual response.

Working with generators is as simple as iterating over the responses in a `foreach` loop, and you can see an example below:
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

$request = new Operations\ListAuthorsRequest();

$responses = $sdk->authors->list(
    request: $request
);


foreach ($responses as $response) {
    if ($response->statusCode === 200) {
        // handle response
    }
}
```
<!-- End Pagination [pagination] -->

<!-- Start Error Handling [errors] -->
## Error Handling

Handling errors in this SDK should largely match your expectations. All operations return a response object or throw an exception.

By default an API error will raise a `Errors\APIException` exception, which has the following properties:

| Property       | Type                                    | Description           |
|----------------|-----------------------------------------|-----------------------|
| `$message`     | *string*                                | The error message     |
| `$statusCode`  | *int*                                   | The HTTP status code  |
| `$rawResponse` | *?\Psr\Http\Message\ResponseInterface*  | The raw HTTP response |
| `$body`        | *string*                                | The response content  |

When custom error responses are specified for an operation, the SDK may also throw their associated exception. You can refer to respective *Errors* tables in SDK docs for more details on possible exception types for each operation. For example, the `list` method throws the following exceptions:

| Error Type                   | Status Code | Content Type     |
| ---------------------------- | ----------- | ---------------- |
| Errors\BadRequestError       | 400         | application/json |
| Errors\AuthenticationError   | 401         | application/json |
| Errors\PermissionDeniedError | 403         | application/json |
| Errors\NotFoundError         | 404         | application/json |
| Errors\RateLimitError        | 429         | application/json |
| Errors\InternalServerError   | 500         | application/json |
| Errors\APIException          | 4XX, 5XX    | \*/\*            |

### Example

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use ModerationApi;
use ModerationApi\Models\Errors;
use ModerationApi\Models\Operations;

$sdk = ModerationApi\ModerationApi::builder()
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();

try {
    $request = new Operations\ListAuthorsRequest();

    $responses = $sdk->authors->list(
        request: $request
    );

    foreach ($responses as $response) {
        if ($response->statusCode === 200) {
            // handle response
        }
    }
} catch (Errors\BadRequestErrorThrowable $e) {
    // handle $e->$container data
    throw $e;
} catch (Errors\AuthenticationErrorThrowable $e) {
    // handle $e->$container data
    throw $e;
} catch (Errors\PermissionDeniedErrorThrowable $e) {
    // handle $e->$container data
    throw $e;
} catch (Errors\NotFoundErrorThrowable $e) {
    // handle $e->$container data
    throw $e;
} catch (Errors\RateLimitErrorThrowable $e) {
    // handle $e->$container data
    throw $e;
} catch (Errors\InternalServerErrorThrowable $e) {
    // handle $e->$container data
    throw $e;
} catch (Errors\APIException $e) {
    // handle default exception
    throw $e;
}
```
<!-- End Error Handling [errors] -->

<!-- Start Server Selection [server] -->
## Server Selection

### Override Server URL Per-Client

The default server can be overridden globally using the `setServerUrl(string $serverUrl)` builder method when initializing the SDK client instance. For example:
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use ModerationApi;
use ModerationApi\Models\Operations;

$sdk = ModerationApi\ModerationApi::builder()
    ->setServerURL('https://api.moderationapi.com/v1')
    ->setSecurity(
        '<YOUR_BEARER_TOKEN_HERE>'
    )
    ->build();

$request = new Operations\ListAuthorsRequest();

$responses = $sdk->authors->list(
    request: $request
);


foreach ($responses as $response) {
    if ($response->statusCode === 200) {
        // handle response
    }
}
```
<!-- End Server Selection [server] -->

<!-- Placeholder for Future Speakeasy SDK Sections -->

<!-- Start Custom [more] -->
## Timeouts

The SDK sends requests with [Guzzle](https://docs.guzzlephp.org). To set a timeout, give the builder your own client:

```php
$sdk = ModerationApi::builder()
    ->setSecurity(getenv('MODAPI_SECRET_KEY'))
    ->setClient(new \GuzzleHttp\Client(['timeout' => 10]))
    ->build();
```

## Requirements

PHP 8.2 or later.


## Support

- [API reference](https://docs.moderationapi.com/api-reference/introduction)
- [Errors and error codes](https://docs.moderationapi.com/api-reference/errors)
- [Rate limits](https://docs.moderationapi.com/api-reference/rate-limits)
- [Guides](https://docs.moderationapi.com/get-started/introduction)
- Email [support@moderationapi.com](mailto:support@moderationapi.com)

Found a bug? Open an issue in this repository. This package is generated from the [Moderation API OpenAPI spec](https://api.moderationapi.com/v1/openapi.json), so pull requests to the generated code can't be merged as they are, but we use them to fix the generator.
<!-- End Custom [more] -->

# Development

## Maturity

This SDK is in beta, and there may be breaking changes between versions without a major version update. Therefore, we recommend pinning usage
to a specific package version. This way, you can install the same version each time without breaking changes unless you are intentionally
looking for the latest version.

## Contributions

While we value open-source contributions to this SDK, this library is generated programmatically. Any manual changes added to internal files will be overwritten on the next generation. 
We look forward to hearing your feedback. Feel free to open a PR or an issue with a proof of concept and we'll do our best to include it in a future release. 

### SDK Created by [Speakeasy](https://www.speakeasy.com/?utm_source=moderation-api/sdk-php&utm_campaign=php)
