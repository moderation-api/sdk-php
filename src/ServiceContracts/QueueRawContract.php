<?php

declare(strict_types=1);

namespace ModerationAPI\ServiceContracts;

use ModerationAPI\Core\Contracts\BaseResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\Queue\QueueGetResponse;
use ModerationAPI\Queue\QueueGetStatsParams;
use ModerationAPI\Queue\QueueGetStatsResponse;
use ModerationAPI\RequestOptions;

interface QueueRawContract
{
    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id The queue ID
     * @param array<mixed>|QueueGetStatsParams $params
     *
     * @return BaseResponse<QueueGetStatsResponse>
     *
     * @throws APIException
     */
    public function getStats(
        string $id,
        array|QueueGetStatsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
