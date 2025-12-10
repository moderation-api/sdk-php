<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse\Policy\ClassifierOutput;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type LabelShape = array{id: string, flagged: bool, probability: float}
 */
final class Label implements BaseModel
{
    /** @use SdkModel<LabelShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public bool $flagged;

    #[Required]
    public float $probability;

    /**
     * `new Label()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Label::with(id: ..., flagged: ..., probability: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Label)->withID(...)->withFlagged(...)->withProbability(...)
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
    public static function with(
        string $id,
        bool $flagged,
        float $probability
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['flagged'] = $flagged;
        $self['probability'] = $probability;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withFlagged(bool $flagged): self
    {
        $self = clone $this;
        $self['flagged'] = $flagged;

        return $self;
    }

    public function withProbability(float $probability): self
    {
        $self = clone $this;
        $self['probability'] = $probability;

        return $self;
    }
}
