<?php

declare(strict_types=1);

namespace ModerationAPI\ServiceContracts\Actions;

use ModerationAPI\Actions\Execute\ExecuteExecuteByIDParams;
use ModerationAPI\Actions\Execute\ExecuteExecuteByIDResponse;
use ModerationAPI\Actions\Execute\ExecuteExecuteParams;
use ModerationAPI\Actions\Execute\ExecuteExecuteResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;

interface ExecuteContract
{
    /**
     * @api
     *
     * @param array<mixed>|ExecuteExecuteParams $params
     *
     * @throws APIException
     */
    public function execute(
        array|ExecuteExecuteParams $params,
        ?RequestOptions $requestOptions = null
    ): ExecuteExecuteResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param array<mixed>|ExecuteExecuteByIDParams $params
     *
     * @throws APIException
     */
    public function executeByID(
        string $actionID,
        array|ExecuteExecuteByIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): ExecuteExecuteByIDResponse;
}
