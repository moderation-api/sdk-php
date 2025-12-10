<?php

declare(strict_types=1);

namespace ModerationAPI\ServiceContracts\Queue;

use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\Queue\Items\ItemListParams\SortDirection;
use ModerationAPI\Queue\Items\ItemListParams\SortField;
use ModerationAPI\Queue\Items\ItemListResponse;
use ModerationAPI\Queue\Items\ItemResolveResponse;
use ModerationAPI\Queue\Items\ItemUnresolveResponse;
use ModerationAPI\RequestOptions;

interface ItemsContract
{
    /**
     * @api
     *
     * @param string $id The queue ID
     * @param float $pageNumber Page number to fetch
     * @param float $pageSize Number of items per page
     * @param 'asc'|'desc'|SortDirection $sortDirection Sort direction
     * @param 'createdAt'|'severity'|'reviewedAt'|SortField $sortField
     *
     * @throws APIException
     */
    public function list(
        string $id,
        ?string $afterDate = null,
        ?string $authorID = null,
        ?string $beforeDate = null,
        ?string $conversationIDs = null,
        ?string $filteredActionIDs = null,
        ?string $includeResolved = null,
        ?string $labels = null,
        float $pageNumber = 1,
        float $pageSize = 20,
        string|SortDirection $sortDirection = 'desc',
        string|SortField|null $sortField = null,
        ?RequestOptions $requestOptions = null,
    ): ItemListResponse;

    /**
     * @api
     *
     * @param string $itemID Path param: The item ID to resolve
     * @param string $id Path param: The queue ID
     * @param string $comment Body param: Optional comment
     *
     * @throws APIException
     */
    public function resolve(
        string $itemID,
        string $id,
        ?string $comment = null,
        ?RequestOptions $requestOptions = null,
    ): ItemResolveResponse;

    /**
     * @api
     *
     * @param string $itemID Path param: The item ID to unresolve
     * @param string $id Path param: The queue ID
     * @param string $comment Body param: Optional reason for unresolving the item
     *
     * @throws APIException
     */
    public function unresolve(
        string $itemID,
        string $id,
        ?string $comment = null,
        ?RequestOptions $requestOptions = null,
    ): ItemUnresolveResponse;
}
