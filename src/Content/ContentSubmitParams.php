<?php

declare(strict_types=1);

namespace ModerationAPI\Content;

use ModerationAPI\Content\ContentSubmitParams\Content\Audio;
use ModerationAPI\Content\ContentSubmitParams\Content\ContentNode;
use ModerationAPI\Content\ContentSubmitParams\Content\Image;
use ModerationAPI\Content\ContentSubmitParams\Content\Text;
use ModerationAPI\Content\ContentSubmitParams\Content\Video;
use ModerationAPI\Content\ContentSubmitParams\MetaType;
use ModerationAPI\Content\ContentSubmitParams\Policy;
use ModerationAPI\Content\ContentSubmitParams\Policy\CodeAbuse;
use ModerationAPI\Content\ContentSubmitParams\Policy\Flirtation;
use ModerationAPI\Content\ContentSubmitParams\Policy\Guideline;
use ModerationAPI\Content\ContentSubmitParams\Policy\Hate;
use ModerationAPI\Content\ContentSubmitParams\Policy\Illicit;
use ModerationAPI\Content\ContentSubmitParams\Policy\IllicitAlcohol;
use ModerationAPI\Content\ContentSubmitParams\Policy\IllicitDrugs;
use ModerationAPI\Content\ContentSubmitParams\Policy\IllicitFirearms;
use ModerationAPI\Content\ContentSubmitParams\Policy\IllicitGambling;
use ModerationAPI\Content\ContentSubmitParams\Policy\IllicitTobacco;
use ModerationAPI\Content\ContentSubmitParams\Policy\PersonalInformation;
use ModerationAPI\Content\ContentSubmitParams\Policy\PiiMasking;
use ModerationAPI\Content\ContentSubmitParams\Policy\Political;
use ModerationAPI\Content\ContentSubmitParams\Policy\Profanity;
use ModerationAPI\Content\ContentSubmitParams\Policy\Religion;
use ModerationAPI\Content\ContentSubmitParams\Policy\SelfHarm;
use ModerationAPI\Content\ContentSubmitParams\Policy\SelfPromotion;
use ModerationAPI\Content\ContentSubmitParams\Policy\Sexual;
use ModerationAPI\Content\ContentSubmitParams\Policy\Spam;
use ModerationAPI\Content\ContentSubmitParams\Policy\Toxicity;
use ModerationAPI\Content\ContentSubmitParams\Policy\ToxicitySevere;
use ModerationAPI\Content\ContentSubmitParams\Policy\URLMasking;
use ModerationAPI\Content\ContentSubmitParams\Policy\Violence;
use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkParams;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @see ModerationAPI\Services\ContentService::submit()
 *
 * @phpstan-type ContentSubmitParamsShape = array{
 *   content: Text|Image|Video|Audio|ContentNode,
 *   authorId?: string,
 *   channel?: string,
 *   contentId?: string,
 *   conversationId?: string,
 *   doNotStore?: bool,
 *   metadata?: array<string,mixed>,
 *   metaType?: MetaType|value-of<MetaType>,
 *   policies?: list<Toxicity|PersonalInformation|ToxicitySevere|Hate|Illicit|IllicitDrugs|IllicitAlcohol|IllicitFirearms|IllicitTobacco|IllicitGambling|Sexual|Flirtation|Profanity|Violence|SelfHarm|Spam|SelfPromotion|Political|Religion|CodeAbuse|PiiMasking|URLMasking|Guideline>,
 * }
 */
final class ContentSubmitParams implements BaseModel
{
    /** @use SdkModel<ContentSubmitParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The content sent for moderation.
     */
    #[Api]
    public Text|Image|Video|Audio|ContentNode $content;

    /**
     * The author of the content.
     */
    #[Api(optional: true)]
    public ?string $authorId;

    /**
     * Provide a channel ID or key. Will use the project's default channel if not provided.
     */
    #[Api(optional: true)]
    public ?string $channel;

    /**
     * The unique ID of the content in your database.
     */
    #[Api(optional: true)]
    public ?string $contentId;

    /**
     * For example the ID of a chat room or a post.
     */
    #[Api(optional: true)]
    public ?string $conversationId;

    /**
     * Do not store the content. The content won't enter the review queue.
     */
    #[Api(optional: true)]
    public ?bool $doNotStore;

    /**
     * Any metadata you want to store with the content.
     *
     * @var array<string,mixed>|null $metadata
     */
    #[Api(map: 'mixed', optional: true)]
    public ?array $metadata;

