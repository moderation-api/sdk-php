<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\Items\ItemListResponse\Item;

/**
 * Status of the item.
 */
enum Status: string
{
    case PENDING = 'pending';

    case RESOLVED = 'resolved';
}
