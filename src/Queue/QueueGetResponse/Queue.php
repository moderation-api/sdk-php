<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\QueueGetResponse;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Queue\QueueGetResponse\Queue\Filter;

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

    #[Api]
    public string $id;

    #[Api]
    public string $description;

    #[Api]
    public Filter $filter;

    #[Api]
    public string $name;

    #[Api]
    public float $resolvedItemsCount;

    #[Api]
    public float $totalItemsCount;

    #[Api]
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
     */
    public static function with(
        string $id,
        string $description,
        Filter $filter,
        string $name,
        float $resolvedItemsCount,
        float $totalItemsCount,
        float $unresolvedItemsCount,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->description = $description;
        $obj->filter = $filter;
        $obj->name = $name;
        $obj->resolvedItemsCount = $resolvedItemsCount;
        $obj->totalItemsCount = $totalItemsCount;
        $obj->unresolvedItemsCount = $unresolvedItemsCount;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withResolvedItemsCount(float $resolvedItemsCount): self
    {
        $obj = clone $this;
        $obj->resolvedItemsCount = $resolvedItemsCount;

        return $obj;
    }

    public function withTotalItemsCount(float $totalItemsCount): self
    {
        $obj = clone $this;
        $obj->totalItemsCount = $totalItemsCount;

        return $obj;
    }

    public function withUnresolvedItemsCount(float $unresolvedItemsCount): self
    {
        $obj = clone $this;
        $obj->unresolvedItemsCount = $unresolvedItemsCount;

        return $obj;
    }
}
