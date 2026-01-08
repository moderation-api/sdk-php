<?php

declare(strict_types=1);

namespace ModerationAPI\ServiceContracts;

use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\Queue\QueueGetResponse;
use ModerationAPI\Queue\QueueGetStatsResponse;
use ModerationAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \ModerationAPI\RequestOptions
 */
interface QueueContract
{
    /**
     * @api
     *
     * @param string $id The queue ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): QueueGetResponse;

    /**
     * @api
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
    ): QueueGetStatsResponse;
}
