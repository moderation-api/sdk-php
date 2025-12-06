<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * The evaluation of the content after running the channel policies.
 *
 * @phpstan-type EvaluationShape = array{
 *   flag_probability: float,
 *   flagged: bool,
 *   severity_score: float,
 *   unicode_spoofed?: bool|null,
 * }
 */
final class Evaluation implements BaseModel
{
    /** @use SdkModel<EvaluationShape> */
    use SdkModel;

    /**
     * The probability that the content should be flagged.
     */
    #[Api]
    public float $flag_probability;

    /**
     * Whether the content was flagged by any policy.
     */
    #[Api]
    public bool $flagged;

    /**
     * The severity score of the content. A higher score indicates more severe content.
     */
    #[Api]
    public float $severity_score;

    /**
     * Whether the content was flagged for Unicode spoofing.
     */
    #[Api(optional: true)]
    public ?bool $unicode_spoofed;

    /**
     * `new Evaluation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Evaluation::with(flag_probability: ..., flagged: ..., severity_score: ...)
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
        float $flag_probability,
        bool $flagged,
        float $severity_score,
        ?bool $unicode_spoofed = null,
    ): self {
        $obj = new self;

        $obj['flag_probability'] = $flag_probability;
        $obj['flagged'] = $flagged;
        $obj['severity_score'] = $severity_score;

        null !== $unicode_spoofed && $obj['unicode_spoofed'] = $unicode_spoofed;

        return $obj;
    }

    /**
     * The probability that the content should be flagged.
     */
    public function withFlagProbability(float $flagProbability): self
    {
        $obj = clone $this;
        $obj['flag_probability'] = $flagProbability;

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
        $obj['severity_score'] = $severityScore;

        return $obj;
    }

    /**
     * Whether the content was flagged for Unicode spoofing.
     */
    public function withUnicodeSpoofed(bool $unicodeSpoofed): self
    {
        $obj = clone $this;
        $obj['unicode_spoofed'] = $unicodeSpoofed;

        return $obj;
    }
}
