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
        $self = new self;

        $self['currentPage'] = $currentPage;
        $self['hasNextPage'] = $hasNextPage;
        $self['hasPreviousPage'] = $hasPreviousPage;
        $self['totalItems'] = $totalItems;
        $self['totalPages'] = $totalPages;

        return $self;
    }

    public function withCurrentPage(float $currentPage): self
    {
        $self = clone $this;
        $self['currentPage'] = $currentPage;

        return $self;
    }

    public function withHasNextPage(bool $hasNextPage): self
    {
        $self = clone $this;
        $self['hasNextPage'] = $hasNextPage;

        return $self;
    }

    public function withHasPreviousPage(bool $hasPreviousPage): self
    {
        $self = clone $this;
        $self['hasPreviousPage'] = $hasPreviousPage;

        return $self;
    }

    public function withTotalItems(float $totalItems): self
    {
        $self = clone $this;
        $self['totalItems'] = $totalItems;

        return $self;
    }

    public function withTotalPages(float $totalPages): self
    {
        $self = clone $this;
        $self['totalPages'] = $totalPages;

        return $self;
    }
}
