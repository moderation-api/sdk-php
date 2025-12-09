<?php

declare(strict_types=1);

namespace ModerationAPI\Queue;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Queue\QueueGetStatsResponse\ActionStat;
use ModerationAPI\Queue\QueueGetStatsResponse\ReviewStats;
use ModerationAPI\Queue\QueueGetStatsResponse\TopReviewer;
use ModerationAPI\Queue\QueueGetStatsResponse\TopReviewer\TopAction;
use ModerationAPI\Queue\QueueGetStatsResponse\Trends;
use ModerationAPI\Queue\QueueGetStatsResponse\Trends\DailyReviewCount;
use ModerationAPI\Queue\QueueGetStatsResponse\Trends\FlaggedContentTrend;

/**
 * @phpstan-type QueueGetStatsResponseShape = array{
 *   actionStats: list<ActionStat>,
 *   reviewStats: ReviewStats,
 *   topReviewers: list<TopReviewer>,
 *   trends: Trends,
 * }
 */
final class QueueGetStatsResponse implements BaseModel
{
    /** @use SdkModel<QueueGetStatsResponseShape> */
    use SdkModel;

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
     * @param list<ActionStat|array{
     *   actionId: string, actionName: string, count: float, percentageOfTotal: float
     * }> $actionStats
     * @param ReviewStats|array{
     *   averageTimeToReview: float, totalPending: float, totalReviewed: float
     * } $reviewStats
     * @param list<TopReviewer|array{
     *   averageTimePerReview: float,
     *   name: string,
     *   reviewCount: float,
     *   topActions: list<TopAction>,
     *   userId: string,
     *   accuracyScore?: float|null,
     * }> $topReviewers
     * @param Trends|array{
     *   dailyReviewCounts: list<DailyReviewCount>,
     *   flaggedContentTrends: list<FlaggedContentTrend>,
     * } $trends
     */
    public static function with(
        array $actionStats,
        ReviewStats|array $reviewStats,
        array $topReviewers,
        Trends|array $trends,
    ): self {
        $obj = new self;

        $obj['actionStats'] = $actionStats;
        $obj['reviewStats'] = $reviewStats;
        $obj['topReviewers'] = $topReviewers;
        $obj['trends'] = $trends;

        return $obj;
    }

    /**
     * @param list<ActionStat|array{
     *   actionId: string, actionName: string, count: float, percentageOfTotal: float
     * }> $actionStats
     */
    public function withActionStats(array $actionStats): self
    {
        $obj = clone $this;
        $obj['actionStats'] = $actionStats;

        return $obj;
    }

    /**
     * @param ReviewStats|array{
     *   averageTimeToReview: float, totalPending: float, totalReviewed: float
     * } $reviewStats
     */
    public function withReviewStats(ReviewStats|array $reviewStats): self
    {
        $obj = clone $this;
        $obj['reviewStats'] = $reviewStats;

        return $obj;
    }

    /**
     * List of top reviewers and their statistics.
     *
     * @param list<TopReviewer|array{
     *   averageTimePerReview: float,
     *   name: string,
     *   reviewCount: float,
     *   topActions: list<TopAction>,
     *   userId: string,
     *   accuracyScore?: float|null,
     * }> $topReviewers
     */
    public function withTopReviewers(array $topReviewers): self
    {
        $obj = clone $this;
        $obj['topReviewers'] = $topReviewers;

        return $obj;
    }

    /**
     * @param Trends|array{
     *   dailyReviewCounts: list<DailyReviewCount>,
     *   flaggedContentTrends: list<FlaggedContentTrend>,
     * } $trends
     */
    public function withTrends(Trends|array $trends): self
    {
        $obj = clone $this;
        $obj['trends'] = $trends;

        return $obj;
    }
}
