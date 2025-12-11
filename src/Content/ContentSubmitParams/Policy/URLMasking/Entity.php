<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy\URLMasking;

use ModerationAPI\Content\ContentSubmitParams\Policy\URLMasking\Entity\ID;
use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type EntityShape = array{
 *   id: value-of<ID>,
 *   enable: bool,
 *   flag: bool,
 *   shouldMask: bool,
 *   mask?: string|null,
 * }
 */
final class Entity implements BaseModel
{
    /** @use SdkModel<EntityShape> */
    use SdkModel;

    /** @var value-of<ID> $id */
    #[Required(enum: ID::class)]
    public string $id;

    #[Required]
    public bool $enable;

    #[Required]
    public bool $flag;

    #[Required]
    public bool $shouldMask;

    #[Optional]
    public ?string $mask;

    /**
     * `new Entity()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Entity::with(id: ..., enable: ..., flag: ..., shouldMask: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Entity)->withID(...)->withEnable(...)->withFlag(...)->withShouldMask(...)
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
     *
     * @param ID|value-of<ID> $id
     */
    public static function with(
        ID|string $id,
        bool $enable,
        bool $flag,
        bool $shouldMask,
        ?string $mask = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['enable'] = $enable;
        $self['flag'] = $flag;
        $self['shouldMask'] = $shouldMask;

        null !== $mask && $self['mask'] = $mask;

        return $self;
    }

    /**
     * @param ID|value-of<ID> $id
     */
    public function withID(ID|string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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

    public function withShouldMask(bool $shouldMask): self
    {
        $self = clone $this;
        $self['shouldMask'] = $shouldMask;

        return $self;
    }

    public function withMask(string $mask): self
    {
        $self = clone $this;
        $self['mask'] = $mask;

        return $self;
    }
}
