<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\QueueGetStatsResponse\Trends;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type FlaggedContentTrendShape = array{label: string, trend: float}
 */
final class FlaggedContentTrend implements BaseModel
{
    /** @use SdkModel<FlaggedContentTrendShape> */
    use SdkModel;

    /**
     * Content flag/label.
     */
    #[Api]
    public string $label;

    /**
     * Trend indicator (-1 to 1) showing if this type of flagged content is increasing or decreasing.
     */
    #[Api]
    public float $trend;

    /**
     * `new FlaggedContentTrend()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FlaggedContentTrend::with(label: ..., trend: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FlaggedContentTrend)->withLabel(...)->withTrend(...)
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
    public static function with(string $label, float $trend): self
    {
        $obj = new self;

        $obj['label'] = $label;
        $obj['trend'] = $trend;

        return $obj;
    }

    /**
     * Content flag/label.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    /**
     * Trend indicator (-1 to 1) showing if this type of flagged content is increasing or decreasing.
     */
    public function withTrend(float $trend): self
    {
        $obj = clone $this;
        $obj['trend'] = $trend;

        return $obj;
    }
}
