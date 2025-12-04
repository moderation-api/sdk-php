<?php

declare(strict_types=1);

namespace ModerationAPI\Queue;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkResponse;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Core\Conversion\Contracts\ResponseConverter;
use ModerationAPI\Queue\QueueGetStatsResponse\ActionStat;
use ModerationAPI\Queue\QueueGetStatsResponse\ReviewStats;
use ModerationAPI\Queue\QueueGetStatsResponse\TopReviewer;
use ModerationAPI\Queue\QueueGetStatsResponse\Trends;

/**
 * @phpstan-type QueueGetStatsResponseShape = array{
 *   actionStats: list<ActionStat>,
 *   reviewStats: ReviewStats,
 *   topReviewers: list<TopReviewer>,
 *   trends: Trends,
 * }
 */
final class QueueGetStatsResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<QueueGetStatsResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<ActionStat> $actionStats */
    #[Api(list: ActionStat::class)]
    public array $actionStats;

    #[Api]
    public ReviewStats $reviewStats;

    /**
     * List of top reviewers and their statistics.
     *
     * @var list<TopReviewer> $topReviewers
     */
    #[Api(list: TopReviewer::class)]
    public array $topReviewers;

    #[Api]
    public Trends $trends;

    /**
     * `new QueueGetStatsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * QueueGetStatsResponse::with(
     *   actionStats: ..., reviewStats: ..., topReviewers: ..., trends: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new QueueGetStatsResponse)
     *   ->withActionStats(...)
     *   ->withReviewStats(...)
     *   ->withTopReviewers(...)
     *   ->withTrends(...)
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
     * @param list<ActionStat> $actionStats
     * @param list<TopReviewer> $topReviewers
     */
    public static function with(
        array $actionStats,
        ReviewStats $reviewStats,
        array $topReviewers,
        Trends $trends,
    ): self {
        $obj = new self;

        $obj->actionStats = $actionStats;
        $obj->reviewStats = $reviewStats;
        $obj->topReviewers = $topReviewers;
        $obj->trends = $trends;

        return $obj;
    }

    /**
     * @param list<ActionStat> $actionStats
     */
    public function withActionStats(array $actionStats): self
    {
        $obj = clone $this;
        $obj->actionStats = $actionStats;

        return $obj;
    }

    public function withReviewStats(ReviewStats $reviewStats): self
    {
        $obj = clone $this;
        $obj->reviewStats = $reviewStats;

        return $obj;
    }

    /**
     * List of top reviewers and their statistics.
     *
     * @param list<TopReviewer> $topReviewers
     */
    public function withTopReviewers(array $topReviewers): self
    {
        $obj = clone $this;
        $obj->topReviewers = $topReviewers;

        return $obj;
    }

    public function withTrends(Trends $trends): self
    {
        $obj = clone $this;
        $obj->trends = $trends;

        return $obj;
    }
}
