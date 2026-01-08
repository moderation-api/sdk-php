<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\QueueGetStatsResponse;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Queue\QueueGetStatsResponse\Trends\DailyReviewCount;
use ModerationAPI\Queue\QueueGetStatsResponse\Trends\FlaggedContentTrend;

/**
 * @phpstan-import-type DailyReviewCountShape from \ModerationAPI\Queue\QueueGetStatsResponse\Trends\DailyReviewCount
 * @phpstan-import-type FlaggedContentTrendShape from \ModerationAPI\Queue\QueueGetStatsResponse\Trends\FlaggedContentTrend
 *
 * @phpstan-type TrendsShape = array{
 *   dailyReviewCounts: list<DailyReviewCount|DailyReviewCountShape>,
 *   flaggedContentTrends: list<FlaggedContentTrend|FlaggedContentTrendShape>,
 * }
 */
final class Trends implements BaseModel
{
    /** @use SdkModel<TrendsShape> */
    use SdkModel;

    /** @var list<DailyReviewCount> $dailyReviewCounts */
    #[Required(list: DailyReviewCount::class)]
    public array $dailyReviewCounts;

    /** @var list<FlaggedContentTrend> $flaggedContentTrends */
    #[Required(list: FlaggedContentTrend::class)]
    public array $flaggedContentTrends;

    /**
     * `new Trends()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Trends::with(dailyReviewCounts: ..., flaggedContentTrends: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Trends)->withDailyReviewCounts(...)->withFlaggedContentTrends(...)
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
     * @param list<DailyReviewCount|DailyReviewCountShape> $dailyReviewCounts
     * @param list<FlaggedContentTrend|FlaggedContentTrendShape> $flaggedContentTrends
     */
    public static function with(
        array $dailyReviewCounts,
        array $flaggedContentTrends
    ): self {
        $self = new self;

        $self['dailyReviewCounts'] = $dailyReviewCounts;
        $self['flaggedContentTrends'] = $flaggedContentTrends;

        return $self;
    }

    /**
     * @param list<DailyReviewCount|DailyReviewCountShape> $dailyReviewCounts
     */
    public function withDailyReviewCounts(array $dailyReviewCounts): self
    {
        $self = clone $this;
        $self['dailyReviewCounts'] = $dailyReviewCounts;

        return $self;
    }

    /**
     * @param list<FlaggedContentTrend|FlaggedContentTrendShape> $flaggedContentTrends
     */
    public function withFlaggedContentTrends(array $flaggedContentTrends): self
    {
        $self = clone $this;
        $self['flaggedContentTrends'] = $flaggedContentTrends;

        return $self;
    }
}
