<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse\Policy\EntityMatcherOutput;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type MatchShape = array{
 *   match: string, probability: float, span: list<int>
 * }
 */
final class Match_ implements BaseModel
{
    /** @use SdkModel<MatchShape> */
    use SdkModel;

    #[Required]
    public string $match;

    #[Required]
    public float $probability;

    /** @var list<int> $span */
    #[Required(list: 'int')]
    public array $span;

    /**
     * `new Match_()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Match_::with(match: ..., probability: ..., span: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Match_)->withMatch(...)->withProbability(...)->withSpan(...)
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
     * @param list<int> $span
     */
    public static function with(
        string $match,
        float $probability,
        array $span
    ): self {
        $self = new self;

        $self['match'] = $match;
        $self['probability'] = $probability;
        $self['span'] = $span;

        return $self;
    }

    public function withMatch(string $match): self
    {
        $self = clone $this;
        $self['match'] = $match;

        return $self;
    }

    public function withProbability(float $probability): self
    {
        $self = clone $this;
        $self['probability'] = $probability;

        return $self;
    }

    /**
     * @param list<int> $span
     */
    public function withSpan(array $span): self
    {
        $self = clone $this;
        $self['span'] = $span;

        return $self;
    }
}
