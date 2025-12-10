<?php

declare(strict_types=1);

namespace ModerationAPI\Authors\AuthorListResponse;

use ModerationAPI\Core\Attributes\Required;
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

    #[Required]
    public bool $hasNextPage;

    #[Required]
    public bool $hasPreviousPage;

    #[Required]
    public float $pageNumber;

    #[Required]
    public float $pageSize;

    #[Required]
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
        $self = new self;

        $self['hasNextPage'] = $hasNextPage;
        $self['hasPreviousPage'] = $hasPreviousPage;
        $self['pageNumber'] = $pageNumber;
        $self['pageSize'] = $pageSize;
        $self['total'] = $total;

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

    public function withPageNumber(float $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    public function withPageSize(float $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    public function withTotal(float $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
