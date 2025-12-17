<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\QueueGetResponse\Queue\Filter;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Queue\QueueGetResponse\Queue\Filter\FilterLabel\Type;

/**
 * @phpstan-type FilterLabelShape = array{
 *   label: string,
 *   type: Type|value-of<Type>,
 *   maxThreshold?: float|null,
 *   minThreshold?: float|null,
 * }
 */
final class FilterLabel implements BaseModel
{
    /** @use SdkModel<FilterLabelShape> */
    use SdkModel;

    #[Required]
    public string $label;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional(nullable: true)]
    public ?float $maxThreshold;

    #[Optional(nullable: true)]
    public ?float $minThreshold;

    /**
     * `new FilterLabel()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FilterLabel::with(label: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FilterLabel)->withLabel(...)->withType(...)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $label,
        Type|string $type,
        ?float $maxThreshold = null,
        ?float $minThreshold = null,
    ): self {
        $self = new self;

        $self['label'] = $label;
        $self['type'] = $type;

        null !== $maxThreshold && $self['maxThreshold'] = $maxThreshold;
        null !== $minThreshold && $self['minThreshold'] = $minThreshold;

        return $self;
    }

    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withMaxThreshold(?float $maxThreshold): self
    {
        $self = clone $this;
        $self['maxThreshold'] = $maxThreshold;

        return $self;
    }

    public function withMinThreshold(?float $minThreshold): self
    {
        $self = clone $this;
        $self['minThreshold'] = $minThreshold;

        return $self;
    }
}
