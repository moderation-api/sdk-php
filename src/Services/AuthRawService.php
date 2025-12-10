<?php

declare(strict_types=1);

namespace ModerationAPI\Services;

use ModerationAPI\Auth\AuthGetResponse;
use ModerationAPI\Auth\AuthNewResponse;
use ModerationAPI\Client;
use ModerationAPI\Core\Contracts\BaseResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\AuthRawContract;

final class AuthRawService implements AuthRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @deprecated
     *
     * @api
     *
     * @return BaseResponse<AuthNewResponse>
     *
     * @throws APIException
     */
    public function create(?RequestOptions $requestOptions = null): BaseResponse
    {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'auth',
            options: $requestOptions,
            convert: AuthNewResponse::class,
        );
    }

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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'auth',
            options: $requestOptions,
            convert: AuthGetResponse::class,
        );
    }
}
