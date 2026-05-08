<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\WebhookEvent\QueueItemCompletedEvent\Data\Object_\Item;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Queue\WebhookEvent\QueueItemCompletedEvent\Data\Object_\Item\Label\Match_;

/**
 * @phpstan-import-type MatchShape from \ModerationAPI\Queue\WebhookEvent\QueueItemCompletedEvent\Data\Object_\Item\Label\Match_
 *
 * @phpstan-type LabelShape = array{
 *   label: string,
 *   score: float,
 *   flagged?: bool|null,
 *   manual?: bool|null,
 *   matches?: list<Match_|MatchShape>|null,
 * }
 */
final class Label implements BaseModel
{
    /** @use SdkModel<LabelShape> */
    use SdkModel;

    /**
     * The label name.
     */
    #[Required]
    public string $label;

    /**
     * Confidence score between 0 and 1.
     */
    #[Required]
    public float $score;

    /**
     * Whether this label crossed its flagging threshold.
     */
    #[Optional]
    public ?bool $flagged;

    /**
     * True if the label was applied manually by a moderator.
     */
    #[Optional]
    public ?bool $manual;

    /** @var list<Match_>|null $matches */
    #[Optional(list: Match_::class)]
    public ?array $matches;

    /**
     * `new Label()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Label::with(label: ..., score: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Label)->withLabel(...)->withScore(...)
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
     * @param list<Match_|MatchShape>|null $matches
     */
    public static function with(
        string $label,
        float $score,
        ?bool $flagged = null,
        ?bool $manual = null,
        ?array $matches = null,
    ): self {
        $self = new self;

        $self['label'] = $label;
        $self['score'] = $score;

        null !== $flagged && $self['flagged'] = $flagged;
        null !== $manual && $self['manual'] = $manual;
        null !== $matches && $self['matches'] = $matches;

        return $self;
    }

    /**
     * The label name.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * Confidence score between 0 and 1.
     */
    public function withScore(float $score): self
    {
        $self = clone $this;
        $self['score'] = $score;

        return $self;
    }

    /**
     * Whether this label crossed its flagging threshold.
     */
    public function withFlagged(bool $flagged): self
    {
        $self = clone $this;
        $self['flagged'] = $flagged;

        return $self;
    }

    /**
     * True if the label was applied manually by a moderator.
     */
    public function withManual(bool $manual): self
    {
        $self = clone $this;
        $self['manual'] = $manual;

        return $self;
    }

    /**
     * @param list<Match_|MatchShape> $matches
     */
    public function withMatches(array $matches): self
    {
        $self = clone $this;
        $self['matches'] = $matches;

        return $self;
    }
}
