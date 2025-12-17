<?php

declare(strict_types=1);

namespace ModerationAPI\Actions;

use ModerationAPI\Actions\ActionUpdateParams\Position;
use ModerationAPI\Actions\ActionUpdateParams\PossibleValue;
use ModerationAPI\Actions\ActionUpdateParams\QueueBehaviour;
use ModerationAPI\Actions\ActionUpdateParams\Type;
use ModerationAPI\Actions\ActionUpdateParams\Webhook;
use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkParams;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Update an action.
 *
 * @see ModerationAPI\Services\ActionsService::update()
 *
 * @phpstan-import-type PossibleValueShape from \ModerationAPI\Actions\ActionUpdateParams\PossibleValue
 * @phpstan-import-type WebhookShape from \ModerationAPI\Actions\ActionUpdateParams\Webhook
 *
 * @phpstan-type ActionUpdateParamsShape = array{
 *   builtIn?: bool|null,
 *   description?: string|null,
 *   filterInQueueIDs?: list<string>|null,
 *   freeText?: bool|null,
 *   key?: string|null,
 *   name?: string|null,
 *   position?: null|Position|value-of<Position>,
 *   possibleValues?: list<PossibleValueShape>|null,
 *   queueBehaviour?: null|QueueBehaviour|value-of<QueueBehaviour>,
 *   type?: null|Type|value-of<Type>,
 *   valueRequired?: bool|null,
 *   webhooks?: list<WebhookShape>|null,
 * }
 */
final class ActionUpdateParams implements BaseModel
{
    /** @use SdkModel<ActionUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Whether the action is a built-in action or a custom one.
     */
    #[Optional(nullable: true)]
    public ?bool $builtIn;

    /**
     * The description of the action.
     */
    #[Optional(nullable: true)]
    public ?string $description;

    /**
     * The IDs of the queues the action is available in.
     *
     * @var list<string>|null $filterInQueueIDs
     */
    #[Optional('filterInQueueIds', list: 'string')]
    public ?array $filterInQueueIDs;

    /**
     * Whether the action allows any text to be entered as a value or if it must be one of the possible values.
     */
    #[Optional]
    public ?bool $freeText;

    /**
     * User defined key of the action.
     */
    #[Optional(nullable: true)]
    public ?string $key;

    /**
     * The name of the action.
     */
    #[Optional]
    public ?string $name;

    /**
     * Show the action in all queues, selected queues or no queues (to use via API only).
     *
     * @var value-of<Position>|null $position
     */
    #[Optional(enum: Position::class)]
    public ?string $position;

    /**
     * The possible values of the action. The user will be prompted to select one of these values when executing the action.
     *
     * @var list<PossibleValue>|null $possibleValues
     */
    #[Optional(list: PossibleValue::class)]
    public ?array $possibleValues;

    /**
     * Whether the action resolves and removes the item, unresolves and re-add it to the queue, or does not change the resolve status.
     *
     * @var value-of<QueueBehaviour>|null $queueBehaviour
     */
    #[Optional(enum: QueueBehaviour::class)]
    public ?string $queueBehaviour;

    /**
     * The type of the action.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class, nullable: true)]
    public ?string $type;

    /**
     * Whether the action requires a value to be executed.
     */
    #[Optional]
    public ?bool $valueRequired;

    /**
     * The action's webhooks.
     *
     * @var list<Webhook>|null $webhooks
     */
    #[Optional(list: Webhook::class)]
    public ?array $webhooks;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $filterInQueueIDs
     * @param Position|value-of<Position> $position
     * @param list<PossibleValueShape> $possibleValues
     * @param QueueBehaviour|value-of<QueueBehaviour> $queueBehaviour
     * @param Type|value-of<Type>|null $type
     * @param list<WebhookShape> $webhooks
     */
    public static function with(
        ?bool $builtIn = null,
        ?string $description = null,
        ?array $filterInQueueIDs = null,
        ?bool $freeText = null,
        ?string $key = null,
        ?string $name = null,
        Position|string|null $position = null,
        ?array $possibleValues = null,
        QueueBehaviour|string|null $queueBehaviour = null,
        Type|string|null $type = null,
        ?bool $valueRequired = null,
        ?array $webhooks = null,
    ): self {
        $self = new self;

        null !== $builtIn && $self['builtIn'] = $builtIn;
        null !== $description && $self['description'] = $description;
        null !== $filterInQueueIDs && $self['filterInQueueIDs'] = $filterInQueueIDs;
        null !== $freeText && $self['freeText'] = $freeText;
        null !== $key && $self['key'] = $key;
        null !== $name && $self['name'] = $name;
        null !== $position && $self['position'] = $position;
        null !== $possibleValues && $self['possibleValues'] = $possibleValues;
        null !== $queueBehaviour && $self['queueBehaviour'] = $queueBehaviour;
        null !== $type && $self['type'] = $type;
        null !== $valueRequired && $self['valueRequired'] = $valueRequired;
        null !== $webhooks && $self['webhooks'] = $webhooks;

        return $self;
    }

    /**
     * Whether the action is a built-in action or a custom one.
     */
    public function withBuiltIn(?bool $builtIn): self
    {
        $self = clone $this;
        $self['builtIn'] = $builtIn;

        return $self;
    }

    /**
     * The description of the action.
     */
    public function withDescription(?string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * The IDs of the queues the action is available in.
     *
     * @param list<string> $filterInQueueIDs
     */
    public function withFilterInQueueIDs(array $filterInQueueIDs): self
    {
        $self = clone $this;
        $self['filterInQueueIDs'] = $filterInQueueIDs;

        return $self;
    }

    /**
     * Whether the action allows any text to be entered as a value or if it must be one of the possible values.
     */
    public function withFreeText(bool $freeText): self
    {
        $self = clone $this;
        $self['freeText'] = $freeText;

        return $self;
    }

    /**
     * User defined key of the action.
     */
    public function withKey(?string $key): self
    {
        $self = clone $this;
        $self['key'] = $key;

        return $self;
    }

    /**
     * The name of the action.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Show the action in all queues, selected queues or no queues (to use via API only).
     *
     * @param Position|value-of<Position> $position
     */
    public function withPosition(Position|string $position): self
    {
        $self = clone $this;
        $self['position'] = $position;

        return $self;
    }

    /**
     * The possible values of the action. The user will be prompted to select one of these values when executing the action.
     *
     * @param list<PossibleValueShape> $possibleValues
     */
    public function withPossibleValues(array $possibleValues): self
    {
        $self = clone $this;
        $self['possibleValues'] = $possibleValues;

        return $self;
    }

    /**
     * Whether the action resolves and removes the item, unresolves and re-add it to the queue, or does not change the resolve status.
     *
     * @param QueueBehaviour|value-of<QueueBehaviour> $queueBehaviour
     */
    public function withQueueBehaviour(
        QueueBehaviour|string $queueBehaviour
    ): self {
        $self = clone $this;
        $self['queueBehaviour'] = $queueBehaviour;

        return $self;
    }

    /**
     * The type of the action.
     *
     * @param Type|value-of<Type>|null $type
     */
    public function withType(Type|string|null $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Whether the action requires a value to be executed.
     */
    public function withValueRequired(bool $valueRequired): self
    {
        $self = clone $this;
        $self['valueRequired'] = $valueRequired;

        return $self;
    }

    /**
     * The action's webhooks.
     *
     * @param list<WebhookShape> $webhooks
     */
    public function withWebhooks(array $webhooks): self
    {
        $self = clone $this;
        $self['webhooks'] = $webhooks;

        return $self;
    }
}
