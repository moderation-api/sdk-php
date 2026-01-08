<?php

declare(strict_types=1);

namespace ModerationAPI\ServiceContracts;

use ModerationAPI\Actions\ActionCreateParams;
use ModerationAPI\Actions\ActionDeleteResponse;
use ModerationAPI\Actions\ActionGetResponse;
use ModerationAPI\Actions\ActionListParams;
use ModerationAPI\Actions\ActionListResponseItem;
use ModerationAPI\Actions\ActionNewResponse;
use ModerationAPI\Actions\ActionUpdateParams;
use ModerationAPI\Actions\ActionUpdateResponse;
use ModerationAPI\Core\Contracts\BaseResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \ModerationAPI\RequestOptions
 */
interface ActionsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ActionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|ActionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the ID of the action to get
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionGetResponse>
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
     * @param string $id the ID of the action to update
     * @param array<string,mixed>|ActionUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|ActionUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ActionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<ActionListResponseItem>>
     *
     * @throws APIException
     */
    public function list(
        array|ActionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the ID of the action to delete
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
