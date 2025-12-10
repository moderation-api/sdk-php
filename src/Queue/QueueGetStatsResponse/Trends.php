<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\QueueGetStatsResponse;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Queue\QueueGetStatsResponse\Trends\DailyReviewCount;
use ModerationAPI\Queue\QueueGetStatsResponse\Trends\FlaggedContentTrend;

/**
 * @phpstan-type TrendsShape = array{
 *   dailyReviewCounts: list<DailyReviewCount>,
 *   flaggedContentTrends: list<FlaggedContentTrend>,
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
     * @param list<DailyReviewCount|array{
     *   count: float, date: string
     * }> $dailyReviewCounts
     * @param list<FlaggedContentTrend|array{
     *   label: string, trend: float
     * }> $flaggedContentTrends
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
     * @param list<DailyReviewCount|array{
     *   count: float, date: string
     * }> $dailyReviewCounts
     */
    public function withDailyReviewCounts(array $dailyReviewCounts): self
    {
        $self = clone $this;
        $self['dailyReviewCounts'] = $dailyReviewCounts;

        return $self;
    }

    /**
     * @param list<FlaggedContentTrend|array{
     *   label: string, trend: float
     * }> $flaggedContentTrends
     */
    public function withFlaggedContentTrends(array $flaggedContentTrends): self
    {
        $self = clone $this;
        $self['flaggedContentTrends'] = $flaggedContentTrends;

        return $self;
    }
}
