<?php

declare(strict_types=1);

namespace ModerationAPI\Queue;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Queue\QueueGetResponse\Queue;
use ModerationAPI\Queue\QueueGetResponse\Queue\Filter;

/**
 * @phpstan-type QueueGetResponseShape = array{queue: Queue}
 */
final class QueueGetResponse implements BaseModel
{
    /** @use SdkModel<QueueGetResponseShape> */
    use SdkModel;

    #[Required]
    public Queue $queue;

    /**
     * `new QueueGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * QueueGetResponse::with(queue: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new QueueGetResponse)->withQueue(...)
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
     * @param Queue|array{
     *   id: string,
     *   description: string,
     *   filter: Filter,
     *   name: string,
     *   resolvedItemsCount: float,
     *   totalItemsCount: float,
     *   unresolvedItemsCount: float,
     * } $queue
     */
    public static function with(Queue|array $queue): self
    {
        $self = new self;

        $self['queue'] = $queue;

        return $self;
    }

    /**
     * @param Queue|array{
     *   id: string,
     *   description: string,
     *   filter: Filter,
     *   name: string,
     *   resolvedItemsCount: float,
     *   totalItemsCount: float,
     *   unresolvedItemsCount: float,
     * } $queue
     */
    public function withQueue(Queue|array $queue): self
    {
        $self = clone $this;
        $self['queue'] = $queue;

        return $self;
    }
}
