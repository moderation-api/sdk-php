<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse;

use ModerationAPI\Content\ContentSubmitResponse\Casebook\Topic;
use ModerationAPI\Content\ContentSubmitResponse\Casebook\Verdict;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * What your casebook — the record of your past moderation decisions — found for this content, or null when it had nothing close enough to say, when the matching cases disagreed, or when casebook lookups are not switched on for this channel. Reports what the casebook found; whether it decided the outcome is shown in `recommendation`, where a higher-priority rule may have settled the item first.
 *
 * @phpstan-import-type TopicShape from \ModerationAPI\Content\ContentSubmitResponse\Casebook\Topic
 *
 * @phpstan-type CasebookShape = array{
 *   agreement: float,
 *   caseCount: float,
 *   confidence: float,
 *   similarity: float,
 *   topic: null|Topic|TopicShape,
 *   verdict: Verdict|value-of<Verdict>,
 * }
 */
final class Casebook implements BaseModel
{
    /** @use SdkModel<CasebookShape> */
    use SdkModel;

    /**
     * How unanimous the matching cases are, from 0 to 1: the share of them that decided this way, ignoring how many there are. Always at least 0.8 when a ruling is returned — below that the casebook reports a disagreement instead of picking a side — so it tells you how clean the consensus was, and is not a threshold to re-apply yourself.
     */
    #[Required]
    public float $agreement;

    /**
     * How many of your past cases backed this ruling.
     */
    #[Required('case_count')]
    public float $caseCount;

    /**
     * How strongly the casebook holds this ruling, from 0 to 1: the agreement scaled by how much evidence backs it, so a handful of close, recent cases outweighs one distant one. Older cases count for less, halving in weight roughly every 180 days. This is the number to use in rules when you want a strength condition.
     */
    #[Required]
    public float $confidence;

    /**
     * How close the nearest matching case is, from 0 to 1. 1 means the content is identical to something you have already decided.
     */
    #[Required]
    public float $similarity;

    /**
     * The topic the closest matching case is filed under, or null when it has not been grouped into one yet.
     */
    #[Required]
    public ?Topic $topic;

    /**
     * The ruling your past decisions point to for this content.
     *
     * @var value-of<Verdict> $verdict
     */
    #[Required(enum: Verdict::class)]
    public string $verdict;

    /**
     * `new Casebook()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Casebook::with(
     *   agreement: ...,
     *   caseCount: ...,
     *   confidence: ...,
     *   similarity: ...,
     *   topic: ...,
     *   verdict: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Casebook)
     *   ->withAgreement(...)
     *   ->withCaseCount(...)
     *   ->withConfidence(...)
     *   ->withSimilarity(...)
     *   ->withTopic(...)
     *   ->withVerdict(...)
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
     * @param Topic|TopicShape|null $topic
     * @param Verdict|value-of<Verdict> $verdict
     */
    public static function with(
        float $agreement,
        float $caseCount,
        float $confidence,
        float $similarity,
        Topic|array|null $topic,
        Verdict|string $verdict,
    ): self {
        $self = new self;

        $self['agreement'] = $agreement;
        $self['caseCount'] = $caseCount;
        $self['confidence'] = $confidence;
        $self['similarity'] = $similarity;
        $self['topic'] = $topic;
        $self['verdict'] = $verdict;

        return $self;
    }

    /**
     * How unanimous the matching cases are, from 0 to 1: the share of them that decided this way, ignoring how many there are. Always at least 0.8 when a ruling is returned — below that the casebook reports a disagreement instead of picking a side — so it tells you how clean the consensus was, and is not a threshold to re-apply yourself.
     */
    public function withAgreement(float $agreement): self
    {
        $self = clone $this;
        $self['agreement'] = $agreement;

        return $self;
    }

    /**
     * How many of your past cases backed this ruling.
     */
    public function withCaseCount(float $caseCount): self
    {
        $self = clone $this;
        $self['caseCount'] = $caseCount;

        return $self;
    }

    /**
     * How strongly the casebook holds this ruling, from 0 to 1: the agreement scaled by how much evidence backs it, so a handful of close, recent cases outweighs one distant one. Older cases count for less, halving in weight roughly every 180 days. This is the number to use in rules when you want a strength condition.
     */
    public function withConfidence(float $confidence): self
    {
        $self = clone $this;
        $self['confidence'] = $confidence;

        return $self;
    }

    /**
     * How close the nearest matching case is, from 0 to 1. 1 means the content is identical to something you have already decided.
     */
    public function withSimilarity(float $similarity): self
    {
        $self = clone $this;
        $self['similarity'] = $similarity;

        return $self;
    }

    /**
     * The topic the closest matching case is filed under, or null when it has not been grouped into one yet.
     *
     * @param Topic|TopicShape|null $topic
     */
    public function withTopic(Topic|array|null $topic): self
    {
        $self = clone $this;
        $self['topic'] = $topic;

        return $self;
    }

    /**
     * The ruling your past decisions point to for this content.
     *
     * @param Verdict|value-of<Verdict> $verdict
     */
    public function withVerdict(Verdict|string $verdict): self
    {
        $self = clone $this;
        $self['verdict'] = $verdict;

        return $self;
    }
}
