<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\QueueGetResponse\Queue\Filter;

enum CheckStatus: string
{
    case ALL = 'all';

    case CHECKED = 'checked';

    case UNCHECKED = 'unchecked';
}
