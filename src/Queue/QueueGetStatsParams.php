<?php

declare(strict_types=1);

namespace ModerationAPI\Queue;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkParams;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Get detailed statistics about a moderation queue including review times, action counts, and trends.
 *
 * @see ModerationAPI\Services\QueueService::getStats()
 *
 * @phpstan-type QueueGetStatsParamsShape = array{withinDays?: string|null}
 */
final class QueueGetStatsParams implements BaseModel
{
    /** @use SdkModel<QueueGetStatsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Number of days to analyze statistics for.
     */
    #[Optional]
    public ?string $withinDays;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $withinDays = null): self
    {
        $self = new self;

        null !== $withinDays && $self['withinDays'] = $withinDays;

        return $self;
    }

    /**
     * Number of days to analyze statistics for.
     */
    public function withWithinDays(string $withinDays): self
    {
        $self = clone $this;
        $self['withinDays'] = $withinDays;

        return $self;
    }
}
