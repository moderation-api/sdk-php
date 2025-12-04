<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\Items\ItemListResponse;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Queue\Items\ItemListResponse\Item\Action;
use ModerationAPI\Queue\Items\ItemListResponse\Item\Label;
use ModerationAPI\Queue\Items\ItemListResponse\Item\Status;

/**
 * @phpstan-type ItemShape = array{
 *   id: string,
 *   content: string,
 *   flagged: bool,
 *   labels: list<Label>,
 *   status: value-of<Status>,
 *   timestamp: float,
 *   actions?: list<Action>|null,
 *   authorId?: string|null,
 *   contentType?: string|null,
 *   conversationId?: string|null,
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
    #[Api]
    public string $id;

    /**
     * The content to be moderated.
     */
    #[Api]
    public string $content;

    /**
     * Whether the item is flagged by any label.
     */
    #[Api]
    public bool $flagged;

    /** @var list<Label> $labels */
    #[Api(list: Label::class)]
    public array $labels;

    /**
     * Status of the item.
     *
     * @var value-of<Status> $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    /**
     * Unix timestamp of when the item was created.
     */
    #[Api]
    public float $timestamp;

    /**
     * Action IDs taken on this item.
     *
     * @var list<Action>|null $actions
     */
    #[Api(list: Action::class, optional: true)]
    public ?array $actions;

    /**
     * Author ID.
     */
    #[Api(optional: true)]
    public ?string $authorId;

    /**
     * Type of the content object.
     */
    #[Api(optional: true)]
    public ?string $contentType;

    /**
     * Conversation ID.
     */
    #[Api(optional: true)]
    public ?string $conversationId;

    /**
     * Content language.
     */
    #[Api(optional: true)]
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
     * @param list<Label> $labels
     * @param Status|value-of<Status> $status
     * @param list<Action> $actions
     */
    public static function with(
        string $id,
        string $content,
        bool $flagged,
        array $labels,
        Status|string $status,
        float $timestamp,
        ?array $actions = null,
        ?string $authorId = null,
        ?string $contentType = null,
        ?string $conversationId = null,
        ?string $language = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->content = $content;
        $obj->flagged = $flagged;
        $obj->labels = $labels;
        $obj['status'] = $status;
        $obj->timestamp = $timestamp;

        null !== $actions && $obj->actions = $actions;
        null !== $authorId && $obj->authorId = $authorId;
        null !== $contentType && $obj->contentType = $contentType;
        null !== $conversationId && $obj->conversationId = $conversationId;
        null !== $language && $obj->language = $language;

        return $obj;
    }

    /**
     * Content ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The content to be moderated.
     */
    public function withContent(string $content): self
    {
        $obj = clone $this;
        $obj->content = $content;

        return $obj;
    }

    /**
     * Whether the item is flagged by any label.
     */
    public function withFlagged(bool $flagged): self
    {
        $obj = clone $this;
        $obj->flagged = $flagged;

        return $obj;
    }

    /**
     * @param list<Label> $labels
     */
    public function withLabels(array $labels): self
    {
        $obj = clone $this;
        $obj->labels = $labels;

        return $obj;
    }

    /**
     * Status of the item.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Unix timestamp of when the item was created.
     */
    public function withTimestamp(float $timestamp): self
    {
        $obj = clone $this;
        $obj->timestamp = $timestamp;

        return $obj;
    }

    /**
     * Action IDs taken on this item.
     *
     * @param list<Action> $actions
     */
    public function withActions(array $actions): self
    {
        $obj = clone $this;
        $obj->actions = $actions;

        return $obj;
    }

    /**
     * Author ID.
     */
    public function withAuthorID(string $authorID): self
    {
        $obj = clone $this;
        $obj->authorId = $authorID;

        return $obj;
    }

    /**
     * Type of the content object.
     */
    public function withContentType(string $contentType): self
    {
        $obj = clone $this;
        $obj->contentType = $contentType;

        return $obj;
    }

    /**
     * Conversation ID.
     */
    public function withConversationID(string $conversationID): self
    {
        $obj = clone $this;
        $obj->conversationId = $conversationID;

        return $obj;
    }

    /**
     * Content language.
     */
    public function withLanguage(string $language): self
    {
        $obj = clone $this;
        $obj->language = $language;

        return $obj;
    }
}
