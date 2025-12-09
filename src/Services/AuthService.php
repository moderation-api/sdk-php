<?php

declare(strict_types=1);

namespace ModerationAPI\Services;

use ModerationAPI\Auth\AuthGetResponse;
use ModerationAPI\Auth\AuthNewResponse;
use ModerationAPI\Client;
use ModerationAPI\Core\Contracts\BaseResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\AuthContract;

final class AuthService implements AuthContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @deprecated
     *
     * @api
     *
     * @throws APIException
     */
    public function create(
        ?RequestOptions $requestOptions = null
    ): AuthNewResponse {
        /** @var BaseResponse<AuthNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'auth',
            options: $requestOptions,
            convert: AuthNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @deprecated
     *
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        ?RequestOptions $requestOptions = null
    ): AuthGetResponse {
        /** @var BaseResponse<AuthGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'auth',
            options: $requestOptions,
            convert: AuthGetResponse::class,
        );

        return $response->parse();
    }
}
