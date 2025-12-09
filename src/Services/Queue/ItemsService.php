<?php

declare(strict_types=1);

namespace ModerationAPI\Services\Queue;

use ModerationAPI\Client;
use ModerationAPI\Core\Contracts\BaseResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\Core\Util;
use ModerationAPI\Queue\Items\ItemListParams;
use ModerationAPI\Queue\Items\ItemListParams\SortDirection;
use ModerationAPI\Queue\Items\ItemListParams\SortField;
use ModerationAPI\Queue\Items\ItemListResponse;
use ModerationAPI\Queue\Items\ItemResolveParams;
use ModerationAPI\Queue\Items\ItemResolveResponse;
use ModerationAPI\Queue\Items\ItemUnresolveParams;
use ModerationAPI\Queue\Items\ItemUnresolveResponse;
use ModerationAPI\RequestOptions;
use ModerationAPI\ServiceContracts\Queue\ItemsContract;

final class ItemsService implements ItemsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get paginated list of items in a moderation queue with filtering options
     *
     * @param array{
     *   afterDate?: string,
     *   authorID?: string,
     *   beforeDate?: string,
     *   conversationIDs?: string,
     *   filteredActionIDs?: string,
     *   includeResolved?: string,
     *   labels?: string,
     *   pageNumber?: float,
     *   pageSize?: float,
     *   sortDirection?: 'asc'|'desc'|SortDirection,
     *   sortField?: 'createdAt'|'severity'|'reviewedAt'|SortField,
     * }|ItemListParams $params
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|ItemListParams $params,
        ?RequestOptions $requestOptions = null,
    ): ItemListResponse {
        [$parsed, $options] = ItemListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ItemListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['queue/%1$s/items', $id],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'authorID' => 'authorId',
                    'conversationIDs' => 'conversationIds',
                    'filteredActionIDs' => 'filteredActionIds',
                ],
            ),
            options: $options,
            convert: ItemListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Mark a queue item as resolved with a specific moderation action
     *
     * @param array{id: string, comment?: string}|ItemResolveParams $params
     *
     * @throws APIException
     */
    public function resolve(
        string $itemID,
        array|ItemResolveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ItemResolveResponse {
        [$parsed, $options] = ItemResolveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        /** @var BaseResponse<ItemResolveResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['queue/%1$s/items/%2$s/resolve', $id, $itemID],
            body: (object) array_diff_key($parsed, ['id']),
            options: $options,
            convert: ItemResolveResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Mark a previously resolved queue item as unresolved/pending
     *
     * @param array{id: string, comment?: string}|ItemUnresolveParams $params
     *
     * @throws APIException
     */
    public function unresolve(
        string $itemID,
        array|ItemUnresolveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ItemUnresolveResponse {
        [$parsed, $options] = ItemUnresolveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        /** @var BaseResponse<ItemUnresolveResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['queue/%1$s/items/%2$s/unresolve', $id, $itemID],
            body: (object) array_diff_key($parsed, ['id']),
            options: $options,
            convert: ItemUnresolveResponse::class,
        );

        return $response->parse();
    }
}
