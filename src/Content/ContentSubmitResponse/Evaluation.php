<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * The evaluation of the content after running the channel policies.
 *
 * @phpstan-type EvaluationShape = array{
 *   flagProbability: float,
 *   flagged: bool,
 *   severityScore: float,
 *   unicodeSpoofed?: bool|null,
 * }
 */
final class Evaluation implements BaseModel
{
    /** @use SdkModel<EvaluationShape> */
    use SdkModel;

    /**
     * The probability that the content should be flagged.
     */
    #[Required('flag_probability')]
    public float $flagProbability;

    /**
     * Whether the content was flagged by any policy.
     */
    #[Required]
    public bool $flagged;

    /**
     * The severity score of the content. A higher score indicates more severe content.
     */
    #[Required('severity_score')]
    public float $severityScore;

    /**
     * Whether the content was flagged for Unicode spoofing.
     */
    #[Optional('unicode_spoofed')]
    public ?bool $unicodeSpoofed;

    /**
     * `new Evaluation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Evaluation::with(flagProbability: ..., flagged: ..., severityScore: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Evaluation)
     *   ->withFlagProbability(...)
     *   ->withFlagged(...)
     *   ->withSeverityScore(...)
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
     */
    public static function with(
        float $flagProbability,
        bool $flagged,
        float $severityScore,
        ?bool $unicodeSpoofed = null,
    ): self {
        $obj = new self;

        $obj['flagProbability'] = $flagProbability;
        $obj['flagged'] = $flagged;
        $obj['severityScore'] = $severityScore;

        null !== $unicodeSpoofed && $obj['unicodeSpoofed'] = $unicodeSpoofed;

        return $obj;
    }

    /**
     * The probability that the content should be flagged.
     */
    public function withFlagProbability(float $flagProbability): self
    {
        $obj = clone $this;
        $obj['flagProbability'] = $flagProbability;

        return $obj;
    }

    /**
     * Whether the content was flagged by any policy.
     */
    public function withFlagged(bool $flagged): self
    {
        $obj = clone $this;
        $obj['flagged'] = $flagged;

        return $obj;
    }

    /**
     * The severity score of the content. A higher score indicates more severe content.
     */
    public function withSeverityScore(float $severityScore): self
    {
        $obj = clone $this;
        $obj['severityScore'] = $severityScore;

        return $obj;
    }

    /**
     * Whether the content was flagged for Unicode spoofing.
     */
    public function withUnicodeSpoofed(bool $unicodeSpoofed): self
    {
        $obj = clone $this;
        $obj['unicodeSpoofed'] = $unicodeSpoofed;

        return $obj;
    }
}
