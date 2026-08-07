<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\QueueGetResponse\Queue\Filter;

enum WithinUnit: string
{
    case MINUTES = 'MINUTES';

    case HOURS = 'HOURS';

    case DAYS = 'DAYS';

    case WEEKS = 'WEEKS';

    case MONTHS = 'MONTHS';

    case YEARS = 'YEARS';
}
