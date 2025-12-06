<?php

declare(strict_types=1);

namespace ModerationAPI\Authors;

use ModerationAPI\Authors\AuthorListParams\SortBy;
use ModerationAPI\Authors\AuthorListParams\SortDirection;
use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkParams;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Get a paginated list of authors with their activity metrics and reputation.
 *
 * @see ModerationAPI\Services\AuthorsService::list()
 *
 * @phpstan-type AuthorListParamsShape = array{
 *   contentTypes?: string,
 *   lastActiveDate?: string,
 *   memberSinceDate?: string,
 *   pageNumber?: float,
 *   pageSize?: float,
 *   sortBy?: SortBy|value-of<SortBy>,
 *   sortDirection?: SortDirection|value-of<SortDirection>,
 * }
 */
final class AuthorListParams implements BaseModel
{
    /** @use SdkModel<AuthorListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?string $contentTypes;

    #[Api(optional: true)]
    public ?string $lastActiveDate;

    #[Api(optional: true)]
    public ?string $memberSinceDate;

    /**
     * Page number to fetch.
     */
    #[Api(optional: true)]
    public ?float $pageNumber;

    /**
     * Number of authors per page.
     */
    #[Api(optional: true)]
    public ?float $pageSize;

    /** @var value-of<SortBy>|null $sortBy */
    #[Api(enum: SortBy::class, optional: true)]
    public ?string $sortBy;

    /**
     * Sort direction.
     *
     * @var value-of<SortDirection>|null $sortDirection
     */
    #[Api(enum: SortDirection::class, optional: true)]
    public ?string $sortDirection;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SortBy|value-of<SortBy> $sortBy
     * @param SortDirection|value-of<SortDirection> $sortDirection
     */
    public static function with(
        ?string $contentTypes = null,
        ?string $lastActiveDate = null,
        ?string $memberSinceDate = null,
        ?float $pageNumber = null,
        ?float $pageSize = null,
        SortBy|string|null $sortBy = null,
        SortDirection|string|null $sortDirection = null,
    ): self {
        $obj = new self;

        null !== $contentTypes && $obj['contentTypes'] = $contentTypes;
        null !== $lastActiveDate && $obj['lastActiveDate'] = $lastActiveDate;
        null !== $memberSinceDate && $obj['memberSinceDate'] = $memberSinceDate;
        null !== $pageNumber && $obj['pageNumber'] = $pageNumber;
        null !== $pageSize && $obj['pageSize'] = $pageSize;
        null !== $sortBy && $obj['sortBy'] = $sortBy;
        null !== $sortDirection && $obj['sortDirection'] = $sortDirection;

        return $obj;
    }

    public function withContentTypes(string $contentTypes): self
    {
        $obj = clone $this;
        $obj['contentTypes'] = $contentTypes;

        return $obj;
    }

    public function withLastActiveDate(string $lastActiveDate): self
    {
        $obj = clone $this;
        $obj['lastActiveDate'] = $lastActiveDate;

        return $obj;
    }

    public function withMemberSinceDate(string $memberSinceDate): self
    {
        $obj = clone $this;
        $obj['memberSinceDate'] = $memberSinceDate;

        return $obj;
    }

    /**
     * Page number to fetch.
     */
    public function withPageNumber(float $pageNumber): self
    {
        $obj = clone $this;
        $obj['pageNumber'] = $pageNumber;

        return $obj;
    }

    /**
     * Number of authors per page.
     */
    public function withPageSize(float $pageSize): self
    {
        $obj = clone $this;
        $obj['pageSize'] = $pageSize;

        return $obj;
    }

    /**
     * @param SortBy|value-of<SortBy> $sortBy
     */
    public function withSortBy(SortBy|string $sortBy): self
    {
        $obj = clone $this;
        $obj['sortBy'] = $sortBy;

        return $obj;
    }

    /**
     * Sort direction.
     *
     * @param SortDirection|value-of<SortDirection> $sortDirection
     */
    public function withSortDirection(SortDirection|string $sortDirection): self
    {
        $obj = clone $this;
        $obj['sortDirection'] = $sortDirection;

        return $obj;
    }
}
