<?php

declare(strict_types=1);

namespace ModerationAPI\Actions;

use ModerationAPI\Actions\ActionGetResponse\Position;
use ModerationAPI\Actions\ActionGetResponse\PossibleValue;
use ModerationAPI\Actions\ActionGetResponse\QueueBehaviour;
use ModerationAPI\Actions\ActionGetResponse\Type;
use ModerationAPI\Actions\ActionGetResponse\Webhook;
use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PossibleValueShape from \ModerationAPI\Actions\ActionGetResponse\PossibleValue
 * @phpstan-import-type WebhookShape from \ModerationAPI\Actions\ActionGetResponse\Webhook
 *
 * @phpstan-type ActionGetResponseShape = array{
 *   id: string,
 *   builtIn: bool|null,
 *   createdAt: string,
 *   filterInQueueIDs: list<string>,
 *   freeText: bool,
 *   name: string,
 *   position: Position|value-of<Position>,
 *   possibleValues: list<PossibleValueShape>,
 *   queueBehaviour: QueueBehaviour|value-of<QueueBehaviour>,
 *   valueRequired: bool,
 *   webhooks: list<WebhookShape>,
 *   description?: string|null,
 *   key?: string|null,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class ActionGetResponse implements BaseModel
{
    /** @use SdkModel<ActionGetResponseShape> */
    use SdkModel;

    /**
     * The ID of the action.
     */
    #[Required]
    public string $id;

    /**
     * Whether the action is a built-in action or a custom one.
     */
    #[Required]
    public ?bool $builtIn;

    /**
     * The date the action was created.
     */
    #[Required]
    public string $createdAt;

    /**
     * The IDs of the queues the action is available in.
     *
     * @var list<string> $filterInQueueIDs
     */
    #[Required('filterInQueueIds', list: 'string')]
    public array $filterInQueueIDs;

    /**
     * Whether the action allows any text to be entered as a value or if it must be one of the possible values.
     */
    #[Required]
    public bool $freeText;

    /**
     * The name of the action.
     */
    #[Required]
    public string $name;

    /**
     * Show the action in all queues, selected queues or no queues (to use via API only).
     *
     * @var value-of<Position> $position
     */
    #[Required(enum: Position::class)]
    public string $position;

    /**
     * The possible values of the action. The user will be prompted to select one of these values when executing the action.
     *
     * @var list<PossibleValue> $possibleValues
     */
    #[Required(list: PossibleValue::class)]
    public array $possibleValues;

    /**
     * Whether the action resolves and removes the item, unresolves and re-add it to the queue, or does not change the resolve status.
     *
     * @var value-of<QueueBehaviour> $queueBehaviour
     */
    #[Required(enum: QueueBehaviour::class)]
    public string $queueBehaviour;

    /**
     * Whether the action requires a value to be executed.
     */
    #[Required]
    public bool $valueRequired;

    /**
     * The action's webhooks.
     *
     * @var list<Webhook> $webhooks
     */
    #[Required(list: Webhook::class)]
    public array $webhooks;

    /**
     * The description of the action.
     */
    #[Optional(nullable: true)]
    public ?string $description;

    /**
     * User defined key of the action.
     */
    #[Optional(nullable: true)]
    public ?string $key;

    /**
     * The type of the action.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class, nullable: true)]
    public ?string $type;

    /**
     * `new ActionGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionGetResponse::with(
     *   id: ...,
     *   builtIn: ...,
     *   createdAt: ...,
     *   filterInQueueIDs: ...,
     *   freeText: ...,
     *   name: ...,
     *   position: ...,
     *   possibleValues: ...,
     *   queueBehaviour: ...,
     *   valueRequired: ...,
     *   webhooks: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionGetResponse)
     *   ->withID(...)
     *   ->withBuiltIn(...)
     *   ->withCreatedAt(...)
     *   ->withFilterInQueueIDs(...)
     *   ->withFreeText(...)
     *   ->withName(...)
     *   ->withPosition(...)
     *   ->withPossibleValues(...)
     *   ->withQueueBehaviour(...)
     *   ->withValueRequired(...)
     *   ->withWebhooks(...)
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
     * @param list<string> $filterInQueueIDs
     * @param Position|value-of<Position> $position
     * @param list<PossibleValueShape> $possibleValues
     * @param QueueBehaviour|value-of<QueueBehaviour> $queueBehaviour
     * @param list<WebhookShape> $webhooks
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        string $id,
        string $createdAt,
        string $name,
        ?bool $builtIn = false,
        array $filterInQueueIDs = [],
        bool $freeText = false,
        Position|string $position = 'ALL_QUEUES',
        array $possibleValues = [],
        QueueBehaviour|string $queueBehaviour = 'NO_CHANGE',
        bool $valueRequired = false,
        array $webhooks = [],
        ?string $description = null,
        ?string $key = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['builtIn'] = $builtIn;
        $self['createdAt'] = $createdAt;
        $self['filterInQueueIDs'] = $filterInQueueIDs;
        $self['freeText'] = $freeText;
        $self['name'] = $name;
        $self['position'] = $position;
        $self['possibleValues'] = $possibleValues;
        $self['queueBehaviour'] = $queueBehaviour;
        $self['valueRequired'] = $valueRequired;
        $self['webhooks'] = $webhooks;

        null !== $description && $self['description'] = $description;
        null !== $key && $self['key'] = $key;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * The ID of the action.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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
     * The date the action was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

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
     * User defined key of the action.
     */
    public function withKey(?string $key): self
    {
        $self = clone $this;
        $self['key'] = $key;

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
}
