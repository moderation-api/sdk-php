<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams;

use ModerationAPI\Content\ContentSubmitParams\Content\Audio;
use ModerationAPI\Content\ContentSubmitParams\Content\Image;
use ModerationAPI\Content\ContentSubmitParams\Content\Object_;
use ModerationAPI\Content\ContentSubmitParams\Content\Text;
use ModerationAPI\Content\ContentSubmitParams\Content\Video;
use ModerationAPI\Core\Concerns\SdkUnion;
use ModerationAPI\Core\Conversion\Contracts\Converter;
use ModerationAPI\Core\Conversion\Contracts\ConverterSource;

/**
 * The content sent for moderation.
 *
 * @phpstan-import-type TextShape from \ModerationAPI\Content\ContentSubmitParams\Content\Text
 * @phpstan-import-type ImageShape from \ModerationAPI\Content\ContentSubmitParams\Content\Image
 * @phpstan-import-type VideoShape from \ModerationAPI\Content\ContentSubmitParams\Content\Video
 * @phpstan-import-type AudioShape from \ModerationAPI\Content\ContentSubmitParams\Content\Audio
 * @phpstan-import-type ObjectShape from \ModerationAPI\Content\ContentSubmitParams\Content\Object_
 *
 * @phpstan-type ContentVariants = Text|Image|Video|Audio|Object_
 * @phpstan-type ContentShape = ContentVariants|TextShape|ImageShape|VideoShape|AudioShape|ObjectShape
 */
final class Content implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            Text::class, Image::class, Video::class, Audio::class, Object_::class,
        ];
    }
}
