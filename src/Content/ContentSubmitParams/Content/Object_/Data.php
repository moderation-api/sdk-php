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
