<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\QueueGetStatsResponse\Trends;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type DailyReviewCountShape = array{count: float, date: string}
 */
final class DailyReviewCount implements BaseModel
{
    /** @use SdkModel<DailyReviewCountShape> */
    use SdkModel;

    /**
     * Number of reviews on this date.
     */
    #[Api]
    public float $count;

    /**
     * Date in YYYY-MM-DD format.
     */
    #[Api]
    public string $date;

    /**
     * `new DailyReviewCount()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DailyReviewCount::with(count: ..., date: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DailyReviewCount)->withCount(...)->withDate(...)
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
    public static function with(float $count, string $date): self
    {
        $obj = new self;

        $obj->count = $count;
        $obj->date = $date;

        return $obj;
    }

    /**
     * Number of reviews on this date.
     */
    public function withCount(float $count): self
    {
        $obj = clone $this;
        $obj->count = $count;

        return $obj;
    }

    /**
     * Date in YYYY-MM-DD format.
     */
    public function withDate(string $date): self
    {
        $obj = clone $this;
        $obj->date = $date;

        return $obj;
    }
}
