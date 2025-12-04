<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\QueueGetStatsResponse;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type ActionStatShape = array{
 *   actionId: string, actionName: string, count: float, percentageOfTotal: float
 * }
 */
final class ActionStat implements BaseModel
{
    /** @use SdkModel<ActionStatShape> */
    use SdkModel;

    /**
     * ID of the moderation action.
     */
    #[Api]
    public string $actionId;

    /**
     * Name of the moderation action.
     */
    #[Api]
    public string $actionName;

    /**
     * Number of times this action was taken.
     */
    #[Api]
    public float $count;

    /**
     * Percentage this action represents of all actions.
     */
    #[Api]
    public float $percentageOfTotal;

    /**
     * `new ActionStat()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionStat::with(
     *   actionId: ..., actionName: ..., count: ..., percentageOfTotal: ...
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
        string $actionId,
        string $actionName,
        float $count,
        float $percentageOfTotal
    ): self {
        $obj = new self;

        $obj->actionId = $actionId;
        $obj->actionName = $actionName;
        $obj->count = $count;
        $obj->percentageOfTotal = $percentageOfTotal;

        return $obj;
    }

    /**
     * ID of the moderation action.
     */
    public function withActionID(string $actionID): self
    {
        $obj = clone $this;
        $obj->actionId = $actionID;

        return $obj;
    }

    /**
     * Name of the moderation action.
     */
    public function withActionName(string $actionName): self
    {
        $obj = clone $this;
        $obj->actionName = $actionName;

        return $obj;
    }

    /**
     * Number of times this action was taken.
     */
    public function withCount(float $count): self
    {
        $obj = clone $this;
        $obj->count = $count;

        return $obj;
    }

    /**
     * Percentage this action represents of all actions.
     */
    public function withPercentageOfTotal(float $percentageOfTotal): self
    {
        $obj = clone $this;
        $obj->percentageOfTotal = $percentageOfTotal;

        return $obj;
    }
}
