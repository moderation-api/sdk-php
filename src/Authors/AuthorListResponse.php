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
     *   firstSeen: float,
     *   lastSeen: float,
     *   metadata: Metadata,
     *   metrics: Metrics,
     *   riskEvaluation: RiskEvaluation|null,
     *   status: value-of<Status>,
     *   trustLevel: TrustLevel,
     *   email?: string|null,
     *   externalID?: string|null,
     *   externalLink?: string|null,
     *   lastIncident?: float|null,
     *   name?: string|null,
     *   profilePicture?: string|null,
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
        $self = new self;

        $self['authors'] = $authors;
        $self['pagination'] = $pagination;

        return $self;
    }

    /**
     * @param list<Author|array{
     *   id: string,
     *   block: Block|null,
     *   firstSeen: float,
     *   lastSeen: float,
     *   metadata: Metadata,
     *   metrics: Metrics,
     *   riskEvaluation: RiskEvaluation|null,
     *   status: value-of<Status>,
     *   trustLevel: TrustLevel,
     *   email?: string|null,
     *   externalID?: string|null,
     *   externalLink?: string|null,
     *   lastIncident?: float|null,
     *   name?: string|null,
     *   profilePicture?: string|null,
     * }> $authors
     */
    public function withAuthors(array $authors): self
    {
        $self = clone $this;
        $self['authors'] = $authors;

        return $self;
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
        $self = clone $this;
        $self['pagination'] = $pagination;

        return $self;
    }
}
