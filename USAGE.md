<!-- Start SDK Example Usage [usage] -->
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