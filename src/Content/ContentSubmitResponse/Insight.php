<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse;

use ModerationAPI\Content\ContentSubmitResponse\Insight\LanguageInsight;
use ModerationAPI\Content\ContentSubmitResponse\Insight\SentimentInsight;
use ModerationAPI\Core\Concerns\SdkUnion;
use ModerationAPI\Core\Conversion\Contracts\Converter;
use ModerationAPI\Core\Conversion\Contracts\ConverterSource;

/**
 * Sentiment insight.
 */
final class Insight implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [SentimentInsight::class, LanguageInsight::class];
    }
}
