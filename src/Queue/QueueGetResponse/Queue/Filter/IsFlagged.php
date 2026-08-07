<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\QueueGetResponse\Queue\Filter;

enum IsFlagged: string
{
    case ALL = 'ALL';

    case FLAGGED = 'FLAGGED';

    case NOT_FLAGGED = 'NOT_FLAGGED';

    case SHADOW_FLAGGED = 'SHADOW_FLAGGED';
}
