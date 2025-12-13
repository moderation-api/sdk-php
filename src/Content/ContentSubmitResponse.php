<?php

declare(strict_types=1);

namespace ModerationAPI\Content;

use ModerationAPI\Content\ContentSubmitResponse\Author;
use ModerationAPI\Content\ContentSubmitResponse\Author\Block;
use ModerationAPI\Content\ContentSubmitResponse\Author\Status;
use ModerationAPI\Content\ContentSubmitResponse\Author\TrustLevel;
use ModerationAPI\Content\ContentSubmitResponse\Content;
use ModerationAPI\Content\ContentSubmitResponse\Content\Modified\ModifiedNestedObjectContent\Audio;
use ModerationAPI\Content\ContentSubmitResponse\Content\Modified\ModifiedNestedObjectContent\Image;
use ModerationAPI\Content\ContentSubmitResponse\Content\Modified\ModifiedNestedObjectContent\Text;
use ModerationAPI\Content\ContentSubmitResponse\Content\Modified\ModifiedNestedObjectContent\Video;
use ModerationAPI\Content\ContentSubmitResponse\Error;
use ModerationAPI\Content\ContentSubmitResponse\Evaluation;
use ModerationAPI\Content\ContentSubmitResponse\Insight;
use ModerationAPI\Content\ContentSubmitResponse\Insight\LanguageInsight;
use ModerationAPI\Content\ContentSubmitResponse\Insight\SentimentInsight;
use ModerationAPI\Content\ContentSubmitResponse\Insight\SentimentInsight\Value;
use ModerationAPI\Content\ContentSubmitResponse\Meta;
use ModerationAPI\Content\ContentSubmitResponse\Policy;
use ModerationAPI\Content\ContentSubmitResponse\Policy\ClassifierOutput;
use ModerationAPI\Content\ContentSubmitResponse\Policy\ClassifierOutput\Label;
use ModerationAPI\Content\ContentSubmitResponse\Policy\EntityMatcherOutput;
use ModerationAPI\Content\ContentSubmitResponse\Policy\EntityMatcherOutput\Match_;
use ModerationAPI\Content\ContentSubmitResponse\Recommendation;
use ModerationAPI\Content\ContentSubmitResponse\Recommendation\Action;
use ModerationAPI\Content\ContentSubmitResponse\Recommendation\ReasonCode;
use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type ContentSubmitResponseShape = array{
 *   author: Author|null,
 *   content: Content,
 *   evaluation: Evaluation,
 *   insights: list<SentimentInsight|LanguageInsight>,
 *   meta: Meta,
 *   policies: list<ClassifierOutput|EntityMatcherOutput>,
 *   recommendation: Recommendation,
 *   errors?: list<Error>|null,
 * }
 */
final class ContentSubmitResponse implements BaseModel
{
    /** @use SdkModel<ContentSubmitResponseShape> */
    use SdkModel;

    /**
     * The author of the content if your account has authors enabled. Requires you to send authorId when submitting content.
     */
    #[Required]
    public ?Author $author;

    /**
     * Potentially modified content.
     */
    #[Required]
    public Content $content;

    /**
     * The evaluation of the content after running the channel policies.
     */
    #[Required]
    public Evaluation $evaluation;

    /**
     * Results of all insights enabled in the channel.
     *
     * @var list<SentimentInsight|LanguageInsight> $insights
     */
    #[Required(list: Insight::class)]
    public array $insights;

    /**
     * Metadata about the moderation request.
     */
    #[Required]
    public Meta $meta;

    /**
     * Results of all policies in the channel. Sorted by highest probability.
     *
     * @var list<ClassifierOutput|EntityMatcherOutput> $policies
     */
    #[Required(list: Policy::class)]
    public array $policies;

    /**
     * The recommendation for the content based on the evaluation.
     */
    #[Required]
    public Recommendation $recommendation;

    /**
     * Policies that had errors.
     *
     * @var list<Error>|null $errors
     */
    #[Optional(list: Error::class)]
    public ?array $errors;

