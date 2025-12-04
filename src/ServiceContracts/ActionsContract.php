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
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;

interface ActionsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ActionCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|ActionCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): ActionNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|ActionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ActionUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|ActionListParams $params
     *
     * @return list<ActionListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        array|ActionListParams $params,
        ?RequestOptions $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionDeleteResponse;
}
