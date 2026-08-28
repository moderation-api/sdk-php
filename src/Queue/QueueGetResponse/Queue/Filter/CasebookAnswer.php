<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\QueueGetResponse\Queue\Filter;

enum CasebookAnswer: string
{
    case ALL = 'ALL';

    case ALLOWED = 'ALLOWED';

    case REJECTED = 'REJECTED';

    case NO_ANSWER = 'NO_ANSWER';
}
