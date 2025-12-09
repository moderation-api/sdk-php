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
     *   conversationIds?: list<string|null>|null,
     *   filteredActionIds?: list<string>|null,
     *   filteredChannelIds?: list<string>|null,
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
        $obj = new self;

        $obj['id'] = $id;
        $obj['description'] = $description;
        $obj['filter'] = $filter;
        $obj['name'] = $name;
        $obj['resolvedItemsCount'] = $resolvedItemsCount;
        $obj['totalItemsCount'] = $totalItemsCount;
        $obj['unresolvedItemsCount'] = $unresolvedItemsCount;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    /**
     * @param Filter|array{
     *   afterDate?: string|null,
     *   authorID?: string|null,
     *   beforeDate?: string|null,
     *   conversationIds?: list<string|null>|null,
     *   filteredActionIds?: list<string>|null,
     *   filteredChannelIds?: list<string>|null,
     *   filterLabels?: list<FilterLabel>|null,
     *   labels?: list<string>|null,
     *   recommendationActions?: list<value-of<RecommendationAction>>|null,
     *   showChecked?: bool|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withResolvedItemsCount(float $resolvedItemsCount): self
    {
        $obj = clone $this;
        $obj['resolvedItemsCount'] = $resolvedItemsCount;

        return $obj;
    }

    public function withTotalItemsCount(float $totalItemsCount): self
    {
        $obj = clone $this;
        $obj['totalItemsCount'] = $totalItemsCount;

        return $obj;
    }

    public function withUnresolvedItemsCount(float $unresolvedItemsCount): self
    {
        $obj = clone $this;
        $obj['unresolvedItemsCount'] = $unresolvedItemsCount;

        return $obj;
    }
}
