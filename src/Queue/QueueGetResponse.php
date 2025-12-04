<?php

declare(strict_types=1);

namespace ModerationAPI\Queue;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkResponse;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Core\Conversion\Contracts\ResponseConverter;
use ModerationAPI\Queue\QueueGetResponse\Queue;

/**
 * @phpstan-type QueueGetResponseShape = array{queue: Queue}
 */
final class QueueGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<QueueGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
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
     */
    public static function with(Queue $queue): self
    {
        $obj = new self;

        $obj->queue = $queue;

        return $obj;
    }

    public function withQueue(Queue $queue): self
    {
        $obj = clone $this;
        $obj->queue = $queue;

        return $obj;
    }
}
