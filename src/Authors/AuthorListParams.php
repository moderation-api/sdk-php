<?php

declare(strict_types=1);

namespace ModerationAPI\Authors;

use ModerationAPI\Authors\AuthorListParams\SortBy;
use ModerationAPI\Authors\AuthorListParams\SortDirection;
use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkParams;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Get a paginated list of authors with their activity metrics and reputation.
 *
 * @see ModerationAPI\Services\AuthorsService::list()
 *
 * @phpstan-type AuthorListParamsShape = array{
 *   contentTypes?: string|null,
 *   lastActiveDate?: string|null,
 *   memberSinceDate?: string|null,
 *   pageNumber?: float|null,
 *   pageSize?: float|null,
 *   sortBy?: null|SortBy|value-of<SortBy>,
 *   sortDirection?: null|SortDirection|value-of<SortDirection>,
 * }
 */
final class AuthorListParams implements BaseModel
{
    /** @use SdkModel<AuthorListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $contentTypes;

    #[Optional]
    public ?string $lastActiveDate;

    #[Optional]
    public ?string $memberSinceDate;

    /**
     * Page number to fetch.
     */
    #[Optional]
    public ?float $pageNumber;

    /**
     * Number of authors per page.
     */
    #[Optional]
    public ?float $pageSize;

    /** @var value-of<SortBy>|null $sortBy */
    #[Optional(enum: SortBy::class)]
    public ?string $sortBy;

    /**
     * Sort direction.
     *
     * @var value-of<SortDirection>|null $sortDirection
     */
    #[Optional(enum: SortDirection::class)]
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
     * @param SortBy|value-of<SortBy>|null $sortBy
     * @param SortDirection|value-of<SortDirection>|null $sortDirection
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
        $self = new self;

        null !== $contentTypes && $self['contentTypes'] = $contentTypes;
        null !== $lastActiveDate && $self['lastActiveDate'] = $lastActiveDate;
        null !== $memberSinceDate && $self['memberSinceDate'] = $memberSinceDate;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $sortBy && $self['sortBy'] = $sortBy;
        null !== $sortDirection && $self['sortDirection'] = $sortDirection;

        return $self;
    }

    public function withContentTypes(string $contentTypes): self
    {
        $self = clone $this;
        $self['contentTypes'] = $contentTypes;

        return $self;
    }

    public function withLastActiveDate(string $lastActiveDate): self
    {
        $self = clone $this;
        $self['lastActiveDate'] = $lastActiveDate;

        return $self;
    }

    public function withMemberSinceDate(string $memberSinceDate): self
    {
        $self = clone $this;
        $self['memberSinceDate'] = $memberSinceDate;

        return $self;
    }

    /**
     * Page number to fetch.
     */
    public function withPageNumber(float $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Number of authors per page.
     */
    public function withPageSize(float $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * @param SortBy|value-of<SortBy> $sortBy
     */
    public function withSortBy(SortBy|string $sortBy): self
    {
        $self = clone $this;
        $self['sortBy'] = $sortBy;

        return $self;
    }

    /**
     * Sort direction.
     *
     * @param SortDirection|value-of<SortDirection> $sortDirection
     */
    public function withSortDirection(SortDirection|string $sortDirection): self
    {
        $self = clone $this;
        $self['sortDirection'] = $sortDirection;

        return $self;
    }
}
