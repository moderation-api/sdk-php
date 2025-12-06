<?php

declare(strict_types=1);

namespace ModerationAPI\Authors\AuthorListResponse;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type PaginationShape = array{
 *   hasNextPage: bool,
 *   hasPreviousPage: bool,
 *   pageNumber: float,
 *   pageSize: float,
 *   total: float,
 * }
 */
final class Pagination implements BaseModel
{
    /** @use SdkModel<PaginationShape> */
    use SdkModel;

    #[Api]
    public bool $hasNextPage;

    #[Api]
    public bool $hasPreviousPage;

    #[Api]
    public float $pageNumber;

    #[Api]
    public float $pageSize;

    #[Api]
    public float $total;

    /**
     * `new Pagination()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Pagination::with(
     *   hasNextPage: ...,
     *   hasPreviousPage: ...,
     *   pageNumber: ...,
     *   pageSize: ...,
     *   total: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Pagination)
     *   ->withHasNextPage(...)
     *   ->withHasPreviousPage(...)
     *   ->withPageNumber(...)
     *   ->withPageSize(...)
     *   ->withTotal(...)
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
        bool $hasNextPage,
        bool $hasPreviousPage,
        float $pageNumber,
        float $pageSize,
        float $total,
    ): self {
        $obj = new self;

        $obj['hasNextPage'] = $hasNextPage;
        $obj['hasPreviousPage'] = $hasPreviousPage;
        $obj['pageNumber'] = $pageNumber;
        $obj['pageSize'] = $pageSize;
        $obj['total'] = $total;

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

    public function withPageNumber(float $pageNumber): self
    {
        $obj = clone $this;
        $obj['pageNumber'] = $pageNumber;

        return $obj;
    }

    public function withPageSize(float $pageSize): self
    {
        $obj = clone $this;
        $obj['pageSize'] = $pageSize;

        return $obj;
    }

    public function withTotal(float $total): self
    {
        $obj = clone $this;
        $obj['total'] = $total;

        return $obj;
    }
}
