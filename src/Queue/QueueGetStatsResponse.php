<?php

declare(strict_types=1);

namespace ModerationAPI\Queue;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Queue\QueueGetStatsResponse\ActionStat;
use ModerationAPI\Queue\QueueGetStatsResponse\ReviewStats;
use ModerationAPI\Queue\QueueGetStatsResponse\TopReviewer;
use ModerationAPI\Queue\QueueGetStatsResponse\Trends;

/**
 * @phpstan-import-type ActionStatShape from \ModerationAPI\Queue\QueueGetStatsResponse\ActionStat
 * @phpstan-import-type ReviewStatsShape from \ModerationAPI\Queue\QueueGetStatsResponse\ReviewStats
 * @phpstan-import-type TopReviewerShape from \ModerationAPI\Queue\QueueGetStatsResponse\TopReviewer
 * @phpstan-import-type TrendsShape from \ModerationAPI\Queue\QueueGetStatsResponse\Trends
 *
 * @phpstan-type QueueGetStatsResponseShape = array{
 *   actionStats: list<ActionStat|ActionStatShape>,
 *   reviewStats: ReviewStats|ReviewStatsShape,
 *   topReviewers: list<TopReviewer|TopReviewerShape>,
 *   trends: Trends|TrendsShape,
 * }
 */
final class QueueGetStatsResponse implements BaseModel
{
    /** @use SdkModel<QueueGetStatsResponseShape> */
    use SdkModel;

    /** @var list<ActionStat> $actionStats */
    #[Required(list: ActionStat::class)]
    public array $actionStats;

    #[Required]
    public ReviewStats $reviewStats;

    /**
     * List of top reviewers and their statistics.
     *
     * @var list<TopReviewer> $topReviewers
     */
    #[Required(list: TopReviewer::class)]
    public array $topReviewers;

    #[Required]
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
     * @param list<ActionStat|ActionStatShape> $actionStats
     * @param ReviewStats|ReviewStatsShape $reviewStats
     * @param list<TopReviewer|TopReviewerShape> $topReviewers
     * @param Trends|TrendsShape $trends
     */
    public static function with(
        array $actionStats,
        ReviewStats|array $reviewStats,
        array $topReviewers,
        Trends|array $trends,
    ): self {
        $self = new self;

        $self['actionStats'] = $actionStats;
        $self['reviewStats'] = $reviewStats;
        $self['topReviewers'] = $topReviewers;
        $self['trends'] = $trends;

        return $self;
    }

    /**
     * @param list<ActionStat|ActionStatShape> $actionStats
     */
    public function withActionStats(array $actionStats): self
    {
        $self = clone $this;
        $self['actionStats'] = $actionStats;

        return $self;
    }

    /**
     * @param ReviewStats|ReviewStatsShape $reviewStats
     */
    public function withReviewStats(ReviewStats|array $reviewStats): self
    {
        $self = clone $this;
        $self['reviewStats'] = $reviewStats;

        return $self;
    }

    /**
     * List of top reviewers and their statistics.
     *
     * @param list<TopReviewer|TopReviewerShape> $topReviewers
     */
    public function withTopReviewers(array $topReviewers): self
    {
        $self = clone $this;
        $self['topReviewers'] = $topReviewers;

        return $self;
    }

    /**
     * @param Trends|TrendsShape $trends
     */
    public function withTrends(Trends|array $trends): self
    {
        $self = clone $this;
        $self['trends'] = $trends;

        return $self;
    }
}
