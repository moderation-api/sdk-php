<?php

declare(strict_types=1);

namespace ModerationAPI\ServiceContracts;

use ModerationAPI\Core\Contracts\BaseResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;
use ModerationAPI\Webhooks\WebhookCreateParams;
use ModerationAPI\Webhooks\WebhookDeleteResponse;
use ModerationAPI\Webhooks\WebhookGetResponse;
use ModerationAPI\Webhooks\WebhookListResponseItem;
use ModerationAPI\Webhooks\WebhookNewResponse;
use ModerationAPI\Webhooks\WebhookUpdateParams;
use ModerationAPI\Webhooks\WebhookUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \ModerationAPI\RequestOptions
 */
interface WebhooksRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|WebhookCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WebhookNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|WebhookCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the ID of the webhook to update
     * @param array<string,mixed>|WebhookUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<WebhookListResponseItem>>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;
}
