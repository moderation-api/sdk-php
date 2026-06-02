<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\WebhookEvent\QueueItemRejectedEvent\Data\Object_\Item\ClientAction;

/**
 * How your recommendation combines with ours. Defaults to 'escalate', which only applies it when stricter than ours; 'override' replaces ours outright.
 */
enum Behavior: string
{
    case OVERRIDE = 'override';

    case ESCALATE = 'escalate';
}
