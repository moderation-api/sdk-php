<?php

declare(strict_types=1);

namespace ModerationAPI\Services;

use ModerationAPI\Client;
use ModerationAPI\Core\Contracts\BaseResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\WebhookSecretRawContract;
use ModerationAPI\WebhookSecret\WebhookSecretGetResponse;

/**
 * @phpstan-import-type RequestOpts from \ModerationAPI\RequestOptions
 */
final class WebhookSecretRawService implements WebhookSecretRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get the signing secret used to sign webhook deliveries for this project, creating one if none exists yet. Verify deliveries by comparing the `modapi-signature` header to HMAC-SHA256(raw request body, secret) hex-encoded.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WebhookSecretGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'webhook-secret',
            options: $requestOptions,
            convert: WebhookSecretGetResponse::class,
        );
    }
}
