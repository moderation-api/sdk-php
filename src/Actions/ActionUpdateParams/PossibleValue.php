<?php

declare(strict_types=1);

namespace ModerationAPI\Actions\ActionUpdateParams;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type PossibleValueShape = array{value: string}
 */
final class PossibleValue implements BaseModel
{
    /** @use SdkModel<PossibleValueShape> */
    use SdkModel;

    /**
     * The value of the action.
     */
    #[Required]
    public string $value;

    /**
     * `new PossibleValue()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PossibleValue::with(value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PossibleValue)->withValue(...)
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
    public static function with(string $value): self
    {
        $self = new self;

        $self['value'] = $value;

        return $self;
    }

    /**
     * The value of the action.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
