<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse\Policy;

use ModerationAPI\Content\ContentSubmitResponse\Policy\ClassifierOutput\Label;
use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Classifier policy.
 *
 * @phpstan-type ClassifierOutputShape = array{
 *   id: string,
 *   flagged: bool,
 *   probability: float,
 *   type?: 'classifier',
 *   flaggedFields?: list<string>|null,
 *   labels?: list<Label>|null,
 * }
 */
final class ClassifierOutput implements BaseModel
{
    /** @use SdkModel<ClassifierOutputShape> */
    use SdkModel;

    /** @var 'classifier' $type */
    #[Required]
    public string $type = 'classifier';

    /**
     * The unique identifier for the classifier output.
     */
    #[Required]
    public string $id;

    #[Required]
    public bool $flagged;

    #[Required]
    public float $probability;

    /**
     * The keys of the flagged fields if submitting an object.
     *
     * @var list<string>|null $flaggedFields
     */
    #[Optional('flagged_fields', list: 'string')]
    public ?array $flaggedFields;

    /** @var list<Label>|null $labels */
    #[Optional(list: Label::class)]
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
     * @param list<string> $flaggedFields
     * @param list<Label|array{id: string, flagged: bool, probability: float}> $labels
     */
    public static function with(
        string $id,
        bool $flagged,
        float $probability,
        ?array $flaggedFields = null,
        ?array $labels = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['flagged'] = $flagged;
        $self['probability'] = $probability;

        null !== $flaggedFields && $self['flaggedFields'] = $flaggedFields;
        null !== $labels && $self['labels'] = $labels;

        return $self;
    }

    /**
     * The unique identifier for the classifier output.
     */
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

    /**
     * The keys of the flagged fields if submitting an object.
     *
     * @param list<string> $flaggedFields
     */
    public function withFlaggedFields(array $flaggedFields): self
    {
        $self = clone $this;
        $self['flaggedFields'] = $flaggedFields;

        return $self;
    }

    /**
     * @param list<Label|array{id: string, flagged: bool, probability: float}> $labels
     */
    public function withLabels(array $labels): self
    {
        $self = clone $this;
        $self['labels'] = $labels;

        return $self;
    }
}
