<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\QueueGetStatsResponse\Trends;

use ModerationAPI\Core\Attributes\Required;
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
    #[Required]
    public string $label;

    /**
     * Trend indicator (-1 to 1) showing if this type of flagged content is increasing or decreasing.
     */
    #[Required]
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
        $self = new self;

        $self['label'] = $label;
        $self['trend'] = $trend;

        return $self;
    }

    /**
     * Content flag/label.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * Trend indicator (-1 to 1) showing if this type of flagged content is increasing or decreasing.
     */
    public function withTrend(float $trend): self
    {
        $self = clone $this;
        $self['trend'] = $trend;

        return $self;
    }
}
