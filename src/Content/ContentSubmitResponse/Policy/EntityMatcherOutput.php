<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse\Policy;

use ModerationAPI\Content\ContentSubmitResponse\Policy\EntityMatcherOutput\Match_;
use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Entity matcher policy.
 *
 * @phpstan-type EntityMatcherOutputShape = array{
 *   id: string,
 *   flagged: bool,
 *   matches: list<Match_>,
 *   probability: float,
 *   type?: 'entity_matcher',
 *   flaggedFields?: list<string>|null,
 * }
 */
final class EntityMatcherOutput implements BaseModel
{
    /** @use SdkModel<EntityMatcherOutputShape> */
    use SdkModel;

    /** @var 'entity_matcher' $type */
    #[Required]
    public string $type = 'entity_matcher';

    #[Required]
    public string $id;

    #[Required]
    public bool $flagged;

    /** @var list<Match_> $matches */
    #[Required(list: Match_::class)]
    public array $matches;

    #[Required]
    public float $probability;

    /** @var list<string>|null $flaggedFields */
    #[Optional('flagged_fields', list: 'string')]
    public ?array $flaggedFields;

    /**
     * `new EntityMatcherOutput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EntityMatcherOutput::with(id: ..., flagged: ..., matches: ..., probability: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EntityMatcherOutput)
     *   ->withID(...)
     *   ->withFlagged(...)
     *   ->withMatches(...)
     *   ->withProbability(...)
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
     * @param list<Match_|array{
     *   match: string, probability: float, span: list<int>
     * }> $matches
     * @param list<string> $flaggedFields
     */
    public static function with(
        string $id,
        bool $flagged,
        array $matches,
        float $probability,
        ?array $flaggedFields = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['flagged'] = $flagged;
        $self['matches'] = $matches;
        $self['probability'] = $probability;

        null !== $flaggedFields && $self['flaggedFields'] = $flaggedFields;

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

    /**
     * @param list<Match_|array{
     *   match: string, probability: float, span: list<int>
     * }> $matches
     */
    public function withMatches(array $matches): self
    {
        $self = clone $this;
        $self['matches'] = $matches;

        return $self;
    }

    public function withProbability(float $probability): self
    {
        $self = clone $this;
        $self['probability'] = $probability;

        return $self;
    }

    /**
     * @param list<string> $flaggedFields
     */
    public function withFlaggedFields(array $flaggedFields): self
    {
        $self = clone $this;
        $self['flaggedFields'] = $flaggedFields;

        return $self;
    }
}
