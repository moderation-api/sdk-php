<?php

declare(strict_types=1);

namespace ModerationAPI\Services;

use ModerationAPI\Actions\ActionCreateParams;
use ModerationAPI\Actions\ActionCreateParams\Position;
use ModerationAPI\Actions\ActionCreateParams\QueueBehaviour;
use ModerationAPI\Actions\ActionCreateParams\Type;
use ModerationAPI\Actions\ActionDeleteResponse;
use ModerationAPI\Actions\ActionGetResponse;
use ModerationAPI\Actions\ActionListParams;
use ModerationAPI\Actions\ActionListResponseItem;
use ModerationAPI\Actions\ActionNewResponse;
use ModerationAPI\Actions\ActionUpdateParams;
use ModerationAPI\Actions\ActionUpdateResponse;
use ModerationAPI\Client;
use ModerationAPI\Core\Contracts\BaseResponse;
use ModerationAPI\Core\Conversion\ListOf;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\Core\Util;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\ActionsRawContract;

final class ActionsRawService implements ActionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create an action.
     *
     * @param array{
     *   name: string,
     *   builtIn?: bool|null,
     *   description?: string|null,
     *   filterInQueueIDs?: list<string>,
     *   freeText?: bool,
     *   key?: string|null,
     *   position?: 'ALL_QUEUES'|'SOME_QUEUES'|'HIDDEN'|Position,
     *   possibleValues?: list<array{value: string}>,
     *   queueBehaviour?: 'REMOVE'|'ADD'|'NO_CHANGE'|QueueBehaviour,
     *   type?: value-of<Type>,
     *   valueRequired?: bool,
     *   webhooks?: list<array{
     *     name: string, url: string, id?: string, description?: string|null
     *   }>,
     * }|ActionCreateParams $params
     *
     * @return BaseResponse<ActionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|ActionCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = ActionCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'actions',
            body: (object) $parsed,
            options: $options,
            convert: ActionNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get an action by ID.
     *
     * @param string $id the ID of the action to get
     *
     * @return BaseResponse<ActionGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['actions/%1$s', $id],
            options: $requestOptions,
            convert: ActionGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update an action.
     *
     * @param string $id the ID of the action to update
     * @param array{
     *   builtIn?: bool|null,
     *   description?: string|null,
     *   filterInQueueIDs?: list<string>,
     *   freeText?: bool,
     *   key?: string|null,
     *   name?: string,
     *   position?: 'ALL_QUEUES'|'SOME_QUEUES'|'HIDDEN'|ActionUpdateParams\Position,
     *   possibleValues?: list<array{value: string}>,
     *   queueBehaviour?: 'REMOVE'|'ADD'|'NO_CHANGE'|ActionUpdateParams\QueueBehaviour,
     *   type?: value-of<ActionUpdateParams\Type>,
     *   valueRequired?: bool,
     *   webhooks?: list<array{
     *     name: string, url: string, id?: string, description?: string|null
     *   }>,
     * }|ActionUpdateParams $params
     *
     * @return BaseResponse<ActionUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|ActionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ActionUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['actions/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: ActionUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List all available moderation actions for the authenticated organization.
     *
     * @param array{queueID?: string}|ActionListParams $params
     *
     * @return BaseResponse<list<ActionListResponseItem>>
     *
     * @throws APIException
     */
    public function list(
        array|ActionListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = ActionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'actions',
            query: Util::array_transform_keys($parsed, ['queueID' => 'queueId']),
            options: $options,
            convert: new ListOf(ActionListResponseItem::class),
        );
    }

    /**
     * @api
     *
     * Delete an action and all of its webhooks.
     *
     * @param string $id the ID of the action to delete
     *
     * @return BaseResponse<ActionDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['actions/%1$s', $id],
            options: $requestOptions,
            convert: ActionDeleteResponse::class,
        );
    }
}
