<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse\Policy\ClassifierOutput;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type LabelShape = array{id: string, flagged: bool, probability: float}
 */
final class Label implements BaseModel
{
    /** @use SdkModel<LabelShape> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public bool $flagged;

    #[Api]
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
        $obj = new self;

        $obj->id = $id;
        $obj->flagged = $flagged;
        $obj->probability = $probability;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withFlagged(bool $flagged): self
    {
        $obj = clone $this;
        $obj->flagged = $flagged;

        return $obj;
    }

    public function withProbability(float $probability): self
    {
        $obj = clone $this;
        $obj->probability = $probability;

        return $obj;
    }
}
