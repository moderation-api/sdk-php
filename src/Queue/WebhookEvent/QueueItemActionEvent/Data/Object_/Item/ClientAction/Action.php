<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\WebhookEvent\QueueItemActionEvent\Data\Object_\Item\ClientAction;

/**
 * Your recommendation for the content: allow, review, or reject.
 */
enum Action: string
{
    case REVIEW = 'review';

    case ALLOW = 'allow';

    case REJECT = 'reject';
}
