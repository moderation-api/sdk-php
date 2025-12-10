<?php

declare(strict_types=1);

namespace ModerationAPI\Authors\AuthorNewResponse;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetricsShape = array{
 *   flaggedContent: float, totalContent: float, averageSentiment?: float|null
 * }
 */
final class Metrics implements BaseModel
{
    /** @use SdkModel<MetricsShape> */
    use SdkModel;

    /**
     * Number of flagged content pieces.
     */
    #[Required('flagged_content')]
    public float $flaggedContent;

    /**
     * Total pieces of content.
     */
    #[Required('total_content')]
    public float $totalContent;

    /**
     * Average sentiment score of content (-1 to 1). Requires a sentiment model in your project.
     */
    #[Optional('average_sentiment', nullable: true)]
    public ?float $averageSentiment;

    /**
     * `new Metrics()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Metrics::with(flaggedContent: ..., totalContent: ...)
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
        float $flaggedContent,
        float $totalContent,
        ?float $averageSentiment = null
    ): self {
        $self = new self;

        $self['flaggedContent'] = $flaggedContent;
        $self['totalContent'] = $totalContent;

        null !== $averageSentiment && $self['averageSentiment'] = $averageSentiment;

        return $self;
    }

    /**
     * Number of flagged content pieces.
     */
    public function withFlaggedContent(float $flaggedContent): self
    {
        $self = clone $this;
        $self['flaggedContent'] = $flaggedContent;

        return $self;
    }

    /**
     * Total pieces of content.
     */
    public function withTotalContent(float $totalContent): self
    {
        $self = clone $this;
        $self['totalContent'] = $totalContent;

        return $self;
    }

    /**
     * Average sentiment score of content (-1 to 1). Requires a sentiment model in your project.
     */
    public function withAverageSentiment(?float $averageSentiment): self
    {
        $self = clone $this;
        $self['averageSentiment'] = $averageSentiment;

        return $self;
    }
}
