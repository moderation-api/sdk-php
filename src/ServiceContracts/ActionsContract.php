<?php

declare(strict_types=1);

namespace ModerationAPI\ServiceContracts;

use ModerationAPI\Actions\ActionCreateParams\Position;
use ModerationAPI\Actions\ActionCreateParams\QueueBehaviour;
use ModerationAPI\Actions\ActionCreateParams\Type;
use ModerationAPI\Actions\ActionDeleteResponse;
use ModerationAPI\Actions\ActionGetResponse;
use ModerationAPI\Actions\ActionListResponseItem;
use ModerationAPI\Actions\ActionNewResponse;
use ModerationAPI\Actions\ActionUpdateResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;

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
     * @param 'ALL_QUEUES'|'SOME_QUEUES'|'HIDDEN'|Position $position show the action in all queues, selected queues or no queues (to use via API only)
     * @param list<array{
     *   value: string
     * }> $possibleValues The possible values of the action. The user will be prompted to select one of these values when executing the action.
     * @param 'REMOVE'|'ADD'|'NO_CHANGE'|QueueBehaviour $queueBehaviour whether the action resolves and removes the item, unresolves and re-add it to the queue, or does not change the resolve status
     * @param 'AUTHOR_BLOCK'|'AUTHOR_BLOCK_TEMP'|'AUTHOR_UNBLOCK'|'AUTHOR_DELETE'|'AUTHOR_REPORT'|'AUTHOR_WARN'|'AUTHOR_CUSTOM'|'ITEM_REJECT'|'ITEM_ALLOW'|'ITEM_CUSTOM'|Type|null $type the type of the action
     * @param bool $valueRequired whether the action requires a value to be executed
     * @param list<array{
     *   name: string, url: string, id?: string, description?: string|null
     * }> $webhooks The action's webhooks
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
        string|Position $position = 'ALL_QUEUES',
        array $possibleValues = [],
        string|QueueBehaviour $queueBehaviour = 'NO_CHANGE',
        string|Type|null $type = null,
        bool $valueRequired = false,
        array $webhooks = [],
        ?RequestOptions $requestOptions = null,
    ): ActionNewResponse;

    /**
     * @api
     *
     * @param string $id the ID of the action to get
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
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
     * @param 'ALL_QUEUES'|'SOME_QUEUES'|'HIDDEN'|\ModerationAPI\Actions\ActionUpdateParams\Position $position show the action in all queues, selected queues or no queues (to use via API only)
     * @param list<array{
     *   value: string
     * }> $possibleValues The possible values of the action. The user will be prompted to select one of these values when executing the action.
     * @param 'REMOVE'|'ADD'|'NO_CHANGE'|\ModerationAPI\Actions\ActionUpdateParams\QueueBehaviour $queueBehaviour whether the action resolves and removes the item, unresolves and re-add it to the queue, or does not change the resolve status
     * @param 'AUTHOR_BLOCK'|'AUTHOR_BLOCK_TEMP'|'AUTHOR_UNBLOCK'|'AUTHOR_DELETE'|'AUTHOR_REPORT'|'AUTHOR_WARN'|'AUTHOR_CUSTOM'|'ITEM_REJECT'|'ITEM_ALLOW'|'ITEM_CUSTOM'|\ModerationAPI\Actions\ActionUpdateParams\Type|null $type the type of the action
     * @param bool $valueRequired whether the action requires a value to be executed
     * @param list<array{
     *   name: string, url: string, id?: string, description?: string|null
     * }> $webhooks The action's webhooks
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
        string|\ModerationAPI\Actions\ActionUpdateParams\Position $position = 'ALL_QUEUES',
        array $possibleValues = [],
        string|\ModerationAPI\Actions\ActionUpdateParams\QueueBehaviour $queueBehaviour = 'NO_CHANGE',
        string|\ModerationAPI\Actions\ActionUpdateParams\Type|null $type = null,
        bool $valueRequired = false,
        array $webhooks = [],
        ?RequestOptions $requestOptions = null,
    ): ActionUpdateResponse;

    /**
     * @api
     *
     * @return list<ActionListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        ?string $queueID = null,
        ?RequestOptions $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @param string $id the ID of the action to delete
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionDeleteResponse;
}
