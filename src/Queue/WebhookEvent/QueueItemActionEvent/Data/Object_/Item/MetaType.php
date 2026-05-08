<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\WebhookEvent\QueueItemActionEvent\Data\Object_\Item;

/**
 * High-level content type (e.g. message, post, comment). Defaults to the channel's configured content type but can be overridden per request via the moderation API `type` field.
 */
enum MetaType: string
{
    case PROFILE = 'profile';

    case MESSAGE = 'message';

    case POST = 'post';

    case COMMENT = 'comment';

    case EVENT = 'event';

    case PRODUCT = 'product';

    case REVIEW = 'review';

    case OTHER = 'other';
}
