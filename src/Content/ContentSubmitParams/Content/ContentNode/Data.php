<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Content\ContentNode;

use ModerationAPI\Content\ContentSubmitParams\Content\ContentNode\Data\Audio;
use ModerationAPI\Content\ContentSubmitParams\Content\ContentNode\Data\Image;
use ModerationAPI\Content\ContentSubmitParams\Content\ContentNode\Data\Text;
use ModerationAPI\Content\ContentSubmitParams\Content\ContentNode\Data\Video;
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
