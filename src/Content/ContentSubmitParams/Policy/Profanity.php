<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type ProfanityShape = array{id?: 'profanity', flag: bool}
 */
final class Profanity implements BaseModel
{
    /** @use SdkModel<ProfanityShape> */
    use SdkModel;

    /** @var 'profanity' $id */
    #[Required]
    public string $id = 'profanity';

    #[Required]
    public bool $flag;

    /**
     * `new Profanity()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Profanity::with(flag: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Profanity)->withFlag(...)
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
