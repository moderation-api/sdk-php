<?php

declare(strict_types=1);

namespace ModerationAPI\ServiceContracts;

use ModerationAPI\Actions\ActionCreateParams\Position;
use ModerationAPI\Actions\ActionCreateParams\PossibleValue;
use ModerationAPI\Actions\ActionCreateParams\QueueBehaviour;
use ModerationAPI\Actions\ActionCreateParams\Type;
use ModerationAPI\Actions\ActionCreateParams\Webhook;
use ModerationAPI\Actions\ActionDeleteResponse;
use ModerationAPI\Actions\ActionGetResponse;
use ModerationAPI\Actions\ActionListResponseItem;
use ModerationAPI\Actions\ActionNewResponse;
use ModerationAPI\Actions\ActionUpdateResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;

/**
 * @phpstan-import-type PossibleValueShape from \ModerationAPI\Actions\ActionCreateParams\PossibleValue
 * @phpstan-import-type WebhookShape from \ModerationAPI\Actions\ActionCreateParams\Webhook
 * @phpstan-import-type PossibleValueShape from \ModerationAPI\Actions\ActionUpdateParams\PossibleValue as PossibleValueShape1
 * @phpstan-import-type WebhookShape from \ModerationAPI\Actions\ActionUpdateParams\Webhook as WebhookShape1
 * @phpstan-import-type RequestOpts from \ModerationAPI\RequestOptions
 */
interface ActionsContract
{
    /**
     * @api
     *
     * @param string $name the name of the action
     * @param bool|null $builtIn whether the action is a built-in action or a custom one
     * @param string|null $description the description of the action
     * @param list<string> $filterInQueueIDs the IDs of the queues the action is available in
     * @param bool $freeText whether the action allows any text to be entered as a value or if it must be one of the possible values
     * @param string|null $key user defined key of the action
     * @param Position|value-of<Position> $position show the action in all queues, selected queues or no queues (to use via API only)
     * @param list<PossibleValue|PossibleValueShape> $possibleValues The possible values of the action. The user will be prompted to select one of these values when executing the action.
     * @param QueueBehaviour|value-of<QueueBehaviour> $queueBehaviour whether the action resolves and removes the item, unresolves and re-add it to the queue, or does not change the resolve status
     * @param Type|value-of<Type>|null $type the type of the action
     * @param bool $valueRequired whether the action requires a value to be executed
     * @param list<Webhook|WebhookShape> $webhooks the action's webhooks
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        ?bool $builtIn = false,
        ?string $description = null,
        array $filterInQueueIDs = [],
        bool $freeText = false,
        ?string $key = null,
        Position|string $position = 'ALL_QUEUES',
        array $possibleValues = [],
        QueueBehaviour|string $queueBehaviour = 'NO_CHANGE',
        Type|string|null $type = null,
        bool $valueRequired = false,
        array $webhooks = [],
        RequestOptions|array|null $requestOptions = null,
    ): ActionNewResponse;

    /**
     * @api
     *
     * @param string $id the ID of the action to get
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionGetResponse;

    /**
     * @api
     *
     * @param string $id the ID of the action to update
     * @param bool|null $builtIn whether the action is a built-in action or a custom one
     * @param string|null $description the description of the action
     * @param list<string> $filterInQueueIDs the IDs of the queues the action is available in
     * @param bool $freeText whether the action allows any text to be entered as a value or if it must be one of the possible values
     * @param string|null $key user defined key of the action
     * @param string $name the name of the action
     * @param \ModerationAPI\Actions\ActionUpdateParams\Position|value-of<\ModerationAPI\Actions\ActionUpdateParams\Position> $position show the action in all queues, selected queues or no queues (to use via API only)
     * @param list<\ModerationAPI\Actions\ActionUpdateParams\PossibleValue|PossibleValueShape1> $possibleValues The possible values of the action. The user will be prompted to select one of these values when executing the action.
     * @param \ModerationAPI\Actions\ActionUpdateParams\QueueBehaviour|value-of<\ModerationAPI\Actions\ActionUpdateParams\QueueBehaviour> $queueBehaviour whether the action resolves and removes the item, unresolves and re-add it to the queue, or does not change the resolve status
     * @param \ModerationAPI\Actions\ActionUpdateParams\Type|value-of<\ModerationAPI\Actions\ActionUpdateParams\Type>|null $type the type of the action
     * @param bool $valueRequired whether the action requires a value to be executed
     * @param list<\ModerationAPI\Actions\ActionUpdateParams\Webhook|WebhookShape1> $webhooks the action's webhooks
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?bool $builtIn = false,
        ?string $description = null,
        array $filterInQueueIDs = [],
        bool $freeText = false,
        ?string $key = null,
        ?string $name = null,
        \ModerationAPI\Actions\ActionUpdateParams\Position|string $position = 'ALL_QUEUES',
        array $possibleValues = [],
        \ModerationAPI\Actions\ActionUpdateParams\QueueBehaviour|string $queueBehaviour = 'NO_CHANGE',
        \ModerationAPI\Actions\ActionUpdateParams\Type|string|null $type = null,
        bool $valueRequired = false,
        array $webhooks = [],
        RequestOptions|array|null $requestOptions = null,
    ): ActionUpdateResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return list<ActionListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        ?string $queueID = null,
        RequestOptions|array|null $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @param string $id the ID of the action to delete
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionDeleteResponse;
}
