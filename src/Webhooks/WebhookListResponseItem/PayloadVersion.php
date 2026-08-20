<?php

declare(strict_types=1);

namespace ModerationAPI\Webhooks\WebhookListResponseItem;

/**
 * Payload envelope version. V2 is the Stripe-style envelope; V1 is the legacy flat shape and is read-only via this API.
 */
enum PayloadVersion: string
{
    case V1 = 'V1';

    case V2 = 'V2';
}
