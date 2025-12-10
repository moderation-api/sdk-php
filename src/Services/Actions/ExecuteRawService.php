<?php

declare(strict_types=1);

namespace ModerationAPI\Services\Actions;

use ModerationAPI\Actions\Execute\ExecuteExecuteByIDParams;
use ModerationAPI\Actions\Execute\ExecuteExecuteByIDResponse;
use ModerationAPI\Actions\Execute\ExecuteExecuteParams;
use ModerationAPI\Actions\Execute\ExecuteExecuteResponse;
use ModerationAPI\Client;
use ModerationAPI\Core\Contracts\BaseResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\Actions\ExecuteRawContract;

final class ExecuteRawService implements ExecuteRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Execute a moderation action on one or more content items.
     *
     * @param array{
     *   actionKey: string,
     *   authorIDs?: list<string>,
     *   contentIDs?: list<string>,
     *   duration?: float,
     *   queueID?: string,
     *   value?: string,
     * }|ExecuteExecuteParams $params
     *
     * @return BaseResponse<ExecuteExecuteResponse>
     *
     * @throws APIException
     */
    public function execute(
        array|ExecuteExecuteParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = ExecuteExecuteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'actions/execute',
            body: (object) $parsed,
            options: $options,
            convert: ExecuteExecuteResponse::class,
        );
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Execute an action on a set of content items in a queue.
     *
     * @param string $actionID the ID or key of the action to execute
     * @param array{
     *   authorIDs?: list<string>,
     *   contentIDs?: list<string>,
     *   queueID?: string,
     *   value?: string,
     * }|ExecuteExecuteByIDParams $params
     *
     * @return BaseResponse<ExecuteExecuteByIDResponse>
     *
     * @throws APIException
     */
    public function executeByID(
        string $actionID,
        array|ExecuteExecuteByIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ExecuteExecuteByIDParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['actions/%1$s/execute', $actionID],
            body: (object) $parsed,
            options: $options,
            convert: ExecuteExecuteByIDResponse::class,
        );
    }
}
