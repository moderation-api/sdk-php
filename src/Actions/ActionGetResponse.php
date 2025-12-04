<?php

declare(strict_types=1);

namespace ModerationAPI\Actions;

use ModerationAPI\Actions\ActionGetResponse\Position;
use ModerationAPI\Actions\ActionGetResponse\PossibleValue;
use ModerationAPI\Actions\ActionGetResponse\QueueBehaviour;
use ModerationAPI\Actions\ActionGetResponse\Type;
use ModerationAPI\Actions\ActionGetResponse\Webhook;
use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkResponse;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type ActionGetResponseShape = array{
 *   id: string,
 *   builtIn: bool|null,
 *   createdAt: string,
 *   filterInQueueIds: list<string>,
 *   freeText: bool,
 *   name: string,
 *   position: value-of<Position>,
 *   possibleValues: list<PossibleValue>,
 *   queueBehaviour: value-of<QueueBehaviour>,
 *   valueRequired: bool,
 *   webhooks: list<Webhook>,
 *   description?: string|null,
 *   key?: string|null,
 *   type?: value-of<Type>|null,
 * }
 */
final class ActionGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ActionGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The ID of the action.
     */
    #[Api]
    public string $id;

    /**
     * Whether the action is a built-in action or a custom one.
     */
    #[Api]
    public ?bool $builtIn;

    /**
     * The date the action was created.
     */
    #[Api]
    public string $createdAt;

    /**
     * The IDs of the queues the action is available in.
     *
     * @var list<string> $filterInQueueIds
     */
    #[Api(list: 'string')]
    public array $filterInQueueIds;

    /**
     * Whether the action allows any text to be entered as a value or if it must be one of the possible values.
     */
    #[Api]
    public bool $freeText;

    /**
     * The name of the action.
     */
    #[Api]
    public string $name;

    /**
     * Show the action in all queues, selected queues or no queues (to use via API only).
     *
     * @var value-of<Position> $position
     */
    #[Api(enum: Position::class)]
    public string $position;

    /**
     * The possible values of the action. The user will be prompted to select one of these values when executing the action.
     *
     * @var list<PossibleValue> $possibleValues
     */
    #[Api(list: PossibleValue::class)]
    public array $possibleValues;

    /**
     * Whether the action resolves and removes the item, unresolves and re-add it to the queue, or does not change the resolve status.
     *
     * @var value-of<QueueBehaviour> $queueBehaviour
     */
    #[Api(enum: QueueBehaviour::class)]
    public string $queueBehaviour;

    /**
     * Whether the action requires a value to be executed.
     */
    #[Api]
    public bool $valueRequired;

    /**
     * The action's webhooks.
     *
     * @var list<Webhook> $webhooks
     */
    #[Api(list: Webhook::class)]
    public array $webhooks;

    /**
     * The description of the action.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $description;

    /**
     * User defined key of the action.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $key;

    /**
     * The type of the action.
     *
     * @var value-of<Type>|null $type
     */
    #[Api(enum: Type::class, nullable: true, optional: true)]
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
     *   filterInQueueIds: ...,
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
     * @param list<string> $filterInQueueIds
     * @param Position|value-of<Position> $position
     * @param list<PossibleValue> $possibleValues
     * @param QueueBehaviour|value-of<QueueBehaviour> $queueBehaviour
     * @param list<Webhook> $webhooks
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        string $id,
        string $createdAt,
        string $name,
        ?bool $builtIn = false,
        array $filterInQueueIds = [],
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
        $obj = new self;

        $obj->id = $id;
        $obj->builtIn = $builtIn;
        $obj->createdAt = $createdAt;
        $obj->filterInQueueIds = $filterInQueueIds;
        $obj->freeText = $freeText;
        $obj->name = $name;
        $obj['position'] = $position;
        $obj->possibleValues = $possibleValues;
        $obj['queueBehaviour'] = $queueBehaviour;
        $obj->valueRequired = $valueRequired;
        $obj->webhooks = $webhooks;

        null !== $description && $obj->description = $description;
        null !== $key && $obj->key = $key;
        null !== $type && $obj['type'] = $type;

        return $obj;
    }

    /**
     * The ID of the action.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Whether the action is a built-in action or a custom one.
     */
    public function withBuiltIn(?bool $builtIn): self
    {
        $obj = clone $this;
        $obj->builtIn = $builtIn;

        return $obj;
    }

    /**
     * The date the action was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * The IDs of the queues the action is available in.
     *
     * @param list<string> $filterInQueueIDs
     */
    public function withFilterInQueueIDs(array $filterInQueueIDs): self
    {
        $obj = clone $this;
        $obj->filterInQueueIds = $filterInQueueIDs;

        return $obj;
    }

    /**
     * Whether the action allows any text to be entered as a value or if it must be one of the possible values.
     */
    public function withFreeText(bool $freeText): self
    {
        $obj = clone $this;
        $obj->freeText = $freeText;

        return $obj;
    }

    /**
     * The name of the action.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Show the action in all queues, selected queues or no queues (to use via API only).
     *
     * @param Position|value-of<Position> $position
     */
    public function withPosition(Position|string $position): self
    {
        $obj = clone $this;
        $obj['position'] = $position;

        return $obj;
    }

    /**
     * The possible values of the action. The user will be prompted to select one of these values when executing the action.
     *
     * @param list<PossibleValue> $possibleValues
     */
    public function withPossibleValues(array $possibleValues): self
    {
        $obj = clone $this;
        $obj->possibleValues = $possibleValues;

        return $obj;
    }

    /**
     * Whether the action resolves and removes the item, unresolves and re-add it to the queue, or does not change the resolve status.
     *
     * @param QueueBehaviour|value-of<QueueBehaviour> $queueBehaviour
     */
    public function withQueueBehaviour(
        QueueBehaviour|string $queueBehaviour
    ): self {
        $obj = clone $this;
        $obj['queueBehaviour'] = $queueBehaviour;

        return $obj;
    }

    /**
     * Whether the action requires a value to be executed.
     */
    public function withValueRequired(bool $valueRequired): self
    {
        $obj = clone $this;
        $obj->valueRequired = $valueRequired;

        return $obj;
    }

    /**
     * The action's webhooks.
     *
     * @param list<Webhook> $webhooks
     */
    public function withWebhooks(array $webhooks): self
    {
        $obj = clone $this;
        $obj->webhooks = $webhooks;

        return $obj;
    }

    /**
     * The description of the action.
     */
    public function withDescription(?string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * User defined key of the action.
     */
    public function withKey(?string $key): self
    {
        $obj = clone $this;
        $obj->key = $key;

        return $obj;
    }

    /**
     * The type of the action.
     *
     * @param Type|value-of<Type>|null $type
     */
    public function withType(Type|string|null $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
