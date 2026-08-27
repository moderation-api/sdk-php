<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\QueueGetResponse\Queue\Filter;

enum CasebookHandled: string
{
    case ALL = 'ALL';

    case ALLOWED = 'ALLOWED';

    case REJECTED = 'REJECTED';

    case OVERRULED = 'OVERRULED';
}
