<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\WebhookEvent\QueueItemRejectedEvent\Data\Object_;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * The queue the item belongs to, if any.
 *
 * @phpstan-type QueueShape = array{id: string}
 */
final class Queue implements BaseModel
{
    /** @use SdkModel<QueueShape> */
    use SdkModel;

    #[Required]
    public string $id;

    /**
     * `new Queue()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Queue::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Queue)->withID(...)
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
    public static function with(string $id): self
    {
        $self = new self;

        $self['id'] = $id;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }
}
