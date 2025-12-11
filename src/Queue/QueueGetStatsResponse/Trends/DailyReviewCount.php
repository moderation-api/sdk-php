<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\QueueGetStatsResponse\Trends;

use ModerationAPI\Core\Attributes\Required;
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
    #[Required]
    public float $count;

    /**
     * Date in YYYY-MM-DD format.
     */
    #[Required]
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
        $self = new self;

        $self['count'] = $count;
        $self['date'] = $date;

        return $self;
    }

    /**
     * Number of reviews on this date.
     */
    public function withCount(float $count): self
    {
        $self = clone $this;
        $self['count'] = $count;

        return $self;
    }

    /**
     * Date in YYYY-MM-DD format.
     */
    public function withDate(string $date): self
    {
        $self = clone $this;
        $self['date'] = $date;

        return $self;
    }
}
