<?php

declare(strict_types=1);

namespace ModerationAPI\ServiceContracts;

use ModerationAPI\Core\Contracts\BaseResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;
use ModerationAPI\WebhookSecret\WebhookSecretGetResponse;

/**
 * @phpstan-import-type RequestOpts from \ModerationAPI\RequestOptions
 */
interface WebhookSecretRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WebhookSecretGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
