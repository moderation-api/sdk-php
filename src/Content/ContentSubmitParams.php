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
use ModerationAPI\Content\ContentSubmitParams\Policy\PiiMasking\Entity;
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
use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkParams;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @see ModerationAPI\Services\ContentService::submit()
 *
 * @phpstan-type ContentSubmitParamsShape = array{
 *   content: Text|array{text: string, type?: 'text'}|Image|array{
 *     type?: 'image', url: string
 *   }|Video|array{type?: 'video', url: string}|Audio|array{
 *     type?: 'audio', url: string
 *   }|Object_|array{
 *     data: array<string,\ModerationAPI\Content\ContentSubmitParams\Content\Object_\Data\Text|\ModerationAPI\Content\ContentSubmitParams\Content\Object_\Data\Image|\ModerationAPI\Content\ContentSubmitParams\Content\Object_\Data\Video|\ModerationAPI\Content\ContentSubmitParams\Content\Object_\Data\Audio>,
 *     type?: 'object',
 *   },
 *   authorID?: string,
 *   channel?: string,
 *   contentID?: string,
 *   conversationID?: string,
 *   doNotStore?: bool,
 *   metadata?: array<string,mixed>,
 *   metaType?: MetaType|value-of<MetaType>,
 *   policies?: list<Toxicity|array{
 *     id?: 'toxicity', flag: bool
 *   }|PersonalInformation|array{
 *     id?: 'personal_information', flag: bool
 *   }|ToxicitySevere|array{id?: 'toxicity_severe', flag: bool}|Hate|array{
 *     id?: 'hate', flag: bool
 *   }|Illicit|array{id?: 'illicit', flag: bool}|IllicitDrugs|array{
 *     id?: 'illicit_drugs', flag: bool
 *   }|IllicitAlcohol|array{
 *     id?: 'illicit_alcohol', flag: bool
 *   }|IllicitFirearms|array{
 *     id?: 'illicit_firearms', flag: bool
 *   }|IllicitTobacco|array{
 *     id?: 'illicit_tobacco', flag: bool
 *   }|IllicitGambling|array{id?: 'illicit_gambling', flag: bool}|Sexual|array{
 *     id?: 'sexual', flag: bool
 *   }|Flirtation|array{id?: 'flirtation', flag: bool}|Profanity|array{
 *     id?: 'profanity', flag: bool
 *   }|Violence|array{id?: 'violence', flag: bool}|SelfHarm|array{
 *     id?: 'self_harm', flag: bool
 *   }|Spam|array{id?: 'spam', flag: bool}|SelfPromotion|array{
 *     id?: 'self_promotion', flag: bool
 *   }|Political|array{id?: 'political', flag: bool}|Religion|array{
 *     id?: 'religion', flag: bool
 *   }|CodeAbuse|array{id?: 'code_abuse', flag: bool}|PiiMasking|array{
 *     id?: 'pii', entities: array<string,Entity>
 *   }|URLMasking|array{
 *     id?: 'url',
 *     entities: array<string,\ModerationAPI\Content\ContentSubmitParams\Policy\URLMasking\Entity>,
 *   }|Guideline|array{
 *     id?: 'guideline', flag: bool, guidelineKey: string, instructions: string
 *   }>,
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
     * @var list<Toxicity|PersonalInformation|ToxicitySevere|Hate|Illicit|IllicitDrugs|IllicitAlcohol|IllicitFirearms|IllicitTobacco|IllicitGambling|Sexual|Flirtation|Profanity|Violence|SelfHarm|Spam|SelfPromotion|Political|Religion|CodeAbuse|PiiMasking|URLMasking|Guideline>|null $policies
     */
    #[Optional(list: Policy::class)]
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
     * @param Text|array{text: string, type?: 'text'}|Image|array{
     *   type?: 'image', url: string
     * }|Video|array{type?: 'video', url: string}|Audio|array{
     *   type?: 'audio', url: string
     * }|Object_|array{
     *   data: array<string,Object_\Data\Text|Object_\Data\Image|Object_\Data\Video|Object_\Data\Audio>,
     *   type?: 'object',
     * } $content
     * @param array<string,mixed> $metadata
     * @param MetaType|value-of<MetaType> $metaType
     * @param list<Toxicity|array{
     *   id?: 'toxicity', flag: bool
     * }|PersonalInformation|array{
     *   id?: 'personal_information', flag: bool
     * }|ToxicitySevere|array{id?: 'toxicity_severe', flag: bool}|Hate|array{
     *   id?: 'hate', flag: bool
     * }|Illicit|array{id?: 'illicit', flag: bool}|IllicitDrugs|array{
     *   id?: 'illicit_drugs', flag: bool
     * }|IllicitAlcohol|array{
     *   id?: 'illicit_alcohol', flag: bool
     * }|IllicitFirearms|array{
     *   id?: 'illicit_firearms', flag: bool
     * }|IllicitTobacco|array{
     *   id?: 'illicit_tobacco', flag: bool
     * }|IllicitGambling|array{id?: 'illicit_gambling', flag: bool}|Sexual|array{
     *   id?: 'sexual', flag: bool
     * }|Flirtation|array{id?: 'flirtation', flag: bool}|Profanity|array{
     *   id?: 'profanity', flag: bool
     * }|Violence|array{id?: 'violence', flag: bool}|SelfHarm|array{
     *   id?: 'self_harm', flag: bool
     * }|Spam|array{id?: 'spam', flag: bool}|SelfPromotion|array{
     *   id?: 'self_promotion', flag: bool
     * }|Political|array{id?: 'political', flag: bool}|Religion|array{
     *   id?: 'religion', flag: bool
     * }|CodeAbuse|array{id?: 'code_abuse', flag: bool}|PiiMasking|array{
     *   id?: 'pii', entities: array<string,Entity>
     * }|URLMasking|array{
     *   id?: 'url',
     *   entities: array<string,URLMasking\Entity>,
     * }|Guideline|array{
     *   id?: 'guideline', flag: bool, guidelineKey: string, instructions: string
     * }> $policies
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

        return $self;
    }

    /**
     * The content sent for moderation.
     *
     * @param Text|array{text: string, type?: 'text'}|Image|array{
     *   type?: 'image', url: string
     * }|Video|array{type?: 'video', url: string}|Audio|array{
     *   type?: 'audio', url: string
     * }|Object_|array{
     *   data: array<string,Object_\Data\Text|Object_\Data\Image|Object_\Data\Video|Object_\Data\Audio>,
     *   type?: 'object',
     * } $content
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
     * @param list<Toxicity|array{
     *   id?: 'toxicity', flag: bool
     * }|PersonalInformation|array{
     *   id?: 'personal_information', flag: bool
     * }|ToxicitySevere|array{id?: 'toxicity_severe', flag: bool}|Hate|array{
     *   id?: 'hate', flag: bool
     * }|Illicit|array{id?: 'illicit', flag: bool}|IllicitDrugs|array{
     *   id?: 'illicit_drugs', flag: bool
     * }|IllicitAlcohol|array{
     *   id?: 'illicit_alcohol', flag: bool
     * }|IllicitFirearms|array{
     *   id?: 'illicit_firearms', flag: bool
     * }|IllicitTobacco|array{
     *   id?: 'illicit_tobacco', flag: bool
     * }|IllicitGambling|array{id?: 'illicit_gambling', flag: bool}|Sexual|array{
     *   id?: 'sexual', flag: bool
     * }|Flirtation|array{id?: 'flirtation', flag: bool}|Profanity|array{
     *   id?: 'profanity', flag: bool
     * }|Violence|array{id?: 'violence', flag: bool}|SelfHarm|array{
     *   id?: 'self_harm', flag: bool
     * }|Spam|array{id?: 'spam', flag: bool}|SelfPromotion|array{
     *   id?: 'self_promotion', flag: bool
     * }|Political|array{id?: 'political', flag: bool}|Religion|array{
     *   id?: 'religion', flag: bool
     * }|CodeAbuse|array{id?: 'code_abuse', flag: bool}|PiiMasking|array{
     *   id?: 'pii', entities: array<string,Entity>
     * }|URLMasking|array{
     *   id?: 'url',
     *   entities: array<string,URLMasking\Entity>,
     * }|Guideline|array{
     *   id?: 'guideline', flag: bool, guidelineKey: string, instructions: string
     * }> $policies
     */
    public function withPolicies(array $policies): self
    {
        $self = clone $this;
        $self['policies'] = $policies;

        return $self;
    }
}
