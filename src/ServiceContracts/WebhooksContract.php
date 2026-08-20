<?php

declare(strict_types=1);

namespace ModerationAPI\ServiceContracts;

use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;
use ModerationAPI\Webhooks\WebhookCreateParams\EventType;
use ModerationAPI\Webhooks\WebhookDeleteResponse;
use ModerationAPI\Webhooks\WebhookGetResponse;
use ModerationAPI\Webhooks\WebhookListResponseItem;
use ModerationAPI\Webhooks\WebhookNewResponse;
use ModerationAPI\Webhooks\WebhookUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \ModerationAPI\RequestOptions
 */
interface WebhooksContract
{
    /**
     * @api
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
    ): WebhookNewResponse;

    /**
     * @api
     *
     * @param string $id the ID of the webhook to get
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): WebhookGetResponse;

    /**
     * @api
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
    ): WebhookUpdateResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return list<WebhookListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @param string $id the ID of the webhook to delete
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): WebhookDeleteResponse;
}
