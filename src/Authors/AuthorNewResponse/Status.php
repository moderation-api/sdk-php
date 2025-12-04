<?php

declare(strict_types=1);

namespace ModerationAPI\Authors\AuthorNewResponse;

/**
 * Current author status.
 */
enum Status: string
{
    case ENABLED = 'enabled';

    case SUSPENDED = 'suspended';

    case BLOCKED = 'blocked';
}
