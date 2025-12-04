<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse\Recommendation;

/**
 * The action to take based on the recommendation.
 */
enum Action: string
{
    case REVIEW = 'review';

    case ALLOW = 'allow';

    case REJECT = 'reject';
}
