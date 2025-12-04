<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\QueueGetResponse\Queue\Filter\FilterLabel;

enum Type: string
{
    case FLAGGED = 'FLAGGED';

    case NOT_FLAGGED = 'NOT_FLAGGED';

    case THRESHOLDS = 'THRESHOLDS';
}
