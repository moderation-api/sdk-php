<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy\URLMasking;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type EntityShape = array{
 *   enable?: bool|null,
 *   flag?: bool|null,
 *   mask?: string|null,
 *   shouldMask?: bool|null,
 * }
 */
final class Entity implements BaseModel
{
    /** @use SdkModel<EntityShape> */
    use SdkModel;

    #[Optional]
    public ?bool $enable;

    #[Optional]
    public ?bool $flag;

    #[Optional]
    public ?string $mask;

    #[Optional]
    public ?bool $shouldMask;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?bool $enable = null,
        ?bool $flag = null,
        ?string $mask = null,
        ?bool $shouldMask = null,
    ): self {
        $self = new self;

        null !== $enable && $self['enable'] = $enable;
        null !== $flag && $self['flag'] = $flag;
        null !== $mask && $self['mask'] = $mask;
        null !== $shouldMask && $self['shouldMask'] = $shouldMask;

        return $self;
    }

    public function withEnable(bool $enable): self
    {
        $self = clone $this;
        $self['enable'] = $enable;

        return $self;
    }

    public function withFlag(bool $flag): self
    {
        $self = clone $this;
        $self['flag'] = $flag;

        return $self;
    }

    public function withMask(string $mask): self
    {
        $self = clone $this;
        $self['mask'] = $mask;

        return $self;
    }

    public function withShouldMask(bool $shouldMask): self
    {
        $self = clone $this;
        $self['shouldMask'] = $shouldMask;

        return $self;
    }
}
