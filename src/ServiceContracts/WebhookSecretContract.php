<?php

declare(strict_types=1);

namespace ModerationAPI\ServiceContracts;

use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;
use ModerationAPI\WebhookSecret\WebhookSecretGetResponse;

/**
 * @phpstan-import-type RequestOpts from \ModerationAPI\RequestOptions
 */
interface WebhookSecretContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        RequestOptions|array|null $requestOptions = null
    ): WebhookSecretGetResponse;
}
