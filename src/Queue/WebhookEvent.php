<?php

declare(strict_types=1);

namespace ModerationAPI\Queue;

use ModerationAPI\Core\Concerns\SdkUnion;
use ModerationAPI\Core\Conversion\Contracts\Converter;
use ModerationAPI\Core\Conversion\Contracts\ConverterSource;
use ModerationAPI\Queue\WebhookEvent\AuthorActionEvent;
use ModerationAPI\Queue\WebhookEvent\AuthorBlockedEvent;
use ModerationAPI\Queue\WebhookEvent\AuthorSuspendedEvent;
use ModerationAPI\Queue\WebhookEvent\AuthorTrustLevelChangedEvent;
use ModerationAPI\Queue\WebhookEvent\AuthorUnblockedEvent;
use ModerationAPI\Queue\WebhookEvent\AuthorUpdatedEvent;
use ModerationAPI\Queue\WebhookEvent\QueueItemActionEvent;
use ModerationAPI\Queue\WebhookEvent\QueueItemAllowedEvent;
use ModerationAPI\Queue\WebhookEvent\QueueItemCompletedEvent;
use ModerationAPI\Queue\WebhookEvent\QueueItemRejectedEvent;

/**
 * Discriminated union of every v2 webhook event. Switch on `type` to narrow to a specific event shape.
 *
 * @phpstan-import-type AuthorBlockedEventShape from \ModerationAPI\Queue\WebhookEvent\AuthorBlockedEvent
 * @phpstan-import-type AuthorUnblockedEventShape from \ModerationAPI\Queue\WebhookEvent\AuthorUnblockedEvent
 * @phpstan-import-type AuthorSuspendedEventShape from \ModerationAPI\Queue\WebhookEvent\AuthorSuspendedEvent
 * @phpstan-import-type AuthorUpdatedEventShape from \ModerationAPI\Queue\WebhookEvent\AuthorUpdatedEvent
 * @phpstan-import-type AuthorTrustLevelChangedEventShape from \ModerationAPI\Queue\WebhookEvent\AuthorTrustLevelChangedEvent
 * @phpstan-import-type AuthorActionEventShape from \ModerationAPI\Queue\WebhookEvent\AuthorActionEvent
 * @phpstan-import-type QueueItemCompletedEventShape from \ModerationAPI\Queue\WebhookEvent\QueueItemCompletedEvent
 * @phpstan-import-type QueueItemActionEventShape from \ModerationAPI\Queue\WebhookEvent\QueueItemActionEvent
 * @phpstan-import-type QueueItemRejectedEventShape from \ModerationAPI\Queue\WebhookEvent\QueueItemRejectedEvent
 * @phpstan-import-type QueueItemAllowedEventShape from \ModerationAPI\Queue\WebhookEvent\QueueItemAllowedEvent
 *
 * @phpstan-type WebhookEventVariants = AuthorBlockedEvent|AuthorUnblockedEvent|AuthorSuspendedEvent|AuthorUpdatedEvent|AuthorTrustLevelChangedEvent|AuthorActionEvent|QueueItemCompletedEvent|QueueItemActionEvent|QueueItemRejectedEvent|QueueItemAllowedEvent
 * @phpstan-type WebhookEventShape = WebhookEventVariants|AuthorBlockedEventShape|AuthorUnblockedEventShape|AuthorSuspendedEventShape|AuthorUpdatedEventShape|AuthorTrustLevelChangedEventShape|AuthorActionEventShape|QueueItemCompletedEventShape|QueueItemActionEventShape|QueueItemRejectedEventShape|QueueItemAllowedEventShape
 */
final class WebhookEvent implements ConverterSource
{
    use SdkUnion;

    public static function discriminator(): string
    {
        return 'type';
    }

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            'author.blocked' => AuthorBlockedEvent::class,
            'author.unblocked' => AuthorUnblockedEvent::class,
            'author.suspended' => AuthorSuspendedEvent::class,
            'author.updated' => AuthorUpdatedEvent::class,
            'author.trust_level_changed' => AuthorTrustLevelChangedEvent::class,
            'author.action' => AuthorActionEvent::class,
            'queue_item.resolved' => QueueItemCompletedEvent::class,
            'queue_item.action' => QueueItemActionEvent::class,
            'queue_item.rejected' => QueueItemRejectedEvent::class,
            'queue_item.allowed' => QueueItemAllowedEvent::class,
        ];
    }
}
