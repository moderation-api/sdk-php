<?php

declare(strict_types=1);

namespace ModerationAPI\ServiceContracts\Actions;

use ModerationAPI\Actions\Execute\ExecuteExecuteByIDParams;
use ModerationAPI\Actions\Execute\ExecuteExecuteByIDResponse;
use ModerationAPI\Actions\Execute\ExecuteExecuteParams;
use ModerationAPI\Actions\Execute\ExecuteExecuteResponse;
use ModerationAPI\Core\Contracts\BaseResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;

interface ExecuteRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|ExecuteExecuteParams $params
     *
     * @return BaseResponse<ExecuteExecuteResponse>
     *
     * @throws APIException
     */
    public function execute(
        array|ExecuteExecuteParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param string $actionID the ID or key of the action to execute
     * @param array<mixed>|ExecuteExecuteByIDParams $params
     *
     * @return BaseResponse<ExecuteExecuteByIDResponse>
     *
     * @throws APIException
     */
    public function executeByID(
        string $actionID,
        array|ExecuteExecuteByIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
