<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\WebhookEvent\QueueItemRejectedEvent\Data\Object_\Item;

use ModerationAPI\Core\Concerns\SdkUnion;
use ModerationAPI\Core\Conversion\Contracts\Converter;
use ModerationAPI\Core\Conversion\Contracts\ConverterSource;
use ModerationAPI\Queue\WebhookEvent\QueueItemRejectedEvent\Data\Object_\Item\Content\Audio;
use ModerationAPI\Queue\WebhookEvent\QueueItemRejectedEvent\Data\Object_\Item\Content\Image;
use ModerationAPI\Queue\WebhookEvent\QueueItemRejectedEvent\Data\Object_\Item\Content\Object_;
use ModerationAPI\Queue\WebhookEvent\QueueItemRejectedEvent\Data\Object_\Item\Content\Text;
use ModerationAPI\Queue\WebhookEvent\QueueItemRejectedEvent\Data\Object_\Item\Content\Video;

/**
 * The original content payload.
 *
 * @phpstan-import-type TextShape from \ModerationAPI\Queue\WebhookEvent\QueueItemRejectedEvent\Data\Object_\Item\Content\Text
 * @phpstan-import-type ImageShape from \ModerationAPI\Queue\WebhookEvent\QueueItemRejectedEvent\Data\Object_\Item\Content\Image
 * @phpstan-import-type VideoShape from \ModerationAPI\Queue\WebhookEvent\QueueItemRejectedEvent\Data\Object_\Item\Content\Video
 * @phpstan-import-type AudioShape from \ModerationAPI\Queue\WebhookEvent\QueueItemRejectedEvent\Data\Object_\Item\Content\Audio
 * @phpstan-import-type ObjectShape from \ModerationAPI\Queue\WebhookEvent\QueueItemRejectedEvent\Data\Object_\Item\Content\Object_
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
