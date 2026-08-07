<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\QueueGetResponse\Queue\Filter;

enum MediaType: string
{
    case TEXT = 'text';

    case IMAGE = 'image';

    case VIDEO = 'video';

    case OBJECT = 'object';

    case AUDIO = 'audio';
}
