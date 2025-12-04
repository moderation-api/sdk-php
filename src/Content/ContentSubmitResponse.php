<?php

declare(strict_types=1);

namespace ModerationAPI\Content;

use ModerationAPI\Content\ContentSubmitResponse\Author;
use ModerationAPI\Content\ContentSubmitResponse\Content;
use ModerationAPI\Content\ContentSubmitResponse\Error;
use ModerationAPI\Content\ContentSubmitResponse\Evaluation;
use ModerationAPI\Content\ContentSubmitResponse\Insight;
use ModerationAPI\Content\ContentSubmitResponse\Insight\LanguageInsight;
use ModerationAPI\Content\ContentSubmitResponse\Insight\SentimentInsight;
use ModerationAPI\Content\ContentSubmitResponse\Meta;
use ModerationAPI\Content\ContentSubmitResponse\Policy;
use ModerationAPI\Content\ContentSubmitResponse\Policy\ClassifierOutput;
use ModerationAPI\Content\ContentSubmitResponse\Policy\EntityMatcherOutput;
use ModerationAPI\Content\ContentSubmitResponse\Recommendation;
use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkResponse;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Core\Conversion\Contracts\ResponseConverter;

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
final class ContentSubmitResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ContentSubmitResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The author of the content if your account has authors enabled. Requires you to send authorId when submitting content.
     */
    #[Api]
    public ?Author $author;

    /**
     * Potentially modified content.
     */
    #[Api]
    public Content $content;

    /**
     * The evaluation of the content after running the channel policies.
     */
    #[Api]
    public Evaluation $evaluation;

    /**
     * Results of all insights enabled in the channel.
     *
     * @var list<SentimentInsight|LanguageInsight> $insights
     */
    #[Api(list: Insight::class)]
    public array $insights;

    /**
     * Metadata about the moderation request.
     */
    #[Api]
    public Meta $meta;

    /**
     * Results of all policies in the channel. Sorted by highest probability.
     *
     * @var list<ClassifierOutput|EntityMatcherOutput> $policies
     */
    #[Api(list: Policy::class)]
    public array $policies;

    /**
     * The recommendation for the content based on the evaluation.
     */
    #[Api]
    public Recommendation $recommendation;

    /**
     * Policies that had errors.
     *
     * @var list<Error>|null $errors
     */
    #[Api(list: Error::class, optional: true)]
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
     * @param list<SentimentInsight|LanguageInsight> $insights
     * @param list<ClassifierOutput|EntityMatcherOutput> $policies
     * @param list<Error> $errors
     */
    public static function with(
        ?Author $author,
        Content $content,
        Evaluation $evaluation,
        array $insights,
        Meta $meta,
        array $policies,
        Recommendation $recommendation,
        ?array $errors = null,
    ): self {
        $obj = new self;

        $obj->author = $author;
        $obj->content = $content;
        $obj->evaluation = $evaluation;
        $obj->insights = $insights;
        $obj->meta = $meta;
        $obj->policies = $policies;
        $obj->recommendation = $recommendation;

        null !== $errors && $obj->errors = $errors;

        return $obj;
    }

    /**
     * The author of the content if your account has authors enabled. Requires you to send authorId when submitting content.
     */
    public function withAuthor(?Author $author): self
    {
        $obj = clone $this;
        $obj->author = $author;

        return $obj;
    }

    /**
     * Potentially modified content.
     */
    public function withContent(Content $content): self
    {
        $obj = clone $this;
        $obj->content = $content;

        return $obj;
    }

    /**
     * The evaluation of the content after running the channel policies.
     */
    public function withEvaluation(Evaluation $evaluation): self
    {
        $obj = clone $this;
        $obj->evaluation = $evaluation;

        return $obj;
    }

    /**
     * Results of all insights enabled in the channel.
     *
     * @param list<SentimentInsight|LanguageInsight> $insights
     */
    public function withInsights(array $insights): self
    {
        $obj = clone $this;
        $obj->insights = $insights;

        return $obj;
    }

    /**
     * Metadata about the moderation request.
     */
    public function withMeta(Meta $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }

    /**
     * Results of all policies in the channel. Sorted by highest probability.
     *
     * @param list<ClassifierOutput|EntityMatcherOutput> $policies
     */
    public function withPolicies(array $policies): self
    {
        $obj = clone $this;
        $obj->policies = $policies;

        return $obj;
    }

    /**
     * The recommendation for the content based on the evaluation.
     */
    public function withRecommendation(Recommendation $recommendation): self
    {
        $obj = clone $this;
        $obj->recommendation = $recommendation;

        return $obj;
    }

    /**
     * Policies that had errors.
     *
     * @param list<Error> $errors
     */
    public function withErrors(array $errors): self
    {
        $obj = clone $this;
        $obj->errors = $errors;

        return $obj;
    }
}
