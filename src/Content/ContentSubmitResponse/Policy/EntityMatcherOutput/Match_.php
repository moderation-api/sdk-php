<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse\Policy\EntityMatcherOutput;

use ModerationAPI\Content\ContentSubmitResponse\Policy\EntityMatcherOutput\Match_\Signals;
use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SignalsShape from \ModerationAPI\Content\ContentSubmitResponse\Policy\EntityMatcherOutput\Match_\Signals
 *
 * @phpstan-type MatchShape = array{
 *   match: string,
 *   probability: float,
 *   span: list<int>,
 *   entityType?: string|null,
 *   reasons?: list<string>|null,
 *   signals?: null|Signals|SignalsShape,
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
     * Sub-type of the entity match — e.g. the NER key (email, phone, name, …) for PII matches. Absent for URL Risk and wordlist matches where the type is already encoded in the parent label.
     */
    #[Optional('entity_type')]
    public ?string $entityType;

    /**
     * Stable codes explaining why a URL was flagged (URL Risk only).
     *
     * @var list<string>|null $reasons
     */
    #[Optional(list: 'string')]
    public ?array $reasons;

    /**
     * Observable properties of a URL (URL Risk only). Absent for allow/block list matches.
     */
    #[Optional]
    public ?Signals $signals;

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
     * @param list<string>|null $reasons
     * @param Signals|SignalsShape|null $signals
     */
    public static function with(
        string $match,
        float $probability,
        array $span,
        ?string $entityType = null,
        ?array $reasons = null,
        Signals|array|null $signals = null,
    ): self {
        $self = new self;

        $self['match'] = $match;
        $self['probability'] = $probability;
        $self['span'] = $span;

        null !== $entityType && $self['entityType'] = $entityType;
        null !== $reasons && $self['reasons'] = $reasons;
        null !== $signals && $self['signals'] = $signals;

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

    /**
     * Sub-type of the entity match — e.g. the NER key (email, phone, name, …) for PII matches. Absent for URL Risk and wordlist matches where the type is already encoded in the parent label.
     */
    public function withEntityType(string $entityType): self
    {
        $self = clone $this;
        $self['entityType'] = $entityType;

        return $self;
    }

    /**
     * Stable codes explaining why a URL was flagged (URL Risk only).
     *
     * @param list<string> $reasons
     */
    public function withReasons(array $reasons): self
    {
        $self = clone $this;
        $self['reasons'] = $reasons;

        return $self;
    }

    /**
     * Observable properties of a URL (URL Risk only). Absent for allow/block list matches.
     *
     * @param Signals|SignalsShape $signals
     */
    public function withSignals(Signals|array $signals): self
    {
        $self = clone $this;
        $self['signals'] = $signals;

        return $self;
    }
}
