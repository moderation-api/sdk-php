<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\Items;

use ModerationAPI\Core\Attributes\Required;
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
    #[Required(list: Item::class)]
    public array $items;

    #[Required]
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
     *   authorID?: string|null,
     *   contentType?: string|null,
     *   conversationID?: string|null,
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
        $self = new self;

        $self['items'] = $items;
        $self['pagination'] = $pagination;

        return $self;
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
     *   authorID?: string|null,
     *   contentType?: string|null,
     *   conversationID?: string|null,
     *   language?: string|null,
     * }> $items
     */
    public function withItems(array $items): self
    {
        $self = clone $this;
        $self['items'] = $items;

        return $self;
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
        $self = clone $this;
        $self['pagination'] = $pagination;

        return $self;
    }
}
