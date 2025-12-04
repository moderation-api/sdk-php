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
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;

interface AuthorsContract
{
    /**
     * @api
     *
     * @param array<mixed>|AuthorCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|AuthorCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): AuthorNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): AuthorGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|AuthorUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|AuthorUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): AuthorUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|AuthorListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|AuthorListParams $params,
        ?RequestOptions $requestOptions = null
    ): AuthorListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): AuthorDeleteResponse;
}
