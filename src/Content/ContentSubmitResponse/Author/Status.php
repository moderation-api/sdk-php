<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse\Author;

/**
 * Current author status.
 */
enum Status: string
{
    case ENABLED = 'enabled';

    case SUSPENDED = 'suspended';

    case BLOCKED = 'blocked';
}