    /**
     * The meta type of content being moderated.
     *
     * @var value-of<MetaType>|null $metaType
     */
    #[Api(enum: MetaType::class, optional: true)]
    public ?string $metaType;

    /**
     * Optionally override the channel policies for this moderation request only (enterprise).
     *
     * @var list<Toxicity|PersonalInformation|ToxicitySevere|Hate|Illicit|IllicitDrugs|IllicitAlcohol|IllicitFirearms|IllicitTobacco|IllicitGambling|Sexual|Flirtation|Profanity|Violence|SelfHarm|Spam|SelfPromotion|Political|Religion|CodeAbuse|PiiMasking|URLMasking|Guideline>|null $policies
     */
    #[Api(list: Policy::class, optional: true)]
    public ?array $policies;

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
     * @param array<string,mixed> $metadata
     * @param MetaType|value-of<MetaType> $metaType
     * @param list<Toxicity|PersonalInformation|ToxicitySevere|Hate|Illicit|IllicitDrugs|IllicitAlcohol|IllicitFirearms|IllicitTobacco|IllicitGambling|Sexual|Flirtation|Profanity|Violence|SelfHarm|Spam|SelfPromotion|Political|Religion|CodeAbuse|PiiMasking|URLMasking|Guideline> $policies
     */
    public static function with(
        Text|Image|Video|Audio|ContentNode $content,
        ?string $authorId = null,
        ?string $channel = null,
        ?string $contentId = null,
        ?string $conversationId = null,
        ?bool $doNotStore = null,
        ?array $metadata = null,
        MetaType|string|null $metaType = null,
        ?array $policies = null,
    ): self {
        $obj = new self;

        $obj->content = $content;

        null !== $authorId && $obj->authorId = $authorId;
        null !== $channel && $obj->channel = $channel;
        null !== $contentId && $obj->contentId = $contentId;
        null !== $conversationId && $obj->conversationId = $conversationId;
        null !== $doNotStore && $obj->doNotStore = $doNotStore;
        null !== $metadata && $obj->metadata = $metadata;
        null !== $metaType && $obj['metaType'] = $metaType;
        null !== $policies && $obj->policies = $policies;

        return $obj;
    }

    /**
     * The content sent for moderation.
     */
    public function withContent(
        Text|Image|Video|Audio|ContentNode $content
    ): self {
        $obj = clone $this;
        $obj->content = $content;

        return $obj;
    }

    /**
     * The author of the content.
     */
    public function withAuthorID(string $authorID): self
    {
        $obj = clone $this;
        $obj->authorId = $authorID;

        return $obj;
    }

    /**
     * Provide a channel ID or key. Will use the project's default channel if not provided.
     */
    public function withChannel(string $channel): self
    {
        $obj = clone $this;
        $obj->channel = $channel;

        return $obj;
    }

    /**
     * The unique ID of the content in your database.
     */
    public function withContentID(string $contentID): self
    {
        $obj = clone $this;
        $obj->contentId = $contentID;

        return $obj;
    }

    /**
     * For example the ID of a chat room or a post.
     */
    public function withConversationID(string $conversationID): self
    {
        $obj = clone $this;
        $obj->conversationId = $conversationID;

        return $obj;
    }

    /**
     * Do not store the content. The content won't enter the review queue.
     */
    public function withDoNotStore(bool $doNotStore): self
    {
        $obj = clone $this;
        $obj->doNotStore = $doNotStore;

        return $obj;
    }

    /**
     * Any metadata you want to store with the content.
     *
     * @param array<string,mixed> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $obj = clone $this;
        $obj->metadata = $metadata;

        return $obj;
    }

    /**
     * The meta type of content being moderated.
     *
     * @param MetaType|value-of<MetaType> $metaType
     */
    public function withMetaType(MetaType|string $metaType): self
    {
        $obj = clone $this;
        $obj['metaType'] = $metaType;

        return $obj;
    }

    /**
     * Optionally override the channel policies for this moderation request only (enterprise).
     *
     * @param list<Toxicity|PersonalInformation|ToxicitySevere|Hate|Illicit|IllicitDrugs|IllicitAlcohol|IllicitFirearms|IllicitTobacco|IllicitGambling|Sexual|Flirtation|Profanity|Violence|SelfHarm|Spam|SelfPromotion|Political|Religion|CodeAbuse|PiiMasking|URLMasking|Guideline> $policies
     */
    public function withPolicies(array $policies): self
    {
        $obj = clone $this;
        $obj->policies = $policies;

        return $obj;
    }
}
