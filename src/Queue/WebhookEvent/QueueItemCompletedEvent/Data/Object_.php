<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\WebhookEvent\QueueItemCompletedEvent\Data;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Queue\WebhookEvent\QueueItemCompletedEvent\Data\Object_\Author;
use ModerationAPI\Queue\WebhookEvent\QueueItemCompletedEvent\Data\Object_\Item;
use ModerationAPI\Queue\WebhookEvent\QueueItemCompletedEvent\Data\Object_\Queue;

/**
 * @phpstan-import-type ItemShape from \ModerationAPI\Queue\WebhookEvent\QueueItemCompletedEvent\Data\Object_\Item
 * @phpstan-import-type AuthorShape from \ModerationAPI\Queue\WebhookEvent\QueueItemCompletedEvent\Data\Object_\Author
 * @phpstan-import-type QueueShape from \ModerationAPI\Queue\WebhookEvent\QueueItemCompletedEvent\Data\Object_\Queue
 *
 * @phpstan-type ObjectShape = array{
 *   item: Item|ItemShape,
 *   author?: null|Author|AuthorShape,
 *   queue?: null|Queue|QueueShape,
 * }
 */
final class Object_ implements BaseModel
{
    /** @use SdkModel<ObjectShape> */
    use SdkModel;

    #[Required]
    public Item $item;

    #[Optional]
    public ?Author $author;

    #[Optional]
    public ?Queue $queue;

    /**
     * `new Object_()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Object_::with(item: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Object_)->withItem(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Item|ItemShape $item
     * @param Author|AuthorShape|null $author
     * @param Queue|QueueShape|null $queue
     */
    public static function with(
        Item|array $item,
        Author|array|null $author = null,
        Queue|array|null $queue = null
    ): self {
        $self = new self;

        $self['item'] = $item;

        null !== $author && $self['author'] = $author;
        null !== $queue && $self['queue'] = $queue;

        return $self;
    }

    /**
     * @param Item|ItemShape $item
     */
    public function withItem(Item|array $item): self
    {
        $self = clone $this;
        $self['item'] = $item;

        return $self;
    }

    /**
     * @param Author|AuthorShape $author
     */
    public function withAuthor(Author|array $author): self
    {
        $self = clone $this;
        $self['author'] = $author;

        return $self;
    }

    /**
     * @param Queue|QueueShape $queue
     */
    public function withQueue(Queue|array $queue): self
    {
        $self = clone $this;
        $self['queue'] = $queue;

        return $self;
    }
}
