<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\QueueGetStatsResponse;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type ActionStatShape = array{
 *   actionID: string, actionName: string, count: float, percentageOfTotal: float
 * }
 */
final class ActionStat implements BaseModel
{
    /** @use SdkModel<ActionStatShape> */
    use SdkModel;

    /**
     * ID of the moderation action.
     */
    #[Required('actionId')]
    public string $actionID;

    /**
     * Name of the moderation action.
     */
    #[Required]
    public string $actionName;

    /**
     * Number of times this action was taken.
     */
    #[Required]
    public float $count;

    /**
     * Percentage this action represents of all actions.
     */
    #[Required]
    public float $percentageOfTotal;

    /**
     * `new ActionStat()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionStat::with(
     *   actionID: ..., actionName: ..., count: ..., percentageOfTotal: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionStat)
     *   ->withActionID(...)
     *   ->withActionName(...)
     *   ->withCount(...)
     *   ->withPercentageOfTotal(...)
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
    public static function with(
        string $actionID,
        string $actionName,
        float $count,
        float $percentageOfTotal
    ): self {
        $self = new self;

        $self['actionID'] = $actionID;
        $self['actionName'] = $actionName;
        $self['count'] = $count;
        $self['percentageOfTotal'] = $percentageOfTotal;

        return $self;
    }

    /**
     * ID of the moderation action.
     */
    public function withActionID(string $actionID): self
    {
        $self = clone $this;
        $self['actionID'] = $actionID;

        return $self;
    }

    /**
     * Name of the moderation action.
     */
    public function withActionName(string $actionName): self
    {
        $self = clone $this;
        $self['actionName'] = $actionName;

        return $self;
    }

    /**
     * Number of times this action was taken.
     */
    public function withCount(float $count): self
    {
        $self = clone $this;
        $self['count'] = $count;

        return $self;
    }

    /**
     * Percentage this action represents of all actions.
     */
    public function withPercentageOfTotal(float $percentageOfTotal): self
    {
        $self = clone $this;
        $self['percentageOfTotal'] = $percentageOfTotal;

        return $self;
    }
}
