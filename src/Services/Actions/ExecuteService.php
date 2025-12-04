<?php

declare(strict_types=1);

namespace ModerationAPI\Services\Actions;

use ModerationAPI\Actions\Execute\ExecuteExecuteByIDParams;
use ModerationAPI\Actions\Execute\ExecuteExecuteByIDResponse;
use ModerationAPI\Actions\Execute\ExecuteExecuteParams;
use ModerationAPI\Actions\Execute\ExecuteExecuteResponse;
use ModerationAPI\Client;
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
     *   authorIds?: list<string>,
     *   contentIds?: list<string>,
     *   duration?: float,
     *   queueId?: string,
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
     * @param array{
     *   authorIds?: list<string>,
     *   contentIds?: list<string>,
     *   queueId?: string,
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
