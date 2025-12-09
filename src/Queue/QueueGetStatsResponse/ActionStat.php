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
        $obj = new self;

        $obj['actionID'] = $actionID;
        $obj['actionName'] = $actionName;
        $obj['count'] = $count;
        $obj['percentageOfTotal'] = $percentageOfTotal;

        return $obj;
    }

    /**
     * ID of the moderation action.
     */
    public function withActionID(string $actionID): self
    {
        $obj = clone $this;
        $obj['actionID'] = $actionID;

        return $obj;
    }

    /**
     * Name of the moderation action.
     */
    public function withActionName(string $actionName): self
    {
        $obj = clone $this;
        $obj['actionName'] = $actionName;

        return $obj;
    }

    /**
     * Number of times this action was taken.
     */
    public function withCount(float $count): self
    {
        $obj = clone $this;
        $obj['count'] = $count;

        return $obj;
    }

    /**
     * Percentage this action represents of all actions.
     */
    public function withPercentageOfTotal(float $percentageOfTotal): self
    {
        $obj = clone $this;
        $obj['percentageOfTotal'] = $percentageOfTotal;

        return $obj;
    }
}
