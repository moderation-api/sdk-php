<?php

declare(strict_types=1);

namespace ModerationAPI\ServiceContracts\Queue;

use ModerationAPI\Core\Exceptions\APIException;
use ModerationAPI\Queue\Items\ItemListParams;
use ModerationAPI\Queue\Items\ItemListResponse;
use ModerationAPI\Queue\Items\ItemResolveParams;
use ModerationAPI\Queue\Items\ItemResolveResponse;
use ModerationAPI\Queue\Items\ItemUnresolveParams;
use ModerationAPI\Queue\Items\ItemUnresolveResponse;
use ModerationAPI\RequestOptions;

interface ItemsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ItemListParams $params
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|ItemListParams $params,
        ?RequestOptions $requestOptions = null,
    ): ItemListResponse;

    /**
     * @api
     *
     * @param array<mixed>|ItemResolveParams $params
     *
     * @throws APIException
     */
    public function resolve(
        string $itemID,
        array|ItemResolveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ItemResolveResponse;

    /**
     * @api
     *
     * @param array<mixed>|ItemUnresolveParams $params
     *
     * @throws APIException
     */
    public function unresolve(
        string $itemID,
        array|ItemUnresolveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ItemUnresolveResponse;
}
