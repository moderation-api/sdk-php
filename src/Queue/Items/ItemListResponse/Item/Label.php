<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\Items\ItemListResponse\Item;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type LabelShape = array{flagged: bool, label: string, score: float}
 */
final class Label implements BaseModel
{
    /** @use SdkModel<LabelShape> */
    use SdkModel;

    /**
     * Whether this label caused a flag.
     */
    #[Required]
    public bool $flagged;

    /**
     * Label name.
     */
    #[Required]
    public string $label;

    /**
     * Confidence score of the label.
     */
    #[Required]
    public float $score;

    /**
     * `new Label()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Label::with(flagged: ..., label: ..., score: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Label)->withFlagged(...)->withLabel(...)->withScore(...)
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
        bool $flagged,
        string $label,
        float $score
    ): self {
        $self = new self;

        $self['flagged'] = $flagged;
        $self['label'] = $label;
        $self['score'] = $score;

        return $self;
    }

    /**
     * Whether this label caused a flag.
     */
    public function withFlagged(bool $flagged): self
    {
        $self = clone $this;
        $self['flagged'] = $flagged;

        return $self;
    }

    /**
     * Label name.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * Confidence score of the label.
     */
    public function withScore(float $score): self
    {
        $self = clone $this;
        $self['score'] = $score;

        return $self;
    }
}
