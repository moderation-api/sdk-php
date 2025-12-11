<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type ToxicityShape = array{id?: 'toxicity', flag: bool}
 */
final class Toxicity implements BaseModel
{
    /** @use SdkModel<ToxicityShape> */
    use SdkModel;

    /** @var 'toxicity' $id */
    #[Required]
    public string $id = 'toxicity';

    #[Required]
    public bool $flag;

    /**
     * `new Toxicity()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Toxicity::with(flag: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Toxicity)->withFlag(...)
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
