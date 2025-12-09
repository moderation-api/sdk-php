<?php

declare(strict_types=1);

namespace ModerationAPI\Actions;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type ActionDeleteResponseShape = array{id: string, deleted: bool}
 */
final class ActionDeleteResponse implements BaseModel
{
    /** @use SdkModel<ActionDeleteResponseShape> */
    use SdkModel;

    /**
     * The ID of the action.
     */
    #[Api]
    public string $id;

    /**
     * Whether the action was deleted.
     */
    #[Api]
    public bool $deleted;

    /**
     * `new ActionDeleteResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionDeleteResponse::with(id: ..., deleted: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionDeleteResponse)->withID(...)->withDeleted(...)
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
    public static function with(string $id, bool $deleted): self
    {
        $obj = new self;

        $obj['id'] = $id;
        $obj['deleted'] = $deleted;

        return $obj;
    }

    /**
     * The ID of the action.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Whether the action was deleted.
     */
    public function withDeleted(bool $deleted): self
    {
        $obj = clone $this;
        $obj['deleted'] = $deleted;

        return $obj;
    }
}
