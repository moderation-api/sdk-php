<?php

declare(strict_types=1);

namespace ModerationAPI\Content;

use ModerationAPI\Content\ContentSubmitResponse\Author;
use ModerationAPI\Content\ContentSubmitResponse\Content;
use ModerationAPI\Content\ContentSubmitResponse\Error;
use ModerationAPI\Content\ContentSubmitResponse\Evaluation;
use ModerationAPI\Content\ContentSubmitResponse\Insight;
use ModerationAPI\Content\ContentSubmitResponse\Meta;
use ModerationAPI\Content\ContentSubmitResponse\Policy;
use ModerationAPI\Content\ContentSubmitResponse\Recommendation;
use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type InsightVariants from \ModerationAPI\Content\ContentSubmitResponse\Insight
 * @phpstan-import-type PolicyVariants from \ModerationAPI\Content\ContentSubmitResponse\Policy
 * @phpstan-import-type AuthorShape from \ModerationAPI\Content\ContentSubmitResponse\Author
 * @phpstan-import-type ContentShape from \ModerationAPI\Content\ContentSubmitResponse\Content
 * @phpstan-import-type EvaluationShape from \ModerationAPI\Content\ContentSubmitResponse\Evaluation
 * @phpstan-import-type InsightShape from \ModerationAPI\Content\ContentSubmitResponse\Insight
 * @phpstan-import-type MetaShape from \ModerationAPI\Content\ContentSubmitResponse\Meta
 * @phpstan-import-type PolicyShape from \ModerationAPI\Content\ContentSubmitResponse\Policy
 * @phpstan-import-type RecommendationShape from \ModerationAPI\Content\ContentSubmitResponse\Recommendation
 * @phpstan-import-type ErrorShape from \ModerationAPI\Content\ContentSubmitResponse\Error
 *
 * @phpstan-type ContentSubmitResponseShape = array{
 *   author: null|Author|AuthorShape,
 *   content: Content|ContentShape,
 *   evaluation: Evaluation|EvaluationShape,
 *   insights: list<InsightShape>,
 *   meta: Meta|MetaShape,
 *   policies: list<PolicyShape>,
 *   recommendation: Recommendation|RecommendationShape,
 *   errors?: list<Error|ErrorShape>|null,
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
     * @var list<InsightVariants> $insights
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
     * @var list<PolicyVariants> $policies
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
     * @param Author|AuthorShape|null $author
     * @param Content|ContentShape $content
     * @param Evaluation|EvaluationShape $evaluation
     * @param list<InsightShape> $insights
     * @param Meta|MetaShape $meta
     * @param list<PolicyShape> $policies
     * @param Recommendation|RecommendationShape $recommendation
     * @param list<Error|ErrorShape>|null $errors
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
     * @param Author|AuthorShape|null $author
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
     * @param Content|ContentShape $content
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
     * @param Evaluation|EvaluationShape $evaluation
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
     * @param list<InsightShape> $insights
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
     * @param Meta|MetaShape $meta
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
     * @param list<PolicyShape> $policies
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
     * @param Recommendation|RecommendationShape $recommendation
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
     * @param list<Error|ErrorShape> $errors
     */
    public function withErrors(array $errors): self
    {
        $self = clone $this;
        $self['errors'] = $errors;

        return $self;
    }
}
