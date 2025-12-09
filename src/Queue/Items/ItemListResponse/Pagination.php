<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\Items\ItemListResponse;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type PaginationShape = array{
 *   currentPage: float,
 *   hasNextPage: bool,
 *   hasPreviousPage: bool,
 *   totalItems: float,
 *   totalPages: float,
 * }
 */
final class Pagination implements BaseModel
{
    /** @use SdkModel<PaginationShape> */
    use SdkModel;

    #[Required]
    public float $currentPage;

    #[Required]
    public bool $hasNextPage;

    #[Required]
    public bool $hasPreviousPage;

    #[Required]
    public float $totalItems;

    #[Required]
    public float $totalPages;

    /**
     * `new Pagination()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Pagination::with(
     *   currentPage: ...,
     *   hasNextPage: ...,
     *   hasPreviousPage: ...,
     *   totalItems: ...,
     *   totalPages: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Pagination)
     *   ->withCurrentPage(...)
     *   ->withHasNextPage(...)
     *   ->withHasPreviousPage(...)
     *   ->withTotalItems(...)
     *   ->withTotalPages(...)
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
     */
    public static function with(
        float $currentPage,
        bool $hasNextPage,
        bool $hasPreviousPage,
        float $totalItems,
        float $totalPages,
    ): self {
        $obj = new self;

        $obj['currentPage'] = $currentPage;
        $obj['hasNextPage'] = $hasNextPage;
        $obj['hasPreviousPage'] = $hasPreviousPage;
        $obj['totalItems'] = $totalItems;
        $obj['totalPages'] = $totalPages;

        return $obj;
    }

    public function withCurrentPage(float $currentPage): self
    {
        $obj = clone $this;
        $obj['currentPage'] = $currentPage;

        return $obj;
    }

    public function withHasNextPage(bool $hasNextPage): self
    {
        $obj = clone $this;
        $obj['hasNextPage'] = $hasNextPage;

        return $obj;
    }

    public function withHasPreviousPage(bool $hasPreviousPage): self
    {
        $obj = clone $this;
        $obj['hasPreviousPage'] = $hasPreviousPage;

        return $obj;
    }

    public function withTotalItems(float $totalItems): self
    {
        $obj = clone $this;
        $obj['totalItems'] = $totalItems;

        return $obj;
    }

    public function withTotalPages(float $totalPages): self
    {
        $obj = clone $this;
        $obj['totalPages'] = $totalPages;

        return $obj;
    }
}
