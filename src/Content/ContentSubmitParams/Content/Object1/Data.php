<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Content\Object1;

use ModerationAPI\Content\ContentSubmitParams\Content\Object1\Data\Audio;
use ModerationAPI\Content\ContentSubmitParams\Content\Object1\Data\Image;
use ModerationAPI\Content\ContentSubmitParams\Content\Object1\Data\Text;
use ModerationAPI\Content\ContentSubmitParams\Content\Object1\Data\Video;
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
