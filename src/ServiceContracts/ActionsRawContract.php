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

interface ActionsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|ActionCreateParams $params
     *
     * @return BaseResponse<ActionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|ActionCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the ID of the action to get
     *
     * @return BaseResponse<ActionGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the ID of the action to update
     * @param array<mixed>|ActionUpdateParams $params
     *
     * @return BaseResponse<ActionUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|ActionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionListParams $params
     *
     * @return BaseResponse<list<ActionListResponseItem>>
     *
     * @throws APIException
     */
    public function list(
        array|ActionListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the ID of the action to delete
     *
     * @return BaseResponse<ActionDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
