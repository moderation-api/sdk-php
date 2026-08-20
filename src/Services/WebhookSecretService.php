<?php

declare(strict_types=1);

namespace ModerationAPI\Services;

use ModerationAPI\Client;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\WebhookSecretContract;
use ModerationAPI\WebhookSecret\WebhookSecretGetResponse;

/**
 * @phpstan-import-type RequestOpts from \ModerationAPI\RequestOptions
 */
final class WebhookSecretService implements WebhookSecretContract
{
    /**
     * @api
     */
    public WebhookSecretRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new WebhookSecretRawService($client);
    }

    /**
     * @api
     *
     * Get the signing secret used to sign webhook deliveries for this project, creating one if none exists yet. Verify deliveries by comparing the `modapi-signature` header to HMAC-SHA256(raw request body, secret) hex-encoded.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        RequestOptions|array|null $requestOptions = null
    ): WebhookSecretGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve(requestOptions: $requestOptions);

        return $response->parse();
    }
}
