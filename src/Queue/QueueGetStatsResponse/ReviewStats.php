<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\QueueGetStatsResponse;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type ReviewStatsShape = array{
 *   averageTimeToReview: float, totalPending: float, totalReviewed: float
 * }
 */
final class ReviewStats implements BaseModel
{
    /** @use SdkModel<ReviewStatsShape> */
    use SdkModel;

    /**
     * Average time in milliseconds to review an item.
     */
    #[Required]
    public float $averageTimeToReview;

    /**
     * Total number of items pending review.
     */
    #[Required]
    public float $totalPending;

    /**
     * Total number of items reviewed.
     */
    #[Required]
    public float $totalReviewed;

    /**
     * `new ReviewStats()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ReviewStats::with(
     *   averageTimeToReview: ..., totalPending: ..., totalReviewed: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ReviewStats)
     *   ->withAverageTimeToReview(...)
     *   ->withTotalPending(...)
     *   ->withTotalReviewed(...)
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
        float $averageTimeToReview,
        float $totalPending,
        float $totalReviewed
    ): self {
        $self = new self;

        $self['averageTimeToReview'] = $averageTimeToReview;
        $self['totalPending'] = $totalPending;
        $self['totalReviewed'] = $totalReviewed;

        return $self;
    }

    /**
     * Average time in milliseconds to review an item.
     */
    public function withAverageTimeToReview(float $averageTimeToReview): self
    {
        $self = clone $this;
        $self['averageTimeToReview'] = $averageTimeToReview;

        return $self;
    }

    /**
     * Total number of items pending review.
     */
    public function withTotalPending(float $totalPending): self
    {
        $self = clone $this;
        $self['totalPending'] = $totalPending;

        return $self;
    }

    /**
     * Total number of items reviewed.
     */
    public function withTotalReviewed(float $totalReviewed): self
    {
        $self = clone $this;
        $self['totalReviewed'] = $totalReviewed;

        return $self;
    }
}
