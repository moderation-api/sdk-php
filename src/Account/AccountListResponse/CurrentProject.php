<?php

declare(strict_types=1);

namespace ModerationAPI\Account\AccountListResponse;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type CurrentProjectShape = array{id: string, name: string}
 */
final class CurrentProject implements BaseModel
{
    /** @use SdkModel<CurrentProjectShape> */
    use SdkModel;

    /**
     * ID of the current project.
     */
    #[Api]
    public string $id;

    /**
     * Name of the current project.
     */
    #[Api]
    public string $name;

    /**
     * `new CurrentProject()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CurrentProject::with(id: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CurrentProject)->withID(...)->withName(...)
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
    public static function with(string $id, string $name): self
    {
        $obj = new self;

        $obj->id = $id;
        $obj->name = $name;

        return $obj;
    }

    /**
     * ID of the current project.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Name of the current project.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
