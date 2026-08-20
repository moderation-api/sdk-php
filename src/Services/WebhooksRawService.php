<?php

declare(strict_types=1);

namespace ModerationAPI\Services;

use ModerationAPI\Client;
use ModerationAPI\Core\Contracts\BaseResponse;
use ModerationAPI\Core\Conversion\ListOf;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\WebhooksRawContract;
use ModerationAPI\Webhooks\WebhookCreateParams;
use ModerationAPI\Webhooks\WebhookCreateParams\EventType;
use ModerationAPI\Webhooks\WebhookDeleteResponse;
use ModerationAPI\Webhooks\WebhookGetResponse;
use ModerationAPI\Webhooks\WebhookListResponseItem;
use ModerationAPI\Webhooks\WebhookNewResponse;
use ModerationAPI\Webhooks\WebhookUpdateParams;
use ModerationAPI\Webhooks\WebhookUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \ModerationAPI\RequestOptions
 */
final class WebhooksRawService implements WebhooksRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a webhook subscribed to one or more event types. Deliveries use the v2 envelope and are signed with the project signing secret (see the signing secret endpoint).
     *
     * @param array{
     *   eventTypes: list<EventType|value-of<EventType>>,
     *   name: string,
     *   url: string,
     *   description?: string|null,
     * }|WebhookCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WebhookNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|WebhookCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'webhooks',
            body: (object) $parsed,
            options: $options,
            convert: WebhookNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a webhook by ID.
     *
     * @param string $id the ID of the webhook to get
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WebhookGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['webhooks/%1$s', $id],
            options: $requestOptions,
            convert: WebhookGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a webhook. Legacy v1 webhooks are read-only: delete them and create a new webhook instead.
     *
     * @param string $id the ID of the webhook to update
     * @param array{
     *   description?: string|null,
     *   eventTypes?: list<WebhookUpdateParams\EventType|value-of<WebhookUpdateParams\EventType>>,
     *   name?: string,
     *   url?: string,
     * }|WebhookUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WebhookUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|WebhookUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WebhookUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['webhooks/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: WebhookUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List all webhooks for the authenticated project.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<WebhookListResponseItem>>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'webhooks',
            options: $requestOptions,
            convert: new ListOf(WebhookListResponseItem::class),
        );
    }

    /**
     * @api
     *
     * Delete a webhook.
     *
     * @param string $id the ID of the webhook to delete
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WebhookDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['webhooks/%1$s', $id],
            options: $requestOptions,
            convert: WebhookDeleteResponse::class,
        );
    }
}
