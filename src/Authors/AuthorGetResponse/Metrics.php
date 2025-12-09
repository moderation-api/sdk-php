<?php

declare(strict_types=1);

namespace ModerationAPI\Authors\AuthorGetResponse;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetricsShape = array{
 *   flagged_content: float, total_content: float, average_sentiment?: float|null
 * }
 */
final class Metrics implements BaseModel
{
    /** @use SdkModel<MetricsShape> */
    use SdkModel;

    /**
     * Number of flagged content pieces.
     */
    #[Required]
    public float $flagged_content;

    /**
     * Total pieces of content.
     */
    #[Required]
    public float $total_content;

    /**
     * Average sentiment score of content (-1 to 1). Requires a sentiment model in your project.
     */
    #[Optional(nullable: true)]
    public ?float $average_sentiment;

    /**
     * `new Metrics()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Metrics::with(flagged_content: ..., total_content: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Metrics)->withFlaggedContent(...)->withTotalContent(...)
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
        float $flagged_content,
        float $total_content,
        ?float $average_sentiment = null,
    ): self {
        $obj = new self;

        $obj['flagged_content'] = $flagged_content;
        $obj['total_content'] = $total_content;

        null !== $average_sentiment && $obj['average_sentiment'] = $average_sentiment;

        return $obj;
    }

    /**
     * Number of flagged content pieces.
     */
    public function withFlaggedContent(float $flaggedContent): self
    {
        $obj = clone $this;
        $obj['flagged_content'] = $flaggedContent;

        return $obj;
    }

    /**
     * Total pieces of content.
     */
    public function withTotalContent(float $totalContent): self
    {
        $obj = clone $this;
        $obj['total_content'] = $totalContent;

        return $obj;
    }

    /**
     * Average sentiment score of content (-1 to 1). Requires a sentiment model in your project.
     */
    public function withAverageSentiment(?float $averageSentiment): self
    {
        $obj = clone $this;
        $obj['average_sentiment'] = $averageSentiment;

        return $obj;
    }
}
