<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\WebhookEvent\QueueItemAllowedEvent;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Queue\WebhookEvent\QueueItemAllowedEvent\Data\Object_;

/**
 * @phpstan-import-type ObjectShape from \ModerationAPI\Queue\WebhookEvent\QueueItemAllowedEvent\Data\Object_
 *
 * @phpstan-type DataShape = array{object: Object_|ObjectShape}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required]
    public Object_ $object;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(object: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withObject(...)
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
     * @param Object_|ObjectShape $object
     */
    public static function with(Object_|array $object): self
    {
        $self = new self;

        $self['object'] = $object;

        return $self;
    }

    /**
     * @param Object_|ObjectShape $object
     */
    public function withObject(Object_|array $object): self
    {
        $self = clone $this;
        $self['object'] = $object;

        return $self;
    }
}
