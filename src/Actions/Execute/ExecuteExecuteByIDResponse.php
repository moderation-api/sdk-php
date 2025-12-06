<?php

declare(strict_types=1);

namespace ModerationAPI\Actions\Execute;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkResponse;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type ExecuteExecuteByIDResponseShape = array{
 *   actionId: string, ids: list<string>, success: bool
 * }
 */
final class ExecuteExecuteByIDResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ExecuteExecuteByIDResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The ID of the action.
     */
    #[Api]
    public string $actionId;

    /**
     * The IDs of the content items.
     *
     * @var list<string> $ids
     */
    #[Api(list: 'string')]
    public array $ids;

    /**
     * Action executed successfully.
     */
    #[Api]
    public bool $success;

    /**
     * `new ExecuteExecuteByIDResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExecuteExecuteByIDResponse::with(actionId: ..., ids: ..., success: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExecuteExecuteByIDResponse)
     *   ->withActionID(...)
     *   ->withIDs(...)
     *   ->withSuccess(...)
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
     *
     * @param list<string> $ids
     */
    public static function with(
        string $actionId,
        array $ids,
        bool $success
    ): self {
        $obj = new self;

        $obj['actionId'] = $actionId;
        $obj['ids'] = $ids;
        $obj['success'] = $success;

        return $obj;
    }

    /**
     * The ID of the action.
     */
    public function withActionID(string $actionID): self
    {
        $obj = clone $this;
        $obj['actionId'] = $actionID;

        return $obj;
    }

    /**
     * The IDs of the content items.
     *
     * @param list<string> $ids
     */
    public function withIDs(array $ids): self
    {
        $obj = clone $this;
        $obj['ids'] = $ids;

        return $obj;
    }

    /**
     * Action executed successfully.
     */
    public function withSuccess(bool $success): self
    {
        $obj = clone $this;
        $obj['success'] = $success;

        return $obj;
    }
}
