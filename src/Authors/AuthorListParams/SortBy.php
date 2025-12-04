<?php

declare(strict_types=1);

namespace ModerationAPI\Authors\AuthorListParams;

enum SortBy: string
{
    case TRUST_LEVEL = 'trustLevel';

    case VIOLATION_COUNT = 'violationCount';

    case REPORT_COUNT = 'reportCount';

    case MEMBER_SINCE = 'memberSince';

    case LAST_ACTIVE = 'lastActive';

    case CONTENT_COUNT = 'contentCount';

    case FLAGGED_CONTENT_RATIO = 'flaggedContentRatio';

    case AVERAGE_SENTIMENT = 'averageSentiment';
}
