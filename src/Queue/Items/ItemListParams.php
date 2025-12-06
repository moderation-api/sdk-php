<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\Items;

use ModerationAPI\Core\Attributes\Api;
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
 *   afterDate?: string,
 *   authorId?: string,
 *   beforeDate?: string,
 *   conversationIds?: string,
 *   filteredActionIds?: string,
 *   includeResolved?: string,
 *   labels?: string,
 *   pageNumber?: float,
 *   pageSize?: float,
 *   sortDirection?: SortDirection|value-of<SortDirection>,
 *   sortField?: SortField|value-of<SortField>,
 * }
 */
final class ItemListParams implements BaseModel
{
    /** @use SdkModel<ItemListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?string $afterDate;

    #[Api(optional: true)]
    public ?string $authorId;

    #[Api(optional: true)]
    public ?string $beforeDate;

    #[Api(optional: true)]
    public ?string $conversationIds;

    #[Api(optional: true)]
    public ?string $filteredActionIds;

    #[Api(optional: true)]
    public ?string $includeResolved;

    #[Api(optional: true)]
    public ?string $labels;

    /**
     * Page number to fetch.
     */
    #[Api(optional: true)]
    public ?float $pageNumber;

    /**
     * Number of items per page.
     */
    #[Api(optional: true)]
    public ?float $pageSize;

    /**
     * Sort direction.
     *
     * @var value-of<SortDirection>|null $sortDirection
     */
    #[Api(enum: SortDirection::class, optional: true)]
    public ?string $sortDirection;

    /** @var value-of<SortField>|null $sortField */
    #[Api(enum: SortField::class, optional: true)]
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
     * @param SortDirection|value-of<SortDirection> $sortDirection
     * @param SortField|value-of<SortField> $sortField
     */
    public static function with(
        ?string $afterDate = null,
        ?string $authorId = null,
        ?string $beforeDate = null,
        ?string $conversationIds = null,
        ?string $filteredActionIds = null,
        ?string $includeResolved = null,
        ?string $labels = null,
        ?float $pageNumber = null,
        ?float $pageSize = null,
        SortDirection|string|null $sortDirection = null,
        SortField|string|null $sortField = null,
    ): self {
        $obj = new self;

        null !== $afterDate && $obj['afterDate'] = $afterDate;
        null !== $authorId && $obj['authorId'] = $authorId;
        null !== $beforeDate && $obj['beforeDate'] = $beforeDate;
        null !== $conversationIds && $obj['conversationIds'] = $conversationIds;
        null !== $filteredActionIds && $obj['filteredActionIds'] = $filteredActionIds;
        null !== $includeResolved && $obj['includeResolved'] = $includeResolved;
        null !== $labels && $obj['labels'] = $labels;
        null !== $pageNumber && $obj['pageNumber'] = $pageNumber;
        null !== $pageSize && $obj['pageSize'] = $pageSize;
        null !== $sortDirection && $obj['sortDirection'] = $sortDirection;
        null !== $sortField && $obj['sortField'] = $sortField;

        return $obj;
    }

    public function withAfterDate(string $afterDate): self
    {
        $obj = clone $this;
        $obj['afterDate'] = $afterDate;

        return $obj;
    }

    public function withAuthorID(string $authorID): self
    {
        $obj = clone $this;
        $obj['authorId'] = $authorID;

        return $obj;
    }

    public function withBeforeDate(string $beforeDate): self
    {
        $obj = clone $this;
        $obj['beforeDate'] = $beforeDate;

        return $obj;
    }

    public function withConversationIDs(string $conversationIDs): self
    {
        $obj = clone $this;
        $obj['conversationIds'] = $conversationIDs;

        return $obj;
    }

    public function withFilteredActionIDs(string $filteredActionIDs): self
    {
        $obj = clone $this;
        $obj['filteredActionIds'] = $filteredActionIDs;

        return $obj;
    }

    public function withIncludeResolved(string $includeResolved): self
    {
        $obj = clone $this;
        $obj['includeResolved'] = $includeResolved;

        return $obj;
    }

    public function withLabels(string $labels): self
    {
        $obj = clone $this;
        $obj['labels'] = $labels;

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
     * Number of items per page.
     */
    public function withPageSize(float $pageSize): self
    {
        $obj = clone $this;
        $obj['pageSize'] = $pageSize;

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

    /**
     * @param SortField|value-of<SortField> $sortField
     */
    public function withSortField(SortField|string $sortField): self
    {
        $obj = clone $this;
        $obj['sortField'] = $sortField;

        return $obj;
    }
}
