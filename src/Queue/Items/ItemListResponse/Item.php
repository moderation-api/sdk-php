<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\Items\ItemListResponse;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Queue\Items\ItemListResponse\Item\Action;
use ModerationAPI\Queue\Items\ItemListResponse\Item\Label;
use ModerationAPI\Queue\Items\ItemListResponse\Item\Status;

/**
 * @phpstan-import-type LabelShape from \ModerationAPI\Queue\Items\ItemListResponse\Item\Label
 * @phpstan-import-type ActionShape from \ModerationAPI\Queue\Items\ItemListResponse\Item\Action
 *
 * @phpstan-type ItemShape = array{
 *   id: string,
 *   content: string,
 *   flagged: bool,
 *   labels: list<LabelShape>,
 *   status: Status|value-of<Status>,
 *   timestamp: float,
 *   actions?: list<ActionShape>|null,
 *   authorID?: string|null,
 *   contentType?: string|null,
 *   conversationID?: string|null,
 *   language?: string|null,
 * }
 */
final class Item implements BaseModel
{
    /** @use SdkModel<ItemShape> */
    use SdkModel;

    /**
     * Content ID.
     */
    #[Required]
    public string $id;

    /**
     * The content to be moderated.
     */
    #[Required]
    public string $content;

    /**
     * Whether the item is flagged by any label.
     */
    #[Required]
    public bool $flagged;

    /** @var list<Label> $labels */
    #[Required(list: Label::class)]
    public array $labels;

    /**
     * Status of the item.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * Unix timestamp of when the item was created.
     */
    #[Required]
    public float $timestamp;

    /**
     * Action IDs taken on this item.
     *
     * @var list<Action>|null $actions
     */
    #[Optional(list: Action::class)]
    public ?array $actions;

    /**
     * Author ID.
     */
    #[Optional('authorId')]
    public ?string $authorID;

    /**
     * Type of the content object.
     */
    #[Optional]
    public ?string $contentType;

    /**
     * Conversation ID.
     */
    #[Optional('conversationId')]
    public ?string $conversationID;

    /**
     * Content language.
     */
    #[Optional]
    public ?string $language;

    /**
     * `new Item()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Item::with(
     *   id: ..., content: ..., flagged: ..., labels: ..., status: ..., timestamp: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Item)
     *   ->withID(...)
     *   ->withContent(...)
     *   ->withFlagged(...)
     *   ->withLabels(...)
     *   ->withStatus(...)
     *   ->withTimestamp(...)
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
     * @param list<LabelShape> $labels
     * @param Status|value-of<Status> $status
     * @param list<ActionShape>|null $actions
     */
    public static function with(
        string $id,
        string $content,
        bool $flagged,
        array $labels,
        Status|string $status,
        float $timestamp,
        ?array $actions = null,
        ?string $authorID = null,
        ?string $contentType = null,
        ?string $conversationID = null,
        ?string $language = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['content'] = $content;
        $self['flagged'] = $flagged;
        $self['labels'] = $labels;
        $self['status'] = $status;
        $self['timestamp'] = $timestamp;

        null !== $actions && $self['actions'] = $actions;
        null !== $authorID && $self['authorID'] = $authorID;
        null !== $contentType && $self['contentType'] = $contentType;
        null !== $conversationID && $self['conversationID'] = $conversationID;
        null !== $language && $self['language'] = $language;

        return $self;
    }

    /**
     * Content ID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The content to be moderated.
     */
    public function withContent(string $content): self
    {
        $self = clone $this;
        $self['content'] = $content;

        return $self;
    }

    /**
     * Whether the item is flagged by any label.
     */
    public function withFlagged(bool $flagged): self
    {
        $self = clone $this;
        $self['flagged'] = $flagged;

        return $self;
    }

    /**
     * @param list<LabelShape> $labels
     */
    public function withLabels(array $labels): self
    {
        $self = clone $this;
        $self['labels'] = $labels;

        return $self;
    }

    /**
     * Status of the item.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Unix timestamp of when the item was created.
     */
    public function withTimestamp(float $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }

    /**
     * Action IDs taken on this item.
     *
     * @param list<ActionShape> $actions
     */
    public function withActions(array $actions): self
    {
        $self = clone $this;
        $self['actions'] = $actions;

        return $self;
    }

    /**
     * Author ID.
     */
    public function withAuthorID(string $authorID): self
    {
        $self = clone $this;
        $self['authorID'] = $authorID;

        return $self;
    }

    /**
     * Type of the content object.
     */
    public function withContentType(string $contentType): self
    {
        $self = clone $this;
        $self['contentType'] = $contentType;

        return $self;
    }

    /**
     * Conversation ID.
     */
    public function withConversationID(string $conversationID): self
    {
        $self = clone $this;
        $self['conversationID'] = $conversationID;

        return $self;
    }

    /**
     * Content language.
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }
}
