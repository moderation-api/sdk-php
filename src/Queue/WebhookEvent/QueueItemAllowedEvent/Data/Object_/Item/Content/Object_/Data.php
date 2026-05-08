<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\WebhookEvent\QueueItemAllowedEvent\Data\Object_\Item\Content\Object_;

use ModerationAPI\Core\Concerns\SdkUnion;
use ModerationAPI\Core\Conversion\Contracts\Converter;
use ModerationAPI\Core\Conversion\Contracts\ConverterSource;
use ModerationAPI\Queue\WebhookEvent\QueueItemAllowedEvent\Data\Object_\Item\Content\Object_\Data\Audio;
use ModerationAPI\Queue\WebhookEvent\QueueItemAllowedEvent\Data\Object_\Item\Content\Object_\Data\Image;
use ModerationAPI\Queue\WebhookEvent\QueueItemAllowedEvent\Data\Object_\Item\Content\Object_\Data\Text;
use ModerationAPI\Queue\WebhookEvent\QueueItemAllowedEvent\Data\Object_\Item\Content\Object_\Data\Video;

/**
 * Text.
 *
 * @phpstan-import-type TextShape from \ModerationAPI\Queue\WebhookEvent\QueueItemAllowedEvent\Data\Object_\Item\Content\Object_\Data\Text
 * @phpstan-import-type ImageShape from \ModerationAPI\Queue\WebhookEvent\QueueItemAllowedEvent\Data\Object_\Item\Content\Object_\Data\Image
 * @phpstan-import-type VideoShape from \ModerationAPI\Queue\WebhookEvent\QueueItemAllowedEvent\Data\Object_\Item\Content\Object_\Data\Video
 * @phpstan-import-type AudioShape from \ModerationAPI\Queue\WebhookEvent\QueueItemAllowedEvent\Data\Object_\Item\Content\Object_\Data\Audio
 *
 * @phpstan-type DataVariants = Text|Image|Video|Audio
 * @phpstan-type DataShape = DataVariants|TextShape|ImageShape|VideoShape|AudioShape
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
