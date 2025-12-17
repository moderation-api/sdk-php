<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type ReligionShape = array{id: 'religion', flag: bool}
 */
final class Religion implements BaseModel
{
    /** @use SdkModel<ReligionShape> */
    use SdkModel;

    /** @var 'religion' $id */
    #[Required]
    public string $id = 'religion';

    #[Required]
    public bool $flag;

    /**
     * `new Religion()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Religion::with(flag: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Religion)->withFlag(...)
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
    public static function with(bool $flag): self
    {
        $self = new self;

        $self['flag'] = $flag;

        return $self;
    }

    public function withFlag(bool $flag): self
    {
        $self = clone $this;
        $self['flag'] = $flag;

        return $self;
    }
}
