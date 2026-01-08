<?php

declare(strict_types=1);

namespace ModerationAPI\ServiceContracts\Queue;

use ModerationAPI\Core\Contracts\BaseResponse;
use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\Queue\Items\ItemListParams;
use ModerationAPI\Queue\Items\ItemListResponse;
use ModerationAPI\Queue\Items\ItemResolveParams;
use ModerationAPI\Queue\Items\ItemResolveResponse;
use ModerationAPI\Queue\Items\ItemUnresolveParams;
use ModerationAPI\Queue\Items\ItemUnresolveResponse;
use ModerationAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \ModerationAPI\RequestOptions
 */
interface ItemsRawContract
{
    /**
     * @api
     *
     * @param string $id The queue ID
     * @param array<string,mixed>|ItemListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ItemListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|ItemListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $itemID Path param: The item ID to resolve
     * @param array<string,mixed>|ItemResolveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ItemResolveResponse>
     *
     * @throws APIException
     */
    public function resolve(
        string $itemID,
        array|ItemResolveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $itemID Path param: The item ID to unresolve
     * @param array<string,mixed>|ItemUnresolveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ItemUnresolveResponse>
     *
     * @throws APIException
     */
    public function unresolve(
        string $itemID,
        array|ItemUnresolveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
