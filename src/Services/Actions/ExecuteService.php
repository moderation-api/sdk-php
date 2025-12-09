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
use ModerationAPI\ServiceContracts\Actions\ExecuteContract;

final class ExecuteService implements ExecuteContract
{
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
     * @throws APIException
     */
    public function execute(
        array|ExecuteExecuteParams $params,
        ?RequestOptions $requestOptions = null
    ): ExecuteExecuteResponse {
        [$parsed, $options] = ExecuteExecuteParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ExecuteExecuteResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'actions/execute',
            body: (object) $parsed,
            options: $options,
            convert: ExecuteExecuteResponse::class,
        );

        return $response->parse();
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Execute an action on a set of content items in a queue.
     *
     * @param array{
     *   authorIDs?: list<string>,
     *   contentIDs?: list<string>,
     *   queueID?: string,
     *   value?: string,
     * }|ExecuteExecuteByIDParams $params
     *
     * @throws APIException
     */
    public function executeByID(
        string $actionID,
        array|ExecuteExecuteByIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): ExecuteExecuteByIDResponse {
        [$parsed, $options] = ExecuteExecuteByIDParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ExecuteExecuteByIDResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['actions/%1$s/execute', $actionID],
            body: (object) $parsed,
            options: $options,
            convert: ExecuteExecuteByIDResponse::class,
        );

        return $response->parse();
    }
}
