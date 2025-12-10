<?php

declare(strict_types=1);

namespace ModerationAPI\Services;

use ModerationAPI\Client;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\Queue\QueueGetResponse;
use ModerationAPI\Queue\QueueGetStatsResponse;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\QueueContract;
use ModerationAPI\Services\Queue\ItemsService;

final class QueueService implements QueueContract
{
    /**
     * @api
     */
    public QueueRawService $raw;

    /**
     * @api
     */
    public ItemsService $items;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new QueueRawService($client);
        $this->items = new ItemsService($client);
    }

    /**
     * @api
     *
     * Get a queue
     *
     * @param string $id The queue ID
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): QueueGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get detailed statistics about a moderation queue including review times, action counts, and trends
     *
     * @param string $id The queue ID
     * @param string $withinDays Number of days to analyze statistics for
     *
     * @throws APIException
     */
    public function getStats(
        string $id,
        string $withinDays = '30',
        ?RequestOptions $requestOptions = null,
    ): QueueGetStatsResponse {
        $params = ['withinDays' => $withinDays];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getStats($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
