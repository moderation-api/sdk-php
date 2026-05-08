<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\WebhookEvent\QueueItemActionEvent\Data\Object_\Item\Label;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Queue\WebhookEvent\QueueItemActionEvent\Data\Object_\Item\Label\Match_\Signals;

/**
 * @phpstan-import-type SignalsShape from \ModerationAPI\Queue\WebhookEvent\QueueItemActionEvent\Data\Object_\Item\Label\Match_\Signals
 *
 * @phpstan-type MatchShape = array{
 *   match: string,
 *   probability: float,
 *   span: list<mixed>,
 *   entityType?: string|null,
 *   mask?: string|null,
 *   reasons?: list<string>|null,
 *   signals?: null|Signals|SignalsShape,
 * }
 */
final class Match_ implements BaseModel
{
    /** @use SdkModel<MatchShape> */
    use SdkModel;

    /**
     * The matched substring.
     */
    #[Required]
    public string $match;

    /**
     * Match confidence between 0 and 1.
     */
    #[Required]
    public float $probability;

    /**
     * [start, end] character offsets in the source text.
     *
     * @var list<mixed> $span
     */
    #[Required(list: 'mixed')]
    public array $span;

    #[Optional('entity_type')]
    public ?string $entityType;

    #[Optional(nullable: true)]
    public ?string $mask;

    /** @var list<string>|null $reasons */
    #[Optional(list: 'string')]
    public ?array $reasons;

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
     * @param list<mixed> $span
     * @param list<string>|null $reasons
     * @param Signals|SignalsShape|null $signals
     */
    public static function with(
        string $match,
        float $probability,
        array $span,
        ?string $entityType = null,
        ?string $mask = null,
        ?array $reasons = null,
        Signals|array|null $signals = null,
    ): self {
        $self = new self;

        $self['match'] = $match;
        $self['probability'] = $probability;
        $self['span'] = $span;

        null !== $entityType && $self['entityType'] = $entityType;
        null !== $mask && $self['mask'] = $mask;
        null !== $reasons && $self['reasons'] = $reasons;
        null !== $signals && $self['signals'] = $signals;

        return $self;
    }

    /**
     * The matched substring.
     */
    public function withMatch(string $match): self
    {
        $self = clone $this;
        $self['match'] = $match;

        return $self;
    }

    /**
     * Match confidence between 0 and 1.
     */
    public function withProbability(float $probability): self
    {
        $self = clone $this;
        $self['probability'] = $probability;

        return $self;
    }

    /**
     * [start, end] character offsets in the source text.
     *
     * @param list<mixed> $span
     */
    public function withSpan(array $span): self
    {
        $self = clone $this;
        $self['span'] = $span;

        return $self;
    }

    public function withEntityType(string $entityType): self
    {
        $self = clone $this;
        $self['entityType'] = $entityType;

        return $self;
    }

    public function withMask(?string $mask): self
    {
        $self = clone $this;
        $self['mask'] = $mask;

        return $self;
    }

    /**
     * @param list<string> $reasons
     */
    public function withReasons(array $reasons): self
    {
        $self = clone $this;
        $self['reasons'] = $reasons;

        return $self;
    }

    /**
     * @param Signals|SignalsShape $signals
     */
    public function withSignals(Signals|array $signals): self
    {
        $self = clone $this;
        $self['signals'] = $signals;

        return $self;
    }
}
