<?php

declare(strict_types=1);

namespace ModerationAPI\ServiceContracts;

use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\Queue\QueueGetResponse;
use ModerationAPI\Queue\QueueGetStatsResponse;
use ModerationAPI\RequestOptions;

interface QueueContract
{
    /**
     * @api
     *
     * @param string $id The queue ID
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): QueueGetResponse;

    /**
     * @api
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
    ): QueueGetStatsResponse;
}
