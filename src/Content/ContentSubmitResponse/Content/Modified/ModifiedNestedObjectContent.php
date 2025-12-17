<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse\Content\Modified;

use ModerationAPI\Content\ContentSubmitResponse\Content\Modified\ModifiedNestedObjectContent\Audio;
use ModerationAPI\Content\ContentSubmitResponse\Content\Modified\ModifiedNestedObjectContent\Image;
use ModerationAPI\Content\ContentSubmitResponse\Content\Modified\ModifiedNestedObjectContent\Text;
use ModerationAPI\Content\ContentSubmitResponse\Content\Modified\ModifiedNestedObjectContent\Video;
use ModerationAPI\Core\Concerns\SdkUnion;
use ModerationAPI\Core\Conversion\Contracts\Converter;
use ModerationAPI\Core\Conversion\Contracts\ConverterSource;

/**
 * Text.
 *
 * @phpstan-import-type TextShape from \ModerationAPI\Content\ContentSubmitResponse\Content\Modified\ModifiedNestedObjectContent\Text
 * @phpstan-import-type ImageShape from \ModerationAPI\Content\ContentSubmitResponse\Content\Modified\ModifiedNestedObjectContent\Image
 * @phpstan-import-type VideoShape from \ModerationAPI\Content\ContentSubmitResponse\Content\Modified\ModifiedNestedObjectContent\Video
 * @phpstan-import-type AudioShape from \ModerationAPI\Content\ContentSubmitResponse\Content\Modified\ModifiedNestedObjectContent\Audio
 *
 * @phpstan-type ModifiedNestedObjectContentShape = TextShape|ImageShape|VideoShape|AudioShape
 */
final class ModifiedNestedObjectContent implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [Text::class, Image::class, Video::class, Audio::class];
    }
}
