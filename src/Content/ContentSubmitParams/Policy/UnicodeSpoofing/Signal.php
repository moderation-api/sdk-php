<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy\UnicodeSpoofing;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type SignalShape = array{flag?: bool|null}
 */
final class Signal implements BaseModel
{
    /** @use SdkModel<SignalShape> */
    use SdkModel;

    #[Optional]
    public ?bool $flag;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $flag = null): self
    {
        $self = new self;

        null !== $flag && $self['flag'] = $flag;

        return $self;
    }

    public function withFlag(bool $flag): self
    {
        $self = clone $this;
        $self['flag'] = $flag;

        return $self;
    }
}
