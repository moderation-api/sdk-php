<?php

declare(strict_types=1);

namespace ModerationAPI\Queue;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkParams;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Get detailed statistics about a moderation queue including review times, action counts, and trends.
 *
 * @see ModerationAPI\Services\QueueService::getStats()
 *
 * @phpstan-type QueueGetStatsParamsShape = array{withinDays?: string}
 */
final class QueueGetStatsParams implements BaseModel
{
    /** @use SdkModel<QueueGetStatsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Number of days to analyze statistics for.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $withinDays && $obj['withinDays'] = $withinDays;

        return $obj;
    }

    /**
     * Number of days to analyze statistics for.
     */
    public function withWithinDays(string $withinDays): self
    {
        $obj = clone $this;
        $obj['withinDays'] = $withinDays;

        return $obj;
    }
}
