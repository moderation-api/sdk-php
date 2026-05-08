<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\WebhookEvent\QueueItemRejectedEvent\Data;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Queue\WebhookEvent\QueueItemRejectedEvent\Data\Object_\Author;
use ModerationAPI\Queue\WebhookEvent\QueueItemRejectedEvent\Data\Object_\Item;
use ModerationAPI\Queue\WebhookEvent\QueueItemRejectedEvent\Data\Object_\Queue;

/**
 * @phpstan-import-type AuthorShape from \ModerationAPI\Queue\WebhookEvent\QueueItemRejectedEvent\Data\Object_\Author
 * @phpstan-import-type ItemShape from \ModerationAPI\Queue\WebhookEvent\QueueItemRejectedEvent\Data\Object_\Item
 * @phpstan-import-type QueueShape from \ModerationAPI\Queue\WebhookEvent\QueueItemRejectedEvent\Data\Object_\Queue
 *
 * @phpstan-type ObjectShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   key: string|null,
 *   name: string|null,
 *   value: string|null,
 *   author?: null|Author|AuthorShape,
 *   item?: null|Item|ItemShape,
 *   queue?: null|Queue|QueueShape,
 * }
 */
final class Object_ implements BaseModel
{
    /** @use SdkModel<ObjectShape> */
    use SdkModel;

    /**
     * Moderation action ID.
     */
    #[Required]
    public string $id;

    /**
     * ISO 8601 timestamp of when the action was performed.
     */
    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * Customer-defined key identifying this action.
     */
    #[Required]
    public ?string $key;

    /**
     * Display name of the action.
     */
    #[Required]
    public ?string $name;

    /**
     * The value passed to the action when it ran.
     */
    #[Required]
    public ?string $value;

    /**
     * The author the action was performed on, if any.
     */
    #[Optional]
    public ?Author $author;

    /**
     * The content item the action was performed on, if any.
     */
    #[Optional]
    public ?Item $item;

    /**
     * The queue the item belongs to, if any.
     */
    #[Optional]
    public ?Queue $queue;

    /**
     * `new Object_()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Object_::with(id: ..., createdAt: ..., key: ..., name: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Object_)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withKey(...)
     *   ->withName(...)
     *   ->withValue(...)
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
     * @param Author|AuthorShape|null $author
     * @param Item|ItemShape|null $item
     * @param Queue|QueueShape|null $queue
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        ?string $key,
        ?string $name,
        ?string $value,
        Author|array|null $author = null,
        Item|array|null $item = null,
        Queue|array|null $queue = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['key'] = $key;
        $self['name'] = $name;
        $self['value'] = $value;

        null !== $author && $self['author'] = $author;
        null !== $item && $self['item'] = $item;
        null !== $queue && $self['queue'] = $queue;

        return $self;
    }

    /**
     * Moderation action ID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * ISO 8601 timestamp of when the action was performed.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Customer-defined key identifying this action.
     */
    public function withKey(?string $key): self
    {
        $self = clone $this;
        $self['key'] = $key;

        return $self;
    }

    /**
     * Display name of the action.
     */
    public function withName(?string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The value passed to the action when it ran.
     */
    public function withValue(?string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }

    /**
     * The author the action was performed on, if any.
     *
     * @param Author|AuthorShape $author
     */
    public function withAuthor(Author|array $author): self
    {
        $self = clone $this;
        $self['author'] = $author;

        return $self;
    }

    /**
     * The content item the action was performed on, if any.
     *
     * @param Item|ItemShape $item
     */
    public function withItem(Item|array $item): self
    {
        $self = clone $this;
        $self['item'] = $item;

        return $self;
    }

    /**
     * The queue the item belongs to, if any.
     *
     * @param Queue|QueueShape $queue
     */
    public function withQueue(Queue|array $queue): self
    {
        $self = clone $this;
        $self['queue'] = $queue;

        return $self;
    }
}
