<?php

declare(strict_types=1);

namespace ModerationAPI\Services;

use ModerationAPI\Client;
use ModerationAPI\Core\Contracts\BaseResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\Queue\QueueGetResponse;
use ModerationAPI\Queue\QueueGetStatsParams;
use ModerationAPI\Queue\QueueGetStatsResponse;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\QueueRawContract;

final class QueueRawService implements QueueRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get a queue
     *
     * @param string $id The queue ID
     *
     * @return BaseResponse<QueueGetResponse>
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
            path: ['queue/%1$s', $id],
            options: $requestOptions,
            convert: QueueGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Get detailed statistics about a moderation queue including review times, action counts, and trends
     *
     * @param string $id The queue ID
     * @param array{withinDays?: string}|QueueGetStatsParams $params
     *
     * @return BaseResponse<QueueGetStatsResponse>
     *
     * @throws APIException
     */
    public function getStats(
        string $id,
        array|QueueGetStatsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = QueueGetStatsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['queue/%1$s/stats', $id],
            query: $parsed,
            options: $options,
            convert: QueueGetStatsResponse::class,
        );
    }
}
