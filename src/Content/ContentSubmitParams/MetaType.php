<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams;

/**
 * The meta type of content being moderated.
 */
enum MetaType: string
{
    case PROFILE = 'profile';

    case MESSAGE = 'message';

    case POST = 'post';

    case COMMENT = 'comment';

    case EVENT = 'event';

    case PRODUCT = 'product';

    case REVIEW = 'review';

    case OTHER = 'other';
}
