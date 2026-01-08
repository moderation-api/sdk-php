<?php

declare(strict_types=1);

namespace ModerationAPI\Services;

use ModerationAPI\Authors\AuthorCreateParams\Metadata;
use ModerationAPI\Authors\AuthorDeleteResponse;
use ModerationAPI\Authors\AuthorGetResponse;
use ModerationAPI\Authors\AuthorListParams\SortBy;
use ModerationAPI\Authors\AuthorListParams\SortDirection;
use ModerationAPI\Authors\AuthorListResponse;
use ModerationAPI\Authors\AuthorNewResponse;
use ModerationAPI\Authors\AuthorUpdateResponse;
use ModerationAPI\Client;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\Core\Util;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\AuthorsContract;

/**
 * @phpstan-import-type MetadataShape from \ModerationAPI\Authors\AuthorCreateParams\Metadata
 * @phpstan-import-type MetadataShape from \ModerationAPI\Authors\AuthorUpdateParams\Metadata as MetadataShape1
 * @phpstan-import-type RequestOpts from \ModerationAPI\RequestOptions
 */
final class AuthorsService implements AuthorsContract
{
    /**
     * @api
     */
    public AuthorsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AuthorsRawService($client);
    }

    /**
     * @api
     *
     * Create a new author. Typically not needed as authors are created automatically when content is moderated.
     *
     * @param string $externalID external ID of the user, typically the ID of the author in your database
     * @param string|null $email Author email address
     * @param string|null $externalLink URL of the author's external profile
     * @param float $firstSeen Timestamp when author first appeared
     * @param float $lastSeen Timestamp of last activity
     * @param Metadata|MetadataShape $metadata Additional metadata provided by your system. We recommend including any relevant information that may assist in the moderation process.
     * @param string|null $name Author name or identifier
     * @param string|null $profilePicture URL of the author's profile picture
     * @param RequestOpts|null $requestOptions
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
        Metadata|array|null $metadata = null,
        ?string $name = null,
        ?string $profilePicture = null,
        RequestOptions|array|null $requestOptions = null,
    ): AuthorNewResponse {
        $params = Util::removeNulls(
            [
                'externalID' => $externalID,
                'email' => $email,
                'externalLink' => $externalLink,
                'firstSeen' => $firstSeen,
                'lastSeen' => $lastSeen,
                'manualTrustLevel' => $manualTrustLevel,
                'metadata' => $metadata,
                'name' => $name,
                'profilePicture' => $profilePicture,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get detailed information about a specific author including historical data and analysis
     *
     * @param string $id either external ID or the ID assigned by moderation API
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): AuthorGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the details of a specific author
     *
     * @param string $id either external ID or the ID assigned by moderation API
     * @param string|null $email Author email address
     * @param string|null $externalLink URL of the author's external profile
     * @param float $firstSeen Timestamp when author first appeared
     * @param float $lastSeen Timestamp of last activity
     * @param \ModerationAPI\Authors\AuthorUpdateParams\Metadata|MetadataShape1 $metadata Additional metadata provided by your system. We recommend including any relevant information that may assist in the moderation process.
     * @param string|null $name Author name or identifier
     * @param string|null $profilePicture URL of the author's profile picture
     * @param RequestOpts|null $requestOptions
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
        \ModerationAPI\Authors\AuthorUpdateParams\Metadata|array|null $metadata = null,
        ?string $name = null,
        ?string $profilePicture = null,
        RequestOptions|array|null $requestOptions = null,
    ): AuthorUpdateResponse {
        $params = Util::removeNulls(
            [
                'email' => $email,
                'externalLink' => $externalLink,
                'firstSeen' => $firstSeen,
                'lastSeen' => $lastSeen,
                'manualTrustLevel' => $manualTrustLevel,
                'metadata' => $metadata,
                'name' => $name,
                'profilePicture' => $profilePicture,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a paginated list of authors with their activity metrics and reputation
     *
     * @param float $pageNumber Page number to fetch
     * @param float $pageSize Number of authors per page
     * @param SortBy|value-of<SortBy> $sortBy
     * @param SortDirection|value-of<SortDirection> $sortDirection Sort direction
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        ?string $contentTypes = null,
        ?string $lastActiveDate = null,
        ?string $memberSinceDate = null,
        float $pageNumber = 1,
        float $pageSize = 20,
        SortBy|string|null $sortBy = null,
        SortDirection|string $sortDirection = 'desc',
        RequestOptions|array|null $requestOptions = null,
    ): AuthorListResponse {
        $params = Util::removeNulls(
            [
                'contentTypes' => $contentTypes,
                'lastActiveDate' => $lastActiveDate,
                'memberSinceDate' => $memberSinceDate,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'sortBy' => $sortBy,
                'sortDirection' => $sortDirection,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a specific author
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): AuthorDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
