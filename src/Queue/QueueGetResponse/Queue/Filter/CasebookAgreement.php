<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\QueueGetResponse\Queue\Filter;

enum CasebookAgreement: string
{
    case ALL = 'ALL';

    case OVERRULED = 'OVERRULED';

    case AGREED = 'AGREED';
}
