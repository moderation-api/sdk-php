<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\Items\ItemListParams;

enum SortField: string
{
    case CREATED_AT = 'createdAt';

    case SEVERITY = 'severity';

    case REVIEWED_AT = 'reviewedAt';
}
