<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams;

use ModerationAPI\Content\ContentSubmitParams\Content\Audio;
use ModerationAPI\Content\ContentSubmitParams\Content\Image;
use ModerationAPI\Content\ContentSubmitParams\Content\Object1;
use ModerationAPI\Content\ContentSubmitParams\Content\Text;
use ModerationAPI\Content\ContentSubmitParams\Content\Video;
use ModerationAPI\Core\Concerns\SdkUnion;
use ModerationAPI\Core\Conversion\Contracts\Converter;
use ModerationAPI\Core\Conversion\Contracts\ConverterSource;

/**
 * The content sent for moderation.
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
            Text::class, Image::class, Video::class, Audio::class, Object1::class,
        ];
    }
}
