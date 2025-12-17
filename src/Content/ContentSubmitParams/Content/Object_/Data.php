<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Content\Object_;

use ModerationAPI\Content\ContentSubmitParams\Content\Object_\Data\Audio;
use ModerationAPI\Content\ContentSubmitParams\Content\Object_\Data\Image;
use ModerationAPI\Content\ContentSubmitParams\Content\Object_\Data\Text;
use ModerationAPI\Content\ContentSubmitParams\Content\Object_\Data\Video;
use ModerationAPI\Core\Concerns\SdkUnion;
use ModerationAPI\Core\Conversion\Contracts\Converter;
use ModerationAPI\Core\Conversion\Contracts\ConverterSource;

/**
 * Text.
 *
 * @phpstan-import-type TextShape from \ModerationAPI\Content\ContentSubmitParams\Content\Object_\Data\Text
 * @phpstan-import-type ImageShape from \ModerationAPI\Content\ContentSubmitParams\Content\Object_\Data\Image
 * @phpstan-import-type VideoShape from \ModerationAPI\Content\ContentSubmitParams\Content\Object_\Data\Video
 * @phpstan-import-type AudioShape from \ModerationAPI\Content\ContentSubmitParams\Content\Object_\Data\Audio
 *
 * @phpstan-type DataShape = TextShape|ImageShape|VideoShape|AudioShape
 */
final class Data implements ConverterSource
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
