<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\QueueGetResponse\Queue\Filter;

enum RecommendationAction: string
{
    case REVIEW = 'review';

    case ALLOW = 'allow';

    case REJECT = 'reject';
}
