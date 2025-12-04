<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse\Insight\SentimentInsight;

enum Value: string
{
    case POSITIVE = 'positive';

    case NEUTRAL = 'neutral';

    case NEGATIVE = 'negative';
}
