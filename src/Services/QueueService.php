<?php

declare(strict_types=1);

namespace ModerationAPI\Services;

use ModerationAPI\Client;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\Core\Util;
use ModerationAPI\Queue\QueueGetResponse;
use ModerationAPI\Queue\QueueGetStatsResponse;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\QueueContract;
use ModerationAPI\Services\Queue\ItemsService;

/**
 * @phpstan-import-type RequestOpts from \ModerationAPI\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getStats(
        string $id,
        string $withinDays = '30',
        RequestOptions|array|null $requestOptions = null,
    ): QueueGetStatsResponse {
        $params = Util::removeNulls(['withinDays' => $withinDays]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getStats($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
