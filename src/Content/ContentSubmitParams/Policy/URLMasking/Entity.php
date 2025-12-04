<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy\URLMasking;

use ModerationAPI\Content\ContentSubmitParams\Policy\URLMasking\Entity\ID;
use ModerationAPI\Core\Attributes\Api;
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
    #[Api(enum: ID::class)]
    public string $id;

    #[Api]
    public bool $enable;

    #[Api]
    public bool $flag;

    #[Api]
    public bool $shouldMask;

    #[Api(optional: true)]
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
        $obj = new self;

        $obj['id'] = $id;
        $obj->enable = $enable;
        $obj->flag = $flag;
        $obj->shouldMask = $shouldMask;

        null !== $mask && $obj->mask = $mask;

        return $obj;
    }

    /**
     * @param ID|value-of<ID> $id
     */
    public function withID(ID|string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withEnable(bool $enable): self
    {
        $obj = clone $this;
        $obj->enable = $enable;

        return $obj;
    }

    public function withFlag(bool $flag): self
    {
        $obj = clone $this;
        $obj->flag = $flag;

        return $obj;
    }

    public function withShouldMask(bool $shouldMask): self
    {
        $obj = clone $this;
        $obj->shouldMask = $shouldMask;

        return $obj;
    }

    public function withMask(string $mask): self
    {
        $obj = clone $this;
        $obj->mask = $mask;

        return $obj;
    }
}
