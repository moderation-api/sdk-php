<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type IllicitShape = array{id: 'illicit', flag: bool}
 */
final class Illicit implements BaseModel
{
    /** @use SdkModel<IllicitShape> */
    use SdkModel;

    /** @var 'illicit' $id */
    #[Required]
    public string $id = 'illicit';

    #[Required]
    public bool $flag;

    /**
     * `new Illicit()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Illicit::with(flag: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Illicit)->withFlag(...)
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
