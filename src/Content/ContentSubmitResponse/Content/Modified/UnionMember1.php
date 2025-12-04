<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse\Content\Modified;

use ModerationAPI\Content\ContentSubmitResponse\Content\Modified\UnionMember1\Audio;
use ModerationAPI\Content\ContentSubmitResponse\Content\Modified\UnionMember1\Image;
use ModerationAPI\Content\ContentSubmitResponse\Content\Modified\UnionMember1\Text;
use ModerationAPI\Content\ContentSubmitResponse\Content\Modified\UnionMember1\Video;
use ModerationAPI\Core\Concerns\SdkUnion;
use ModerationAPI\Core\Conversion\Contracts\Converter;
use ModerationAPI\Core\Conversion\Contracts\ConverterSource;

/**
 * Text.
 */
final class UnionMember1 implements ConverterSource
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
