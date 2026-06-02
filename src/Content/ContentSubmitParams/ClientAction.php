<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams;

use ModerationAPI\Content\ContentSubmitParams\ClientAction\Action;
use ModerationAPI\Content\ContentSubmitParams\ClientAction\Behavior;
use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * A recommendation from your own client-side flagging (e.g. a banned-IP list or a third-party tool). Feeds the rules engine and can escalate or override the recommended action. Does not change whether our analysis flagged the content.
 *
 * @phpstan-type ClientActionShape = array{
 *   action: Action|value-of<Action>,
 *   behavior?: null|Behavior|value-of<Behavior>,
 *   reason?: string|null,
 *   source?: string|null,
 * }
 */
final class ClientAction implements BaseModel
{
    /** @use SdkModel<ClientActionShape> */
    use SdkModel;

    /**
     * Your recommendation for the content: allow, review, or reject.
     *
     * @var value-of<Action> $action
     */
    #[Required(enum: Action::class)]
    public string $action;

    /**
     * How your recommendation combines with ours. Defaults to 'escalate', which only applies it when stricter than ours; 'override' replaces ours outright.
     *
     * @var value-of<Behavior>|null $behavior
     */
    #[Optional(enum: Behavior::class)]
    public ?string $behavior;

    /**
     * A human-readable explanation for your recommendation.
     */
    #[Optional]
    public ?string $reason;

    /**
     * Where your recommendation came from, e.g. "banned-ip".
     */
    #[Optional]
    public ?string $source;

    /**
     * `new ClientAction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ClientAction::with(action: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ClientAction)->withAction(...)
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
     * @param Action|value-of<Action> $action
     * @param Behavior|value-of<Behavior>|null $behavior
     */
    public static function with(
        Action|string $action,
        Behavior|string|null $behavior = null,
        ?string $reason = null,
        ?string $source = null,
    ): self {
        $self = new self;

        $self['action'] = $action;

        null !== $behavior && $self['behavior'] = $behavior;
        null !== $reason && $self['reason'] = $reason;
        null !== $source && $self['source'] = $source;

        return $self;
    }

    /**
     * Your recommendation for the content: allow, review, or reject.
     *
     * @param Action|value-of<Action> $action
     */
    public function withAction(Action|string $action): self
    {
        $self = clone $this;
        $self['action'] = $action;

        return $self;
    }

    /**
     * How your recommendation combines with ours. Defaults to 'escalate', which only applies it when stricter than ours; 'override' replaces ours outright.
     *
     * @param Behavior|value-of<Behavior> $behavior
     */
    public function withBehavior(Behavior|string $behavior): self
    {
        $self = clone $this;
        $self['behavior'] = $behavior;

        return $self;
    }

    /**
     * A human-readable explanation for your recommendation.
     */
    public function withReason(string $reason): self
    {
        $self = clone $this;
        $self['reason'] = $reason;

        return $self;
    }

    /**
     * Where your recommendation came from, e.g. "banned-ip".
     */
    public function withSource(string $source): self
    {
        $self = clone $this;
        $self['source'] = $source;

        return $self;
    }
}
