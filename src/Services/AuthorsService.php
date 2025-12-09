<?php

declare(strict_types=1);

namespace ModerationAPI\Services;

use ModerationAPI\Authors\AuthorCreateParams;
use ModerationAPI\Authors\AuthorDeleteResponse;
use ModerationAPI\Authors\AuthorGetResponse;
use ModerationAPI\Authors\AuthorListParams;
use ModerationAPI\Authors\AuthorListParams\SortBy;
use ModerationAPI\Authors\AuthorListResponse;
use ModerationAPI\Authors\AuthorNewResponse;
use ModerationAPI\Authors\AuthorUpdateParams;
use ModerationAPI\Authors\AuthorUpdateResponse;
use ModerationAPI\Client;
use ModerationAPI\Core\Contracts\BaseResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\AuthorsContract;

final class AuthorsService implements AuthorsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new author. Typically not needed as authors are created automatically when content is moderated.
     *
     * @param array{
     *   external_id: string,
     *   email?: string|null,
     *   external_link?: string|null,
     *   first_seen?: float,
     *   last_seen?: float,
     *   manual_trust_level?: float|null,
     *   metadata?: array{
     *     email_verified?: bool|null,
     *     identity_verified?: bool|null,
     *     is_paying_customer?: bool|null,
     *     phone_verified?: bool|null,
     *   },
     *   name?: string|null,
     *   profile_picture?: string|null,
     * }|AuthorCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|AuthorCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): AuthorNewResponse {
        [$parsed, $options] = AuthorCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<AuthorNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'authors',
            body: (object) $parsed,
            options: $options,
            convert: AuthorNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get detailed information about a specific author including historical data and analysis
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): AuthorGetResponse {
        /** @var BaseResponse<AuthorGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['authors/%1$s', $id],
            options: $requestOptions,
            convert: AuthorGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the details of a specific author
     *
     * @param array{
     *   email?: string|null,
     *   external_link?: string|null,
     *   first_seen?: float,
     *   last_seen?: float,
     *   manual_trust_level?: float|null,
     *   metadata?: array{
     *     email_verified?: bool|null,
     *     identity_verified?: bool|null,
     *     is_paying_customer?: bool|null,
     *     phone_verified?: bool|null,
     *   },
     *   name?: string|null,
     *   profile_picture?: string|null,
     * }|AuthorUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|AuthorUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): AuthorUpdateResponse {
        [$parsed, $options] = AuthorUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<AuthorUpdateResponse> */
        $response = $this->client->request(
            method: 'put',
            path: ['authors/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: AuthorUpdateResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a paginated list of authors with their activity metrics and reputation
     *
     * @param array{
     *   contentTypes?: string,
     *   lastActiveDate?: string,
     *   memberSinceDate?: string,
     *   pageNumber?: float,
     *   pageSize?: float,
     *   sortBy?: value-of<SortBy>,
     *   sortDirection?: 'asc'|'desc',
     * }|AuthorListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|AuthorListParams $params,
        ?RequestOptions $requestOptions = null
    ): AuthorListResponse {
        [$parsed, $options] = AuthorListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<AuthorListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'authors',
            query: $parsed,
            options: $options,
            convert: AuthorListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a specific author
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): AuthorDeleteResponse {
        /** @var BaseResponse<AuthorDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['authors/%1$s', $id],
            options: $requestOptions,
            convert: AuthorDeleteResponse::class,
        );

        return $response->parse();
    }
}
