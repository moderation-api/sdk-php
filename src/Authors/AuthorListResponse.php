<?php

declare(strict_types=1);

namespace ModerationAPI\Authors;

use ModerationAPI\Authors\AuthorListResponse\Author;
use ModerationAPI\Authors\AuthorListResponse\Pagination;
use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkResponse;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type AuthorListResponseShape = array{
 *   authors: list<Author>, pagination: Pagination
 * }
 */
final class AuthorListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<AuthorListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<Author> $authors */
    #[Api(list: Author::class)]
    public array $authors;

    #[Api]
    public Pagination $pagination;

    /**
     * `new AuthorListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AuthorListResponse::with(authors: ..., pagination: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AuthorListResponse)->withAuthors(...)->withPagination(...)
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
     * @param list<Author> $authors
     */
    public static function with(array $authors, Pagination $pagination): self
    {
        $obj = new self;

        $obj->authors = $authors;
        $obj->pagination = $pagination;

        return $obj;
    }

    /**
     * @param list<Author> $authors
     */
    public function withAuthors(array $authors): self
    {
        $obj = clone $this;
        $obj->authors = $authors;

        return $obj;
    }

    public function withPagination(Pagination $pagination): self
    {
        $obj = clone $this;
        $obj->pagination = $pagination;

        return $obj;
    }
}
