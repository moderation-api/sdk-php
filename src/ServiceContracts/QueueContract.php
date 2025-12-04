<?php

declare(strict_types=1);

namespace ModerationAPI\ServiceContracts;

use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\Queue\QueueGetResponse;
use ModerationAPI\Queue\QueueGetStatsParams;
use ModerationAPI\Queue\QueueGetStatsResponse;
use ModerationAPI\RequestOptions;

interface QueueContract
{
    /**
     * @api
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
     * @param array<mixed>|QueueGetStatsParams $params
     *
     * @throws APIException
     */
    public function getStats(
        string $id,
        array|QueueGetStatsParams $params,
        ?RequestOptions $requestOptions = null,
    ): QueueGetStatsResponse;
}
