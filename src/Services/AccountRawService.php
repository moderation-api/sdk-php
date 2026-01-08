<?php

declare(strict_types=1);

namespace ModerationAPI\Services;

use ModerationAPI\Account\AccountListResponse;
use ModerationAPI\Client;
use ModerationAPI\Core\Contracts\BaseResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\AccountRawContract;

/**
 * @phpstan-import-type RequestOpts from \ModerationAPI\RequestOptions
 */
final class AccountRawService implements AccountRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get account details
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AccountListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'account',
            options: $requestOptions,
            convert: AccountListResponse::class,
        );
    }
}
