<?php

declare(strict_types=1);

namespace ModerationAPI\Actions\ActionUpdateResponse;

/**
 * Show the action in all queues, selected queues or no queues (to use via API only).
 */
enum Position: string
{
    case ALL_QUEUES = 'ALL_QUEUES';

    case SOME_QUEUES = 'SOME_QUEUES';

    case HIDDEN = 'HIDDEN';
}
