<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\QueueGetStatsResponse\TopReviewer;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type TopActionShape = array{
 *   actionID: string, actionName: string, count: float
 * }
 */
final class TopAction implements BaseModel
{
    /** @use SdkModel<TopActionShape> */
    use SdkModel;

    /**
     * Most used action by this reviewer.
     */
    #[Required('actionId')]
    public string $actionID;

    /**
     * Name of the most used action.
     */
    #[Required]
    public string $actionName;

    /**
     * Number of times this action was used.
     */
    #[Required]
    public float $count;

    /**
     * `new TopAction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TopAction::with(actionID: ..., actionName: ..., count: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TopAction)->withActionID(...)->withActionName(...)->withCount(...)
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
        float $count
    ): self {
        $obj = new self;

        $obj['actionID'] = $actionID;
        $obj['actionName'] = $actionName;
        $obj['count'] = $count;

        return $obj;
    }

    /**
     * Most used action by this reviewer.
     */
    public function withActionID(string $actionID): self
    {
        $obj = clone $this;
        $obj['actionID'] = $actionID;

        return $obj;
    }

    /**
     * Name of the most used action.
     */
    public function withActionName(string $actionName): self
    {
        $obj = clone $this;
        $obj['actionName'] = $actionName;

        return $obj;
    }

    /**
     * Number of times this action was used.
     */
    public function withCount(float $count): self
    {
        $obj = clone $this;
        $obj['count'] = $count;

        return $obj;
    }
}
