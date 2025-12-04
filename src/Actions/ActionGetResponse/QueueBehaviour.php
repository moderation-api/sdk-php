<?php

declare(strict_types=1);

namespace ModerationAPI\Actions\ActionGetResponse;

/**
 * Whether the action resolves and removes the item, unresolves and re-add it to the queue, or does not change the resolve status.
 */
enum QueueBehaviour: string
{
    case REMOVE = 'REMOVE';

    case ADD = 'ADD';

    case NO_CHANGE = 'NO_CHANGE';
}
