<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse\Policy;

use ModerationAPI\Content\ContentSubmitResponse\Policy\EntityMatcherOutput\Match1;
use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Entity matcher policy.
 *
 * @phpstan-type EntityMatcherOutputShape = array{
 *   id: string,
 *   flagged: bool,
 *   matches: list<Match1>,
 *   probability: float,
 *   type: 'entity_matcher',
 *   flagged_fields?: list<string>|null,
 * }
 */
final class EntityMatcherOutput implements BaseModel
{
    /** @use SdkModel<EntityMatcherOutputShape> */
    use SdkModel;

    /** @var 'entity_matcher' $type */
    #[Api]
    public string $type = 'entity_matcher';

    #[Api]
    public string $id;

    #[Api]
    public bool $flagged;

    /** @var list<Match1> $matches */
    #[Api(list: Match1::class)]
    public array $matches;

    #[Api]
    public float $probability;

    /** @var list<string>|null $flagged_fields */
    #[Api(list: 'string', optional: true)]
    public ?array $flagged_fields;

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
     * @param list<Match1|array{
     *   match: string, probability: float, span: list<int>
     * }> $matches
     * @param list<string> $flagged_fields
     */
    public static function with(
        string $id,
        bool $flagged,
        array $matches,
        float $probability,
        ?array $flagged_fields = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['flagged'] = $flagged;
        $obj['matches'] = $matches;
        $obj['probability'] = $probability;

        null !== $flagged_fields && $obj['flagged_fields'] = $flagged_fields;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withFlagged(bool $flagged): self
    {
        $obj = clone $this;
        $obj['flagged'] = $flagged;

        return $obj;
    }

    /**
     * @param list<Match1|array{
     *   match: string, probability: float, span: list<int>
     * }> $matches
     */
    public function withMatches(array $matches): self
    {
        $obj = clone $this;
        $obj['matches'] = $matches;

        return $obj;
    }

    public function withProbability(float $probability): self
    {
        $obj = clone $this;
        $obj['probability'] = $probability;

        return $obj;
    }

    /**
     * @param list<string> $flaggedFields
     */
    public function withFlaggedFields(array $flaggedFields): self
    {
        $obj = clone $this;
        $obj['flagged_fields'] = $flaggedFields;

        return $obj;
    }
}
