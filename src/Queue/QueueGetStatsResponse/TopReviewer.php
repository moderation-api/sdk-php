<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\QueueGetStatsResponse;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Queue\QueueGetStatsResponse\TopReviewer\TopAction;

/**
 * @phpstan-type TopReviewerShape = array{
 *   averageTimePerReview: float,
 *   name: string,
 *   reviewCount: float,
 *   topActions: list<TopAction>,
 *   userID: string,
 *   accuracyScore?: float|null,
 * }
 */
final class TopReviewer implements BaseModel
{
    /** @use SdkModel<TopReviewerShape> */
    use SdkModel;

    /**
     * Average review time in milliseconds.
     */
    #[Required]
    public float $averageTimePerReview;

    /**
     * Name of the reviewer.
     */
    #[Required]
    public string $name;

    /**
     * Number of items reviewed.
     */
    #[Required]
    public float $reviewCount;

    /**
     * Most common actions taken by this reviewer.
     *
     * @var list<TopAction> $topActions
     */
    #[Required(list: TopAction::class)]
    public array $topActions;

    /**
     * ID of the reviewer.
     */
    #[Required('userId')]
    public string $userID;

    /**
     * Optional accuracy score based on review quality metrics.
     */
    #[Optional]
    public ?float $accuracyScore;

    /**
     * `new TopReviewer()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TopReviewer::with(
     *   averageTimePerReview: ...,
     *   name: ...,
     *   reviewCount: ...,
     *   topActions: ...,
     *   userID: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TopReviewer)
     *   ->withAverageTimePerReview(...)
     *   ->withName(...)
     *   ->withReviewCount(...)
     *   ->withTopActions(...)
     *   ->withUserID(...)
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
     * @param list<TopAction|array{
     *   actionID: string, actionName: string, count: float
     * }> $topActions
     */
    public static function with(
        float $averageTimePerReview,
        string $name,
        float $reviewCount,
        array $topActions,
        string $userID,
        ?float $accuracyScore = null,
    ): self {
        $obj = new self;

        $obj['averageTimePerReview'] = $averageTimePerReview;
        $obj['name'] = $name;
        $obj['reviewCount'] = $reviewCount;
        $obj['topActions'] = $topActions;
        $obj['userID'] = $userID;

        null !== $accuracyScore && $obj['accuracyScore'] = $accuracyScore;

        return $obj;
    }

    /**
     * Average review time in milliseconds.
     */
    public function withAverageTimePerReview(float $averageTimePerReview): self
    {
        $obj = clone $this;
        $obj['averageTimePerReview'] = $averageTimePerReview;

        return $obj;
    }

    /**
     * Name of the reviewer.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Number of items reviewed.
     */
    public function withReviewCount(float $reviewCount): self
    {
        $obj = clone $this;
        $obj['reviewCount'] = $reviewCount;

        return $obj;
    }

    /**
     * Most common actions taken by this reviewer.
     *
     * @param list<TopAction|array{
     *   actionID: string, actionName: string, count: float
     * }> $topActions
     */
    public function withTopActions(array $topActions): self
    {
        $obj = clone $this;
        $obj['topActions'] = $topActions;

        return $obj;
    }

    /**
     * ID of the reviewer.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['userID'] = $userID;

        return $obj;
    }

    /**
     * Optional accuracy score based on review quality metrics.
     */
    public function withAccuracyScore(float $accuracyScore): self
    {
        $obj = clone $this;
        $obj['accuracyScore'] = $accuracyScore;

        return $obj;
    }
}
