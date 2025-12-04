<?php

declare(strict_types=1);

namespace ModerationAPI\Services;

use ModerationAPI\Client;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\Queue\QueueGetResponse;
use ModerationAPI\Queue\QueueGetStatsParams;
use ModerationAPI\Queue\QueueGetStatsResponse;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\QueueContract;
use ModerationAPI\Services\Queue\ItemsService;

final class QueueService implements QueueContract
{
    /**
     * @api
     */
    public ItemsService $items;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->items = new ItemsService($client);
    }

    /**
     * @api
     *
     * Get a queue
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): QueueGetResponse {
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
     * @param array{withinDays?: string}|QueueGetStatsParams $params
     *
     * @throws APIException
     */
    public function getStats(
        string $id,
        array|QueueGetStatsParams $params,
        ?RequestOptions $requestOptions = null,
    ): QueueGetStatsResponse {
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
