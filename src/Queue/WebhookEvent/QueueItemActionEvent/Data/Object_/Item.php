<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\WebhookEvent\QueueItemActionEvent\Data\Object_;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Queue\WebhookEvent\QueueItemActionEvent\Data\Object_\Item\ClientAction;
use ModerationAPI\Queue\WebhookEvent\QueueItemActionEvent\Data\Object_\Item\Content\Audio;
use ModerationAPI\Queue\WebhookEvent\QueueItemActionEvent\Data\Object_\Item\Content\Image;
use ModerationAPI\Queue\WebhookEvent\QueueItemActionEvent\Data\Object_\Item\Content\Object_;
use ModerationAPI\Queue\WebhookEvent\QueueItemActionEvent\Data\Object_\Item\Content\Text;
use ModerationAPI\Queue\WebhookEvent\QueueItemActionEvent\Data\Object_\Item\Content\Video;
use ModerationAPI\Queue\WebhookEvent\QueueItemActionEvent\Data\Object_\Item\Label;
use ModerationAPI\Queue\WebhookEvent\QueueItemActionEvent\Data\Object_\Item\MetaType;

/**
 * The content item the action was performed on, if any.
 *
 * @phpstan-import-type ContentVariants from \ModerationAPI\Queue\WebhookEvent\QueueItemActionEvent\Data\Object_\Item\Content
 * @phpstan-import-type ClientActionShape from \ModerationAPI\Queue\WebhookEvent\QueueItemActionEvent\Data\Object_\Item\ClientAction
 * @phpstan-import-type ContentShape from \ModerationAPI\Queue\WebhookEvent\QueueItemActionEvent\Data\Object_\Item\Content
 * @phpstan-import-type LabelShape from \ModerationAPI\Queue\WebhookEvent\QueueItemActionEvent\Data\Object_\Item\Label
 *
 * @phpstan-type ItemShape = array{
 *   id: string,
 *   authorID: string|null,
 *   channelKey: string|null,
 *   clientAction: null|ClientAction|ClientActionShape,
 *   content: ContentShape,
 *   conversationID: string|null,
 *   flagged: bool|null,
 *   labels: list<Label|LabelShape>|null,
 *   language: string|null,
 *   metaType: null|MetaType|value-of<MetaType>,
 *   metadata: array<string,mixed>|null,
 *   timestamp: \DateTimeInterface,
 * }
 */
final class Item implements BaseModel
{
    /** @use SdkModel<ItemShape> */
    use SdkModel;

    /**
     * Content ID from your system.
     */
    #[Required]
    public string $id;

    /**
     * External author ID (the customer's identifier, not Moderation API's internal id).
     */
    #[Required('author_id')]
    public ?string $authorID;

    /**
     * The channel the content was submitted to, identified by your customer-defined channel key.
     */
    #[Required('channel_key')]
    public ?string $channelKey;

    /**
     * A recommendation from your own client-side flagging.
     */
    #[Required('client_action')]
    public ?ClientAction $clientAction;

    /**
     * The original content payload.
     *
     * @var ContentVariants $content
     */
    #[Required]
    public Text|Image|Video|Audio|Object_ $content;

    /**
     * Conversation grouping ID, if any.
     */
    #[Required('conversation_id')]
    public ?string $conversationID;

    /**
     * Whether the content was flagged by moderation.
     */
    #[Required]
    public ?bool $flagged;

    /**
     * Moderation labels applied to the content.
     *
     * @var list<Label>|null $labels
     */
    #[Required(list: Label::class)]
    public ?array $labels;

    /**
     * Detected ISO language code, if available.
     */
    #[Required]
    public ?string $language;

    /**
     * High-level content type (e.g. message, post, comment). Defaults to the channel's configured content type but can be overridden per request via the moderation API `type` field.
     *
     * @var value-of<MetaType>|null $metaType
     */
    #[Required('meta_type', enum: MetaType::class)]
    public ?string $metaType;

    /**
     * Arbitrary key/value metadata. Top-level keys are strings.
     *
     * @var array<string,mixed>|null $metadata
     */
    #[Required(map: 'mixed')]
    public ?array $metadata;

    /**
     * ISO 8601 timestamp of when the content was submitted.
     */
    #[Required]
    public \DateTimeInterface $timestamp;

