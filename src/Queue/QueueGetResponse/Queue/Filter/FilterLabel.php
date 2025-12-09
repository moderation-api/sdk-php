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
 *   type: value-of<Type>,
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
        $obj = new self;

        $obj['label'] = $label;
        $obj['type'] = $type;

        null !== $maxThreshold && $obj['maxThreshold'] = $maxThreshold;
        null !== $minThreshold && $obj['minThreshold'] = $minThreshold;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withMaxThreshold(?float $maxThreshold): self
    {
        $obj = clone $this;
        $obj['maxThreshold'] = $maxThreshold;

        return $obj;
    }

    public function withMinThreshold(?float $minThreshold): self
    {
        $obj = clone $this;
        $obj['minThreshold'] = $minThreshold;

        return $obj;
    }
}
