<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\QueueGetResponse\Queue\Filter;

enum CasebookHandled: string
{
    case ALL = 'ALL';

    case HANDLED = 'HANDLED';

    case WOULD_HAVE_HANDLED = 'WOULD_HAVE_HANDLED';
}