    /**
     * `new ContentSubmitResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContentSubmitResponse::with(
     *   author: ...,
     *   content: ...,
     *   evaluation: ...,
     *   insights: ...,
     *   meta: ...,
     *   policies: ...,
     *   recommendation: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ContentSubmitResponse)
     *   ->withAuthor(...)
     *   ->withContent(...)
     *   ->withEvaluation(...)
     *   ->withInsights(...)
     *   ->withMeta(...)
     *   ->withPolicies(...)
     *   ->withRecommendation(...)
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
     * @param Author|array{
     *   id: string,
     *   block: Block|null,
     *   status: value-of<Status>,
     *   trustLevel: TrustLevel,
     *   externalID?: string|null,
     * }|null $author
     * @param Content|array{
     *   id: string,
     *   masked: bool,
     *   modified: string|array<string,mixed>|array<string,Text|Image|Video|Audio>|null,
     * } $content
     * @param Evaluation|array{
     *   flagProbability: float,
     *   flagged: bool,
     *   severityScore: float,
     *   unicodeSpoofed?: bool|null,
     * } $evaluation
     * @param list<SentimentInsight|array{
     *   id?: 'sentiment',
     *   probability: float,
     *   type?: 'insight',
     *   value: value-of<Value>|null,
     * }|LanguageInsight|array{
     *   id?: 'language', probability: float, type?: 'insight', value: string|null
     * }> $insights
     * @param Meta|array{
     *   channelKey: string,
     *   status: value-of<Meta\Status>,
     *   timestamp: float,
     *   usage: float,
     *   processingTime?: string|null,
     * } $meta
     * @param list<ClassifierOutput|array{
     *   id: string,
     *   flagged: bool,
     *   probability: float,
     *   type?: 'classifier',
     *   flaggedFields?: list<string>|null,
     *   labels?: list<Label>|null,
     * }|EntityMatcherOutput|array{
     *   id: string,
     *   flagged: bool,
     *   matches: list<Match_>,
     *   probability: float,
     *   type?: 'entity_matcher',
     *   flaggedFields?: list<string>|null,
     * }> $policies
     * @param Recommendation|array{
     *   action: value-of<Action>, reasonCodes: list<value-of<ReasonCode>>
     * } $recommendation
     * @param list<Error|array{id: string, message: string}> $errors
     */
    public static function with(
        Author|array|null $author,
        Content|array $content,
        Evaluation|array $evaluation,
        array $insights,
        Meta|array $meta,
        array $policies,
        Recommendation|array $recommendation,
        ?array $errors = null,
    ): self {
        $self = new self;

        $self['author'] = $author;
        $self['content'] = $content;
        $self['evaluation'] = $evaluation;
        $self['insights'] = $insights;
        $self['meta'] = $meta;
        $self['policies'] = $policies;
        $self['recommendation'] = $recommendation;

        null !== $errors && $self['errors'] = $errors;

        return $self;
    }

    /**
     * The author of the content if your account has authors enabled. Requires you to send authorId when submitting content.
     *
     * @param Author|array{
     *   id: string,
     *   block: Block|null,
     *   status: value-of<Status>,
     *   trustLevel: TrustLevel,
     *   externalID?: string|null,
     * }|null $author
     */
    public function withAuthor(Author|array|null $author): self
    {
        $self = clone $this;
        $self['author'] = $author;

        return $self;
    }

    /**
     * Potentially modified content.
     *
     * @param Content|array{
     *   id: string,
     *   masked: bool,
     *   modified: string|array<string,mixed>|array<string,Text|Image|Video|Audio>|null,
     * } $content
     */
    public function withContent(Content|array $content): self
    {
        $self = clone $this;
        $self['content'] = $content;

        return $self;
    }

    /**
     * The evaluation of the content after running the channel policies.
     *
     * @param Evaluation|array{
     *   flagProbability: float,
     *   flagged: bool,
     *   severityScore: float,
     *   unicodeSpoofed?: bool|null,
     * } $evaluation
     */
    public function withEvaluation(Evaluation|array $evaluation): self
    {
        $self = clone $this;
        $self['evaluation'] = $evaluation;

        return $self;
    }

    /**
     * Results of all insights enabled in the channel.
     *
     * @param list<SentimentInsight|array{
     *   id?: 'sentiment',
     *   probability: float,
     *   type?: 'insight',
     *   value: value-of<Value>|null,
     * }|LanguageInsight|array{
     *   id?: 'language', probability: float, type?: 'insight', value: string|null
     * }> $insights
     */
    public function withInsights(array $insights): self
    {
        $self = clone $this;
        $self['insights'] = $insights;

        return $self;
    }

    /**
     * Metadata about the moderation request.
     *
     * @param Meta|array{
     *   channelKey: string,
     *   status: value-of<Meta\Status>,
     *   timestamp: float,
     *   usage: float,
     *   processingTime?: string|null,
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * Results of all policies in the channel. Sorted by highest probability.
     *
     * @param list<ClassifierOutput|array{
     *   id: string,
     *   flagged: bool,
     *   probability: float,
     *   type?: 'classifier',
     *   flaggedFields?: list<string>|null,
     *   labels?: list<Label>|null,
     * }|EntityMatcherOutput|array{
     *   id: string,
     *   flagged: bool,
     *   matches: list<Match_>,
     *   probability: float,
     *   type?: 'entity_matcher',
     *   flaggedFields?: list<string>|null,
     * }> $policies
     */
    public function withPolicies(array $policies): self
    {
        $self = clone $this;
        $self['policies'] = $policies;

        return $self;
    }

    /**
     * The recommendation for the content based on the evaluation.
     *
     * @param Recommendation|array{
     *   action: value-of<Action>, reasonCodes: list<value-of<ReasonCode>>
     * } $recommendation
     */
    public function withRecommendation(
        Recommendation|array $recommendation
    ): self {
        $self = clone $this;
        $self['recommendation'] = $recommendation;

        return $self;
    }

    /**
     * Policies that had errors.
     *
     * @param list<Error|array{id: string, message: string}> $errors
     */
    public function withErrors(array $errors): self
    {
        $self = clone $this;
        $self['errors'] = $errors;

        return $self;
    }
}
