<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\QueueGetStatsResponse;

use ModerationAPI\Core\Attributes\Api;
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
    #[Api(list: DailyReviewCount::class)]
    public array $dailyReviewCounts;

    /** @var list<FlaggedContentTrend> $flaggedContentTrends */
    #[Api(list: FlaggedContentTrend::class)]
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
     * @param list<DailyReviewCount> $dailyReviewCounts
     * @param list<FlaggedContentTrend> $flaggedContentTrends
     */
    public static function with(
        array $dailyReviewCounts,
        array $flaggedContentTrends
    ): self {
        $obj = new self;

        $obj->dailyReviewCounts = $dailyReviewCounts;
        $obj->flaggedContentTrends = $flaggedContentTrends;

        return $obj;
    }

    /**
     * @param list<DailyReviewCount> $dailyReviewCounts
     */
    public function withDailyReviewCounts(array $dailyReviewCounts): self
    {
        $obj = clone $this;
        $obj->dailyReviewCounts = $dailyReviewCounts;

        return $obj;
    }

    /**
     * @param list<FlaggedContentTrend> $flaggedContentTrends
     */
    public function withFlaggedContentTrends(array $flaggedContentTrends): self
    {
        $obj = clone $this;
        $obj->flaggedContentTrends = $flaggedContentTrends;

        return $obj;
    }
}
