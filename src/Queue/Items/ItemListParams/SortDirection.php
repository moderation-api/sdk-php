<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\Items\ItemListParams;

/**
 * Sort direction.
 */
enum SortDirection: string
{
    case ASC = 'asc';

    case DESC = 'desc';
}
