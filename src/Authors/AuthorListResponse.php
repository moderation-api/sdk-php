<?php

declare(strict_types=1);

namespace ModerationAPI\Authors;

use ModerationAPI\Authors\AuthorListResponse\Author;
use ModerationAPI\Authors\AuthorListResponse\Author\Block;
use ModerationAPI\Authors\AuthorListResponse\Author\Metadata;
use ModerationAPI\Authors\AuthorListResponse\Author\Metrics;
use ModerationAPI\Authors\AuthorListResponse\Author\RiskEvaluation;
use ModerationAPI\Authors\AuthorListResponse\Author\Status;
use ModerationAPI\Authors\AuthorListResponse\Author\TrustLevel;
use ModerationAPI\Authors\AuthorListResponse\Pagination;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type AuthorListResponseShape = array{
 *   authors: list<Author>, pagination: Pagination
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
     * @param list<Author|array{
     *   id: string,
     *   block: Block|null,
     *   first_seen: float,
     *   last_seen: float,
     *   metadata: Metadata,
     *   metrics: Metrics,
     *   risk_evaluation: RiskEvaluation|null,
     *   status: value-of<Status>,
     *   trust_level: TrustLevel,
     *   email?: string|null,
     *   external_id?: string|null,
     *   external_link?: string|null,
     *   last_incident?: float|null,
     *   name?: string|null,
     *   profile_picture?: string|null,
     * }> $authors
     * @param Pagination|array{
     *   hasNextPage: bool,
     *   hasPreviousPage: bool,
     *   pageNumber: float,
     *   pageSize: float,
     *   total: float,
     * } $pagination
     */
    public static function with(
        array $authors,
        Pagination|array $pagination
    ): self {
        $obj = new self;

        $obj['authors'] = $authors;
        $obj['pagination'] = $pagination;

        return $obj;
    }

    /**
     * @param list<Author|array{
     *   id: string,
     *   block: Block|null,
     *   first_seen: float,
     *   last_seen: float,
     *   metadata: Metadata,
     *   metrics: Metrics,
     *   risk_evaluation: RiskEvaluation|null,
     *   status: value-of<Status>,
     *   trust_level: TrustLevel,
     *   email?: string|null,
     *   external_id?: string|null,
     *   external_link?: string|null,
     *   last_incident?: float|null,
     *   name?: string|null,
     *   profile_picture?: string|null,
     * }> $authors
     */
    public function withAuthors(array $authors): self
    {
        $obj = clone $this;
        $obj['authors'] = $authors;

        return $obj;
    }

    /**
     * @param Pagination|array{
     *   hasNextPage: bool,
     *   hasPreviousPage: bool,
     *   pageNumber: float,
     *   pageSize: float,
     *   total: float,
     * } $pagination
     */
    public function withPagination(Pagination|array $pagination): self
    {
        $obj = clone $this;
        $obj['pagination'] = $pagination;

        return $obj;
    }
}
