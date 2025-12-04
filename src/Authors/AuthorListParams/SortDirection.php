<?php

declare(strict_types=1);

namespace ModerationAPI\Authors\AuthorListParams;

/**
 * Sort direction.
 */
enum SortDirection: string
{
    case ASC = 'asc';

    case DESC = 'desc';
}