    /**
     * `new Item()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Item::with(
     *   id: ...,
     *   authorID: ...,
     *   channelKey: ...,
     *   clientAction: ...,
     *   content: ...,
     *   conversationID: ...,
     *   flagged: ...,
     *   labels: ...,
     *   language: ...,
     *   metaType: ...,
     *   metadata: ...,
     *   timestamp: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Item)
     *   ->withID(...)
     *   ->withAuthorID(...)
     *   ->withChannelKey(...)
     *   ->withClientAction(...)
     *   ->withContent(...)
     *   ->withConversationID(...)
     *   ->withFlagged(...)
     *   ->withLabels(...)
     *   ->withLanguage(...)
     *   ->withMetaType(...)
     *   ->withMetadata(...)
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
     * @param ClientAction|ClientActionShape|null $clientAction
     * @param ContentShape $content
     * @param list<Label|LabelShape>|null $labels
     * @param MetaType|value-of<MetaType>|null $metaType
     * @param array<string,mixed>|null $metadata
     */
    public static function with(
        string $id,
        ?string $authorID,
        ?string $channelKey,
        ClientAction|array|null $clientAction,
        Text|array|Image|Video|Audio|Object_ $content,
        ?string $conversationID,
        ?bool $flagged,
        ?array $labels,
        ?string $language,
        MetaType|string|null $metaType,
        ?array $metadata,
        \DateTimeInterface $timestamp,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['authorID'] = $authorID;
        $self['channelKey'] = $channelKey;
        $self['clientAction'] = $clientAction;
        $self['content'] = $content;
        $self['conversationID'] = $conversationID;
        $self['flagged'] = $flagged;
        $self['labels'] = $labels;
        $self['language'] = $language;
        $self['metaType'] = $metaType;
        $self['metadata'] = $metadata;
        $self['timestamp'] = $timestamp;

        return $self;
    }

    /**
     * Content ID from your system.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * External author ID (the customer's identifier, not Moderation API's internal id).
     */
    public function withAuthorID(?string $authorID): self
    {
        $self = clone $this;
        $self['authorID'] = $authorID;

        return $self;
    }

    /**
     * The channel the content was submitted to, identified by your customer-defined channel key.
     */
    public function withChannelKey(?string $channelKey): self
    {
        $self = clone $this;
        $self['channelKey'] = $channelKey;

        return $self;
    }

    /**
     * A recommendation from your own client-side flagging.
     *
     * @param ClientAction|ClientActionShape|null $clientAction
     */
    public function withClientAction(
        ClientAction|array|null $clientAction
    ): self {
        $self = clone $this;
        $self['clientAction'] = $clientAction;

        return $self;
    }

    /**
     * The original content payload.
     *
     * @param ContentShape $content
     */
    public function withContent(
        Text|array|Image|Video|Audio|Object_ $content
    ): self {
        $self = clone $this;
        $self['content'] = $content;

        return $self;
    }

    /**
     * Conversation grouping ID, if any.
     */
    public function withConversationID(?string $conversationID): self
    {
        $self = clone $this;
        $self['conversationID'] = $conversationID;

        return $self;
    }

    /**
     * Whether the content was flagged by moderation.
     */
    public function withFlagged(?bool $flagged): self
    {
        $self = clone $this;
        $self['flagged'] = $flagged;

        return $self;
    }

    /**
     * Moderation labels applied to the content.
     *
     * @param list<Label|LabelShape>|null $labels
     */
    public function withLabels(?array $labels): self
    {
        $self = clone $this;
        $self['labels'] = $labels;

        return $self;
    }

    /**
     * Detected ISO language code, if available.
     */
    public function withLanguage(?string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * High-level content type (e.g. message, post, comment). Defaults to the channel's configured content type but can be overridden per request via the moderation API `type` field.
     *
     * @param MetaType|value-of<MetaType>|null $metaType
     */
    public function withMetaType(MetaType|string|null $metaType): self
    {
        $self = clone $this;
        $self['metaType'] = $metaType;

        return $self;
    }

    /**
     * Arbitrary key/value metadata. Top-level keys are strings.
     *
     * @param array<string,mixed>|null $metadata
     */
    public function withMetadata(?array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * ISO 8601 timestamp of when the content was submitted.
     */
    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }
}
