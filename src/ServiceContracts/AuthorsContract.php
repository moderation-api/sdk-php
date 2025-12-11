<?php

declare(strict_types=1);

namespace ModerationAPI\ServiceContracts;

use ModerationAPI\Authors\AuthorDeleteResponse;
use ModerationAPI\Authors\AuthorGetResponse;
use ModerationAPI\Authors\AuthorListParams\SortBy;
use ModerationAPI\Authors\AuthorListParams\SortDirection;
use ModerationAPI\Authors\AuthorListResponse;
use ModerationAPI\Authors\AuthorNewResponse;
use ModerationAPI\Authors\AuthorUpdateResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\RequestOptions;

interface AuthorsContract
{
    /**
     * @api
     *
     * @param string $externalID external ID of the user, typically the ID of the author in your database
     * @param string|null $email Author email address
     * @param string|null $externalLink URL of the author's external profile
     * @param float $firstSeen Timestamp when author first appeared
     * @param float $lastSeen Timestamp of last activity
     * @param array{
     *   emailVerified?: bool|null,
     *   identityVerified?: bool|null,
     *   isPayingCustomer?: bool|null,
     *   phoneVerified?: bool|null,
     * } $metadata Additional metadata provided by your system. We recommend including any relevant information that may assist in the moderation process.
     * @param string|null $name Author name or identifier
     * @param string|null $profilePicture URL of the author's profile picture
     *
     * @throws APIException
     */
    public function create(
        string $externalID,
        ?string $email = null,
        ?string $externalLink = null,
        ?float $firstSeen = null,
        ?float $lastSeen = null,
        ?float $manualTrustLevel = null,
        ?array $metadata = null,
        ?string $name = null,
        ?string $profilePicture = null,
        ?RequestOptions $requestOptions = null,
    ): AuthorNewResponse;

    /**
     * @api
     *
     * @param string $id either external ID or the ID assigned by moderation API
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
     * @param string $id either external ID or the ID assigned by moderation API
     * @param string|null $email Author email address
     * @param string|null $externalLink URL of the author's external profile
     * @param float $firstSeen Timestamp when author first appeared
     * @param float $lastSeen Timestamp of last activity
     * @param array{
     *   emailVerified?: bool|null,
     *   identityVerified?: bool|null,
     *   isPayingCustomer?: bool|null,
     *   phoneVerified?: bool|null,
     * } $metadata Additional metadata provided by your system. We recommend including any relevant information that may assist in the moderation process.
     * @param string|null $name Author name or identifier
     * @param string|null $profilePicture URL of the author's profile picture
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?string $email = null,
        ?string $externalLink = null,
        ?float $firstSeen = null,
        ?float $lastSeen = null,
        ?float $manualTrustLevel = null,
        ?array $metadata = null,
        ?string $name = null,
        ?string $profilePicture = null,
        ?RequestOptions $requestOptions = null,
    ): AuthorUpdateResponse;

    /**
     * @api
     *
     * @param float $pageNumber Page number to fetch
     * @param float $pageSize Number of authors per page
     * @param 'trustLevel'|'violationCount'|'reportCount'|'memberSince'|'lastActive'|'contentCount'|'flaggedContentRatio'|'averageSentiment'|SortBy $sortBy
     * @param 'asc'|'desc'|SortDirection $sortDirection Sort direction
     *
     * @throws APIException
     */
    public function list(
        ?string $contentTypes = null,
        ?string $lastActiveDate = null,
        ?string $memberSinceDate = null,
        float $pageNumber = 1,
        float $pageSize = 20,
        string|SortBy|null $sortBy = null,
        string|SortDirection $sortDirection = 'desc',
        ?RequestOptions $requestOptions = null,
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
