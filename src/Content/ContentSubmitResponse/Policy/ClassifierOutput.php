<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse\Policy;

use ModerationAPI\Content\ContentSubmitResponse\Policy\ClassifierOutput\Label;
use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Classifier policy.
 *
 * @phpstan-type ClassifierOutputShape = array{
 *   id: string,
 *   flagged: bool,
 *   probability: float,
 *   type: 'classifier',
 *   flagged_fields?: list<string>|null,
 *   labels?: list<Label>|null,
 * }
 */
final class ClassifierOutput implements BaseModel
{
    /** @use SdkModel<ClassifierOutputShape> */
    use SdkModel;

    /** @var 'classifier' $type */
    #[Api]
    public string $type = 'classifier';

    /**
     * The unique identifier for the classifier output.
     */
    #[Api]
    public string $id;

    #[Api]
    public bool $flagged;

    #[Api]
    public float $probability;

    /**
     * The keys of the flagged fields if submitting an object.
     *
     * @var list<string>|null $flagged_fields
     */
    #[Api(list: 'string', optional: true)]
    public ?array $flagged_fields;

    /** @var list<Label>|null $labels */
    #[Api(list: Label::class, optional: true)]
    public ?array $labels;

    /**
     * `new ClassifierOutput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ClassifierOutput::with(id: ..., flagged: ..., probability: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ClassifierOutput)->withID(...)->withFlagged(...)->withProbability(...)
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
     * @param list<string> $flagged_fields
     * @param list<Label> $labels
     */
    public static function with(
        string $id,
        bool $flagged,
        float $probability,
        ?array $flagged_fields = null,
        ?array $labels = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->flagged = $flagged;
        $obj->probability = $probability;

        null !== $flagged_fields && $obj->flagged_fields = $flagged_fields;
        null !== $labels && $obj->labels = $labels;

        return $obj;
    }

    /**
     * The unique identifier for the classifier output.
     */
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

    /**
     * The keys of the flagged fields if submitting an object.
     *
     * @param list<string> $flaggedFields
     */
    public function withFlaggedFields(array $flaggedFields): self
    {
        $obj = clone $this;
        $obj->flagged_fields = $flaggedFields;

        return $obj;
    }

    /**
     * @param list<Label> $labels
     */
    public function withLabels(array $labels): self
    {
        $obj = clone $this;
        $obj->labels = $labels;

        return $obj;
    }
}
