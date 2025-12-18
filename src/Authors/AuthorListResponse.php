<?php

declare(strict_types=1);

namespace ModerationAPI\Authors;

use ModerationAPI\Authors\AuthorListResponse\Author;
use ModerationAPI\Authors\AuthorListResponse\Pagination;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AuthorShape from \ModerationAPI\Authors\AuthorListResponse\Author
 * @phpstan-import-type PaginationShape from \ModerationAPI\Authors\AuthorListResponse\Pagination
 *
 * @phpstan-type AuthorListResponseShape = array{
 *   authors: list<AuthorShape>, pagination: Pagination|PaginationShape
 * }
 */
final class AuthorListResponse implements BaseModel
{
    /** @use SdkModel<AuthorListResponseShape> */
    use SdkModel;

    /** @var list<Author> $authors */
    #[Required(list: Author::class)]
    public array $authors;

    #[Required]
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
     * @param list<AuthorShape> $authors
     * @param Pagination|PaginationShape $pagination
     */
    public static function with(
        array $authors,
        Pagination|array $pagination
    ): self {
        $self = new self;

        $self['authors'] = $authors;
        $self['pagination'] = $pagination;

        return $self;
    }

    /**
     * @param list<AuthorShape> $authors
     */
    public function withAuthors(array $authors): self
    {
        $self = clone $this;
        $self['authors'] = $authors;

        return $self;
    }

    /**
     * @param Pagination|PaginationShape $pagination
     */
    public function withPagination(Pagination|array $pagination): self
    {
        $self = clone $this;
        $self['pagination'] = $pagination;

        return $self;
    }
}
