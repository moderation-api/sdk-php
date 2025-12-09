<?php

declare(strict_types=1);

namespace ModerationAPI\Services;

use ModerationAPI\Account\AccountListResponse;
use ModerationAPI\Client;
use ModerationAPI\Core\Contracts\BaseResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\AccountContract;

final class AccountService implements AccountContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get account details
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): AccountListResponse {
        /** @var BaseResponse<AccountListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'account',
            options: $requestOptions,
            convert: AccountListResponse::class,
        );

        return $response->parse();
    }
}
