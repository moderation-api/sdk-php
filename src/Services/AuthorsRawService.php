<?php

declare(strict_types=1);

namespace ModerationAPI\Services;

use ModerationAPI\Authors\AuthorCreateParams;
use ModerationAPI\Authors\AuthorDeleteResponse;
use ModerationAPI\Authors\AuthorGetResponse;
use ModerationAPI\Authors\AuthorListParams;
use ModerationAPI\Authors\AuthorListParams\SortBy;
use ModerationAPI\Authors\AuthorListParams\SortDirection;
use ModerationAPI\Authors\AuthorListResponse;
use ModerationAPI\Authors\AuthorNewResponse;
use ModerationAPI\Authors\AuthorUpdateParams;
use ModerationAPI\Authors\AuthorUpdateResponse;
use ModerationAPI\Client;
use ModerationAPI\Core\Contracts\BaseResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\AuthorsRawContract;

final class AuthorsRawService implements AuthorsRawContract
{
    // @phpstan-ignore-next-line
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
     *   externalID: string,
     *   email?: string|null,
     *   externalLink?: string|null,
     *   firstSeen?: float,
     *   lastSeen?: float,
     *   manualTrustLevel?: float|null,
     *   metadata?: array{
     *     emailVerified?: bool|null,
     *     identityVerified?: bool|null,
     *     isPayingCustomer?: bool|null,
     *     phoneVerified?: bool|null,
     *   },
     *   name?: string|null,
     *   profilePicture?: string|null,
     * }|AuthorCreateParams $params
     *
     * @return BaseResponse<AuthorNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|AuthorCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = AuthorCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'authors',
            body: (object) $parsed,
            options: $options,
            convert: AuthorNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get detailed information about a specific author including historical data and analysis
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['authors/%1$s', $id],
            options: $requestOptions,
            convert: AuthorGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update the details of a specific author
     *
     * @param string $id either external ID or the ID assigned by moderation API
     * @param array{
     *   email?: string|null,
     *   externalLink?: string|null,
     *   firstSeen?: float,
     *   lastSeen?: float,
     *   manualTrustLevel?: float|null,
     *   metadata?: array{
     *     emailVerified?: bool|null,
     *     identityVerified?: bool|null,
     *     isPayingCustomer?: bool|null,
     *     phoneVerified?: bool|null,
     *   },
     *   name?: string|null,
     *   profilePicture?: string|null,
     * }|AuthorUpdateParams $params
     *
     * @return BaseResponse<AuthorUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|AuthorUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AuthorUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['authors/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: AuthorUpdateResponse::class,
        );
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
     *   sortDirection?: 'asc'|'desc'|SortDirection,
     * }|AuthorListParams $params
     *
     * @return BaseResponse<AuthorListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|AuthorListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = AuthorListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'authors',
            query: $parsed,
            options: $options,
            convert: AuthorListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a specific author
     *
     * @return BaseResponse<AuthorDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['authors/%1$s', $id],
            options: $requestOptions,
            convert: AuthorDeleteResponse::class,
        );
    }
}
