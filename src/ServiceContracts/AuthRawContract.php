<?php

declare(strict_types=1);

namespace ModerationAPI\ServiceContracts;

use ModerationAPI\Auth\AuthGetResponse;
use ModerationAPI\Auth\AuthNewResponse;
use ModerationAPI\Core\Contracts\BaseResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;

interface AuthRawContract
{
    /**
     * @deprecated
     *
     * @api
     *
     * @return BaseResponse<AuthNewResponse>
     *
     * @throws APIException
     */
    public function create(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @return BaseResponse<AuthGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
