<?php

declare(strict_types=1);

namespace ModerationAPI\Services;

use ModerationAPI\Client;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\Core\Util;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\WebhooksContract;
use ModerationAPI\Webhooks\WebhookCreateParams\EventType;
use ModerationAPI\Webhooks\WebhookDeleteResponse;
use ModerationAPI\Webhooks\WebhookGetResponse;
use ModerationAPI\Webhooks\WebhookListResponseItem;
use ModerationAPI\Webhooks\WebhookNewResponse;
use ModerationAPI\Webhooks\WebhookUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \ModerationAPI\RequestOptions
 */
final class WebhooksService implements WebhooksContract
{
    /**
     * @api
     */
    public WebhooksRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new WebhooksRawService($client);
    }

    /**
     * @api
     *
     * Create a webhook subscribed to one or more event types. Deliveries use the v2 envelope and are signed with the project signing secret (see the signing secret endpoint).
     *
     * @param list<EventType|value-of<EventType>> $eventTypes Event types this webhook subscribes to. One webhook URL receives all events you list here.
     * @param string $name The webhook's name, used to identify it in the dashboard
     * @param string $url The webhook's URL. We'll call this URL when an event occurs.
     * @param string|null $description The webhook's description
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        array $eventTypes,
        string $name,
        string $url,
        ?string $description = null,
        RequestOptions|array|null $requestOptions = null,
    ): WebhookNewResponse {
        $params = Util::removeNulls(
            [
                'eventTypes' => $eventTypes,
                'name' => $name,
                'url' => $url,
                'description' => $description,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a webhook by ID.
     *
     * @param string $id the ID of the webhook to get
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): WebhookGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a webhook. Legacy v1 webhooks are read-only: delete them and create a new webhook instead.
     *
     * @param string $id the ID of the webhook to update
     * @param string|null $description The webhook's description
     * @param list<\ModerationAPI\Webhooks\WebhookUpdateParams\EventType|value-of<\ModerationAPI\Webhooks\WebhookUpdateParams\EventType>> $eventTypes Event types this webhook subscribes to. One webhook URL receives all events you list here.
     * @param string $name The webhook's name, used to identify it in the dashboard
     * @param string $url The webhook's URL. We'll call this URL when an event occurs.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?string $description = null,
        ?array $eventTypes = null,
        ?string $name = null,
        ?string $url = null,
        RequestOptions|array|null $requestOptions = null,
    ): WebhookUpdateResponse {
        $params = Util::removeNulls(
            [
                'description' => $description,
                'eventTypes' => $eventTypes,
                'name' => $name,
                'url' => $url,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all webhooks for the authenticated project.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return list<WebhookListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): array {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a webhook.
     *
     * @param string $id the ID of the webhook to delete
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): WebhookDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
