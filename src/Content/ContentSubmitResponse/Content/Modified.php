<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse\Content;

use ModerationAPI\Content\ContentSubmitResponse\Content\Modified\ModifiedNestedObjectContent;
use ModerationAPI\Content\ContentSubmitResponse\Content\Modified\ModifiedNestedObjectContent\Audio;
use ModerationAPI\Content\ContentSubmitResponse\Content\Modified\ModifiedNestedObjectContent\Image;
use ModerationAPI\Content\ContentSubmitResponse\Content\Modified\ModifiedNestedObjectContent\Text;
use ModerationAPI\Content\ContentSubmitResponse\Content\Modified\ModifiedNestedObjectContent\Video;
use ModerationAPI\Core\Concerns\SdkUnion;
use ModerationAPI\Core\Conversion\Contracts\Converter;
use ModerationAPI\Core\Conversion\Contracts\ConverterSource;
use ModerationAPI\Core\Conversion\MapOf;

/**
 * The modified content, if any.
 *
 * @phpstan-import-type ModifiedNestedObjectContentShape from \ModerationAPI\Content\ContentSubmitResponse\Content\Modified\ModifiedNestedObjectContent
 *
 * @phpstan-type ModifiedVariants = string|array<string,mixed>|array<string,Text|Image|Video|Audio>
 * @phpstan-type ModifiedShape = ModifiedVariants|array<string,ModifiedNestedObjectContentShape>
 */
final class Modified implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'string',
            new MapOf('mixed'),
            new MapOf(ModifiedNestedObjectContent::class),
        ];
    }
}
