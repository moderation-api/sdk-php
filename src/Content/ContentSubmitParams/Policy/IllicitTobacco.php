<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type IllicitTobaccoShape = array{id: 'illicit_tobacco', flag: bool}
 */
final class IllicitTobacco implements BaseModel
{
    /** @use SdkModel<IllicitTobaccoShape> */
    use SdkModel;

    /** @var 'illicit_tobacco' $id */
    #[Required]
    public string $id = 'illicit_tobacco';

    #[Required]
    public bool $flag;

    /**
     * `new IllicitTobacco()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IllicitTobacco::with(flag: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IllicitTobacco)->withFlag(...)
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
