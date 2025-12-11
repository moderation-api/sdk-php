<?php

declare(strict_types=1);

namespace ModerationAPI\Account\AccountListResponse;

use ModerationAPI\Core\Attributes\Required;
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
    #[Required]
    public string $id;

    /**
     * Name of the current project.
     */
    #[Required]
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
        $self = new self;

        $self['id'] = $id;
        $self['name'] = $name;

        return $self;
    }

    /**
     * ID of the current project.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Name of the current project.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
