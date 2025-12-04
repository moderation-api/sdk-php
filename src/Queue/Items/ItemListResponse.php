<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\Items;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkResponse;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Core\Conversion\Contracts\ResponseConverter;
use ModerationAPI\Queue\Items\ItemListResponse\Item;
use ModerationAPI\Queue\Items\ItemListResponse\Pagination;

/**
 * @phpstan-type ItemListResponseShape = array{
 *   items: list<Item>, pagination: Pagination
 * }
 */
final class ItemListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ItemListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<Item> $items */
    #[Api(list: Item::class)]
    public array $items;

    #[Api]
    public Pagination $pagination;

    /**
     * `new ItemListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ItemListResponse::with(items: ..., pagination: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ItemListResponse)->withItems(...)->withPagination(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Item> $items
     */
    public static function with(array $items, Pagination $pagination): self
    {
        $obj = new self;

        $obj->items = $items;
        $obj->pagination = $pagination;

        return $obj;
    }

    /**
     * @param list<Item> $items
     */
    public function withItems(array $items): self
    {
        $obj = clone $this;
        $obj->items = $items;

        return $obj;
    }

    public function withPagination(Pagination $pagination): self
    {
        $obj = clone $this;
        $obj->pagination = $pagination;

        return $obj;
    }
}
