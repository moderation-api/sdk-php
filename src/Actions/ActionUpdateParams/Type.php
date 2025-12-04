<?php

declare(strict_types=1);

namespace ModerationAPI\Actions\ActionUpdateParams;

/**
 * The type of the action.
 */
enum Type: string
{
    case AUTHOR_BLOCK = 'AUTHOR_BLOCK';

    case AUTHOR_BLOCK_TEMP = 'AUTHOR_BLOCK_TEMP';

    case AUTHOR_UNBLOCK = 'AUTHOR_UNBLOCK';

    case AUTHOR_DELETE = 'AUTHOR_DELETE';

    case AUTHOR_REPORT = 'AUTHOR_REPORT';

    case AUTHOR_WARN = 'AUTHOR_WARN';

    case AUTHOR_CUSTOM = 'AUTHOR_CUSTOM';

    case ITEM_REJECT = 'ITEM_REJECT';

    case ITEM_ALLOW = 'ITEM_ALLOW';

    case ITEM_CUSTOM = 'ITEM_CUSTOM';
}
