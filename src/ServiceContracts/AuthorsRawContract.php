<?php

declare(strict_types=1);

namespace ModerationAPI\ServiceContracts;

use ModerationAPI\Authors\AuthorCreateParams;
use ModerationAPI\Authors\AuthorDeleteResponse;
use ModerationAPI\Authors\AuthorGetResponse;
use ModerationAPI\Authors\AuthorListParams;
use ModerationAPI\Authors\AuthorListResponse;
use ModerationAPI\Authors\AuthorNewResponse;
use ModerationAPI\Authors\AuthorUpdateParams;
use ModerationAPI\Authors\AuthorUpdateResponse;
use ModerationAPI\Core\Contracts\BaseResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;

interface AuthorsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|AuthorCreateParams $params
     *
     * @return BaseResponse<AuthorNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|AuthorCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id either external ID or the ID assigned by moderation API
     *
     * @return BaseResponse<AuthorGetResponse>
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
     * @param string $id either external ID or the ID assigned by moderation API
     * @param array<mixed>|AuthorUpdateParams $params
     *
     * @return BaseResponse<AuthorUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|AuthorUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|AuthorListParams $params
     *
     * @return BaseResponse<AuthorListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|AuthorListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<AuthorDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
