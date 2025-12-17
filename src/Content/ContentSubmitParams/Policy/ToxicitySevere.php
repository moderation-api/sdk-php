<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type ToxicitySevereShape = array{id: 'toxicity_severe', flag: bool}
 */
final class ToxicitySevere implements BaseModel
{
    /** @use SdkModel<ToxicitySevereShape> */
    use SdkModel;

    /** @var 'toxicity_severe' $id */
    #[Required]
    public string $id = 'toxicity_severe';

    #[Required]
    public bool $flag;

    /**
     * `new ToxicitySevere()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ToxicitySevere::with(flag: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ToxicitySevere)->withFlag(...)
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
