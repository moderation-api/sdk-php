<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\QueueGetResponse;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Queue\QueueGetResponse\Queue\Filter;
use ModerationAPI\Queue\QueueGetResponse\Queue\Filter\FilterLabel;
use ModerationAPI\Queue\QueueGetResponse\Queue\Filter\RecommendationAction;

/**
 * @phpstan-type QueueShape = array{
 *   id: string,
 *   description: string,
 *   filter: Filter,
 *   name: string,
 *   resolvedItemsCount: float,
 *   totalItemsCount: float,
 *   unresolvedItemsCount: float,
 * }
 */
final class Queue implements BaseModel
{
    /** @use SdkModel<QueueShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public string $description;

    #[Required]
    public Filter $filter;

    #[Required]
    public string $name;

    #[Required]
    public float $resolvedItemsCount;

    #[Required]
    public float $totalItemsCount;

    #[Required]
    public float $unresolvedItemsCount;

    /**
     * `new Queue()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Queue::with(
     *   id: ...,
     *   description: ...,
     *   filter: ...,
     *   name: ...,
     *   resolvedItemsCount: ...,
     *   totalItemsCount: ...,
     *   unresolvedItemsCount: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Queue)
     *   ->withID(...)
     *   ->withDescription(...)
     *   ->withFilter(...)
     *   ->withName(...)
     *   ->withResolvedItemsCount(...)
     *   ->withTotalItemsCount(...)
     *   ->withUnresolvedItemsCount(...)
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
     * @param Filter|array{
     *   afterDate?: string|null,
     *   authorID?: string|null,
     *   beforeDate?: string|null,
     *   conversationIDs?: list<string|null>|null,
     *   filteredActionIDs?: list<string>|null,
     *   filteredChannelIDs?: list<string>|null,
     *   filterLabels?: list<FilterLabel>|null,
     *   labels?: list<string>|null,
     *   recommendationActions?: list<value-of<RecommendationAction>>|null,
     *   showChecked?: bool|null,
     * } $filter
     */
    public static function with(
        string $id,
        string $description,
        Filter|array $filter,
        string $name,
        float $resolvedItemsCount,
        float $totalItemsCount,
        float $unresolvedItemsCount,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['description'] = $description;
        $self['filter'] = $filter;
        $self['name'] = $name;
        $self['resolvedItemsCount'] = $resolvedItemsCount;
        $self['totalItemsCount'] = $totalItemsCount;
        $self['unresolvedItemsCount'] = $unresolvedItemsCount;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * @param Filter|array{
     *   afterDate?: string|null,
     *   authorID?: string|null,
     *   beforeDate?: string|null,
     *   conversationIDs?: list<string|null>|null,
     *   filteredActionIDs?: list<string>|null,
     *   filteredChannelIDs?: list<string>|null,
     *   filterLabels?: list<FilterLabel>|null,
     *   labels?: list<string>|null,
     *   recommendationActions?: list<value-of<RecommendationAction>>|null,
     *   showChecked?: bool|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withResolvedItemsCount(float $resolvedItemsCount): self
    {
        $self = clone $this;
        $self['resolvedItemsCount'] = $resolvedItemsCount;

        return $self;
    }

    public function withTotalItemsCount(float $totalItemsCount): self
    {
        $self = clone $this;
        $self['totalItemsCount'] = $totalItemsCount;

        return $self;
    }

    public function withUnresolvedItemsCount(float $unresolvedItemsCount): self
    {
        $self = clone $this;
        $self['unresolvedItemsCount'] = $unresolvedItemsCount;

        return $self;
    }
}
