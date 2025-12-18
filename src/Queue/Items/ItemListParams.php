<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\Items;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkParams;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Queue\Items\ItemListParams\SortDirection;
use ModerationAPI\Queue\Items\ItemListParams\SortField;

/**
 * Get paginated list of items in a moderation queue with filtering options.
 *
 * @see ModerationAPI\Services\Queue\ItemsService::list()
 *
 * @phpstan-type ItemListParamsShape = array{
 *   afterDate?: string|null,
 *   authorID?: string|null,
 *   beforeDate?: string|null,
 *   conversationIDs?: string|null,
 *   filteredActionIDs?: string|null,
 *   includeResolved?: string|null,
 *   labels?: string|null,
 *   pageNumber?: float|null,
 *   pageSize?: float|null,
 *   sortDirection?: null|SortDirection|value-of<SortDirection>,
 *   sortField?: null|SortField|value-of<SortField>,
 * }
 */
final class ItemListParams implements BaseModel
{
    /** @use SdkModel<ItemListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $afterDate;

    #[Optional]
    public ?string $authorID;

    #[Optional]
    public ?string $beforeDate;

    #[Optional]
    public ?string $conversationIDs;

    #[Optional]
    public ?string $filteredActionIDs;

    #[Optional]
    public ?string $includeResolved;

    #[Optional]
    public ?string $labels;

    /**
     * Page number to fetch.
     */
    #[Optional]
    public ?float $pageNumber;

    /**
     * Number of items per page.
     */
    #[Optional]
    public ?float $pageSize;

    /**
     * Sort direction.
     *
     * @var value-of<SortDirection>|null $sortDirection
     */
    #[Optional(enum: SortDirection::class)]
    public ?string $sortDirection;

    /** @var value-of<SortField>|null $sortField */
    #[Optional(enum: SortField::class)]
    public ?string $sortField;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SortDirection|value-of<SortDirection>|null $sortDirection
     * @param SortField|value-of<SortField>|null $sortField
     */
    public static function with(
        ?string $afterDate = null,
        ?string $authorID = null,
        ?string $beforeDate = null,
        ?string $conversationIDs = null,
        ?string $filteredActionIDs = null,
        ?string $includeResolved = null,
        ?string $labels = null,
        ?float $pageNumber = null,
        ?float $pageSize = null,
        SortDirection|string|null $sortDirection = null,
        SortField|string|null $sortField = null,
    ): self {
        $self = new self;

        null !== $afterDate && $self['afterDate'] = $afterDate;
        null !== $authorID && $self['authorID'] = $authorID;
        null !== $beforeDate && $self['beforeDate'] = $beforeDate;
        null !== $conversationIDs && $self['conversationIDs'] = $conversationIDs;
        null !== $filteredActionIDs && $self['filteredActionIDs'] = $filteredActionIDs;
        null !== $includeResolved && $self['includeResolved'] = $includeResolved;
        null !== $labels && $self['labels'] = $labels;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $sortDirection && $self['sortDirection'] = $sortDirection;
        null !== $sortField && $self['sortField'] = $sortField;

        return $self;
    }

    public function withAfterDate(string $afterDate): self
    {
        $self = clone $this;
        $self['afterDate'] = $afterDate;

        return $self;
    }

    public function withAuthorID(string $authorID): self
    {
        $self = clone $this;
        $self['authorID'] = $authorID;

        return $self;
    }

    public function withBeforeDate(string $beforeDate): self
    {
        $self = clone $this;
        $self['beforeDate'] = $beforeDate;

        return $self;
    }

    public function withConversationIDs(string $conversationIDs): self
    {
        $self = clone $this;
        $self['conversationIDs'] = $conversationIDs;

        return $self;
    }

    public function withFilteredActionIDs(string $filteredActionIDs): self
    {
        $self = clone $this;
        $self['filteredActionIDs'] = $filteredActionIDs;

        return $self;
    }

    public function withIncludeResolved(string $includeResolved): self
    {
        $self = clone $this;
        $self['includeResolved'] = $includeResolved;

        return $self;
    }

    public function withLabels(string $labels): self
    {
        $self = clone $this;
        $self['labels'] = $labels;

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
     * Number of items per page.
     */
    public function withPageSize(float $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

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

    /**
     * @param SortField|value-of<SortField> $sortField
     */
    public function withSortField(SortField|string $sortField): self
    {
        $self = clone $this;
        $self['sortField'] = $sortField;

        return $self;
    }
}
