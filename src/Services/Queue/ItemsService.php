<?php

declare(strict_types=1);

namespace ModerationAPI\Services\Queue;

use ModerationAPI\Client;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\Queue\Items\ItemListParams\SortDirection;
use ModerationAPI\Queue\Items\ItemListParams\SortField;
use ModerationAPI\Queue\Items\ItemListResponse;
use ModerationAPI\Queue\Items\ItemResolveResponse;
use ModerationAPI\Queue\Items\ItemUnresolveResponse;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\Queue\ItemsContract;

final class ItemsService implements ItemsContract
{
    /**
     * @api
     */
    public ItemsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ItemsRawService($client);
    }

    /**
     * @api
     *
     * Get paginated list of items in a moderation queue with filtering options
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
    ): ItemListResponse {
        $params = [
            'afterDate' => $afterDate,
            'authorID' => $authorID,
            'beforeDate' => $beforeDate,
            'conversationIDs' => $conversationIDs,
            'filteredActionIDs' => $filteredActionIDs,
            'includeResolved' => $includeResolved,
            'labels' => $labels,
            'pageNumber' => $pageNumber,
            'pageSize' => $pageSize,
            'sortDirection' => $sortDirection,
            'sortField' => $sortField,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Mark a queue item as resolved with a specific moderation action
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
    ): ItemResolveResponse {
        $params = ['id' => $id, 'comment' => $comment];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->resolve($itemID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Mark a previously resolved queue item as unresolved/pending
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
    ): ItemUnresolveResponse {
        $params = ['id' => $id, 'comment' => $comment];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->unresolve($itemID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
