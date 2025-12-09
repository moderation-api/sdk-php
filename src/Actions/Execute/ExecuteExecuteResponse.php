<?php

declare(strict_types=1);

namespace ModerationAPI\Actions\Execute;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Execution result.
 *
 * @phpstan-type ExecuteExecuteResponseShape = array{success: bool}
 */
final class ExecuteExecuteResponse implements BaseModel
{
    /** @use SdkModel<ExecuteExecuteResponseShape> */
    use SdkModel;

    /**
     * Whether the action was executed successfully.
     */
    #[Required]
    public bool $success;

    /**
     * `new ExecuteExecuteResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExecuteExecuteResponse::with(success: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExecuteExecuteResponse)->withSuccess(...)
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
    public static function with(bool $success): self
    {
        $obj = new self;

        $obj['success'] = $success;

        return $obj;
    }

    /**
     * Whether the action was executed successfully.
     */
    public function withSuccess(bool $success): self
    {
        $obj = clone $this;
        $obj['success'] = $success;

        return $obj;
    }
}
