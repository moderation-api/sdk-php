<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\Items;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Queue\Items\ItemListResponse\Item;
use ModerationAPI\Queue\Items\ItemListResponse\Item\Action;
use ModerationAPI\Queue\Items\ItemListResponse\Item\Label;
use ModerationAPI\Queue\Items\ItemListResponse\Item\Status;
use ModerationAPI\Queue\Items\ItemListResponse\Pagination;

/**
 * @phpstan-type ItemListResponseShape = array{
 *   items: list<Item>, pagination: Pagination
 * }
 */
final class ItemListResponse implements BaseModel
{
    /** @use SdkModel<ItemListResponseShape> */
    use SdkModel;

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
     * @param list<Item|array{
     *   id: string,
     *   content: string,
     *   flagged: bool,
     *   labels: list<Label>,
     *   status: value-of<Status>,
     *   timestamp: float,
     *   actions?: list<Action>|null,
     *   authorId?: string|null,
     *   contentType?: string|null,
     *   conversationId?: string|null,
     *   language?: string|null,
     * }> $items
     * @param Pagination|array{
     *   currentPage: float,
     *   hasNextPage: bool,
     *   hasPreviousPage: bool,
     *   totalItems: float,
     *   totalPages: float,
     * } $pagination
     */
    public static function with(
        array $items,
        Pagination|array $pagination
    ): self {
        $obj = new self;

        $obj['items'] = $items;
        $obj['pagination'] = $pagination;

        return $obj;
    }

    /**
     * @param list<Item|array{
     *   id: string,
     *   content: string,
     *   flagged: bool,
     *   labels: list<Label>,
     *   status: value-of<Status>,
     *   timestamp: float,
     *   actions?: list<Action>|null,
     *   authorId?: string|null,
     *   contentType?: string|null,
     *   conversationId?: string|null,
     *   language?: string|null,
     * }> $items
     */
    public function withItems(array $items): self
    {
        $obj = clone $this;
        $obj['items'] = $items;

        return $obj;
    }

    /**
     * @param Pagination|array{
     *   currentPage: float,
     *   hasNextPage: bool,
     *   hasPreviousPage: bool,
     *   totalItems: float,
     *   totalPages: float,
     * } $pagination
     */
    public function withPagination(Pagination|array $pagination): self
    {
        $obj = clone $this;
        $obj['pagination'] = $pagination;

        return $obj;
    }
}
