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
 * @phpstan-type ActionUpdateParamsShape = array{
 *   builtIn?: bool|null,
 *   description?: string|null,
 *   filterInQueueIds?: list<string>,
 *   freeText?: bool,
 *   key?: string|null,
 *   name?: string,
 *   position?: Position|value-of<Position>,
 *   possibleValues?: list<PossibleValue|array{value: string}>,
 *   queueBehaviour?: QueueBehaviour|value-of<QueueBehaviour>,
 *   type?: null|Type|value-of<Type>,
 *   valueRequired?: bool,
 *   webhooks?: list<Webhook|array{
 *     name: string, url: string, id?: string|null, description?: string|null
 *   }>,
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
     * @var list<string>|null $filterInQueueIds
     */
    #[Optional(list: 'string')]
    public ?array $filterInQueueIds;

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
     * @param list<string> $filterInQueueIds
     * @param Position|value-of<Position> $position
     * @param list<PossibleValue|array{value: string}> $possibleValues
     * @param QueueBehaviour|value-of<QueueBehaviour> $queueBehaviour
     * @param Type|value-of<Type>|null $type
     * @param list<Webhook|array{
     *   name: string, url: string, id?: string|null, description?: string|null
     * }> $webhooks
     */
    public static function with(
        ?bool $builtIn = null,
        ?string $description = null,
        ?array $filterInQueueIds = null,
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
        $obj = new self;

        null !== $builtIn && $obj['builtIn'] = $builtIn;
        null !== $description && $obj['description'] = $description;
        null !== $filterInQueueIds && $obj['filterInQueueIds'] = $filterInQueueIds;
        null !== $freeText && $obj['freeText'] = $freeText;
        null !== $key && $obj['key'] = $key;
        null !== $name && $obj['name'] = $name;
        null !== $position && $obj['position'] = $position;
        null !== $possibleValues && $obj['possibleValues'] = $possibleValues;
        null !== $queueBehaviour && $obj['queueBehaviour'] = $queueBehaviour;
        null !== $type && $obj['type'] = $type;
        null !== $valueRequired && $obj['valueRequired'] = $valueRequired;
        null !== $webhooks && $obj['webhooks'] = $webhooks;

        return $obj;
    }

    /**
     * Whether the action is a built-in action or a custom one.
     */
    public function withBuiltIn(?bool $builtIn): self
    {
        $obj = clone $this;
        $obj['builtIn'] = $builtIn;

        return $obj;
    }

    /**
     * The description of the action.
     */
    public function withDescription(?string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

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
        $obj['filterInQueueIds'] = $filterInQueueIDs;

        return $obj;
    }

    /**
     * Whether the action allows any text to be entered as a value or if it must be one of the possible values.
     */
    public function withFreeText(bool $freeText): self
    {
        $obj = clone $this;
        $obj['freeText'] = $freeText;

        return $obj;
    }

    /**
     * User defined key of the action.
     */
    public function withKey(?string $key): self
    {
        $obj = clone $this;
        $obj['key'] = $key;

        return $obj;
    }

    /**
     * The name of the action.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

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
     * @param list<PossibleValue|array{value: string}> $possibleValues
     */
    public function withPossibleValues(array $possibleValues): self
    {
        $obj = clone $this;
        $obj['possibleValues'] = $possibleValues;

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

    /**
     * Whether the action requires a value to be executed.
     */
    public function withValueRequired(bool $valueRequired): self
    {
        $obj = clone $this;
        $obj['valueRequired'] = $valueRequired;

        return $obj;
    }

    /**
     * The action's webhooks.
     *
     * @param list<Webhook|array{
     *   name: string, url: string, id?: string|null, description?: string|null
     * }> $webhooks
     */
    public function withWebhooks(array $webhooks): self
    {
        $obj = clone $this;
        $obj['webhooks'] = $webhooks;

        return $obj;
    }
}
