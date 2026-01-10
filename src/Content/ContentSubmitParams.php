<?php

declare(strict_types=1);

namespace ModerationAPI\Content;

use ModerationAPI\Content\ContentSubmitParams\Content\Audio;
use ModerationAPI\Content\ContentSubmitParams\Content\Image;
use ModerationAPI\Content\ContentSubmitParams\Content\Object_;
use ModerationAPI\Content\ContentSubmitParams\Content\Text;
use ModerationAPI\Content\ContentSubmitParams\Content\Video;
use ModerationAPI\Content\ContentSubmitParams\MetaType;
use ModerationAPI\Content\ContentSubmitParams\Policy;
use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkParams;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @see ModerationAPI\Services\ContentService::submit()
 *
 * @phpstan-import-type ContentVariants from \ModerationAPI\Content\ContentSubmitParams\Content
 * @phpstan-import-type PolicyVariants from \ModerationAPI\Content\ContentSubmitParams\Policy
 * @phpstan-import-type ContentShape from \ModerationAPI\Content\ContentSubmitParams\Content
 * @phpstan-import-type PolicyShape from \ModerationAPI\Content\ContentSubmitParams\Policy
 *
 * @phpstan-type ContentSubmitParamsShape = array{
 *   content: ContentShape,
 *   authorID?: string|null,
 *   channel?: string|null,
 *   contentID?: string|null,
 *   conversationID?: string|null,
 *   doNotStore?: bool|null,
 *   metadata?: array<string,mixed>|null,
 *   metaType?: null|MetaType|value-of<MetaType>,
 *   policies?: list<PolicyShape>|null,
 *   timestamp?: float|null,
 * }
 */
final class ContentSubmitParams implements BaseModel
{
    /** @use SdkModel<ContentSubmitParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The content sent for moderation.
     *
     * @var ContentVariants $content
     */
    #[Required]
    public Text|Image|Video|Audio|Object_ $content;

    /**
     * The author of the content.
     */
    #[Optional('authorId')]
    public ?string $authorID;

    /**
     * Provide a channel ID or key. Will use the project's default channel if not provided.
     */
    #[Optional]
    public ?string $channel;

    /**
     * The unique ID of the content in your database.
     */
    #[Optional('contentId')]
    public ?string $contentID;

    /**
     * For example the ID of a chat room or a post.
     */
    #[Optional('conversationId')]
    public ?string $conversationID;

    /**
     * Do not store the content. The content won't enter the review queue.
     */
    #[Optional]
    public ?bool $doNotStore;

    /**
     * Any metadata you want to store with the content.
     *
     * @var array<string,mixed>|null $metadata
     */
    #[Optional(map: 'mixed')]
    public ?array $metadata;

    /**
     * The meta type of content being moderated.
     *
     * @var value-of<MetaType>|null $metaType
     */
    #[Optional(enum: MetaType::class)]
    public ?string $metaType;

    /**
     * (Enterprise) override the channel policies for this moderation request only.
     *
     * @var list<PolicyVariants>|null $policies
     */
    #[Optional(list: Policy::class)]
    public ?array $policies;

    /**
     * Unix timestamp (in milliseconds) of when the content was created. Use if content is not submitted in real-time.
     */
    #[Optional]
    public ?float $timestamp;

    /**
     * `new ContentSubmitParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContentSubmitParams::with(content: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ContentSubmitParams)->withContent(...)
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
     * @param ContentShape $content
     * @param array<string,mixed>|null $metadata
     * @param MetaType|value-of<MetaType>|null $metaType
     * @param list<PolicyShape>|null $policies
     */
    public static function with(
        Text|array|Image|Video|Audio|Object_ $content,
        ?string $authorID = null,
        ?string $channel = null,
        ?string $contentID = null,
        ?string $conversationID = null,
        ?bool $doNotStore = null,
        ?array $metadata = null,
        MetaType|string|null $metaType = null,
        ?array $policies = null,
        ?float $timestamp = null,
    ): self {
        $self = new self;

        $self['content'] = $content;

        null !== $authorID && $self['authorID'] = $authorID;
        null !== $channel && $self['channel'] = $channel;
        null !== $contentID && $self['contentID'] = $contentID;
        null !== $conversationID && $self['conversationID'] = $conversationID;
        null !== $doNotStore && $self['doNotStore'] = $doNotStore;
        null !== $metadata && $self['metadata'] = $metadata;
        null !== $metaType && $self['metaType'] = $metaType;
        null !== $policies && $self['policies'] = $policies;
        null !== $timestamp && $self['timestamp'] = $timestamp;

        return $self;
    }

    /**
     * The content sent for moderation.
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
     * The author of the content.
     */
    public function withAuthorID(string $authorID): self
    {
        $self = clone $this;
        $self['authorID'] = $authorID;

        return $self;
    }

    /**
     * Provide a channel ID or key. Will use the project's default channel if not provided.
     */
    public function withChannel(string $channel): self
    {
        $self = clone $this;
        $self['channel'] = $channel;

        return $self;
    }

    /**
     * The unique ID of the content in your database.
     */
    public function withContentID(string $contentID): self
    {
        $self = clone $this;
        $self['contentID'] = $contentID;

        return $self;
    }

    /**
     * For example the ID of a chat room or a post.
     */
    public function withConversationID(string $conversationID): self
    {
        $self = clone $this;
        $self['conversationID'] = $conversationID;

        return $self;
    }

    /**
     * Do not store the content. The content won't enter the review queue.
     */
    public function withDoNotStore(bool $doNotStore): self
    {
        $self = clone $this;
        $self['doNotStore'] = $doNotStore;

        return $self;
    }

    /**
     * Any metadata you want to store with the content.
     *
     * @param array<string,mixed> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * The meta type of content being moderated.
     *
     * @param MetaType|value-of<MetaType> $metaType
     */
    public function withMetaType(MetaType|string $metaType): self
    {
        $self = clone $this;
        $self['metaType'] = $metaType;

        return $self;
    }

    /**
     * (Enterprise) override the channel policies for this moderation request only.
     *
     * @param list<PolicyShape> $policies
     */
    public function withPolicies(array $policies): self
    {
        $self = clone $this;
        $self['policies'] = $policies;

        return $self;
    }

    /**
     * Unix timestamp (in milliseconds) of when the content was created. Use if content is not submitted in real-time.
     */
    public function withTimestamp(float $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }
}
