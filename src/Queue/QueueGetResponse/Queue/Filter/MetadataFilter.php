<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\QueueGetResponse\Queue\Filter;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetadataFilterShape = array{key: string, value: string}
 */
final class MetadataFilter implements BaseModel
{
    /** @use SdkModel<MetadataFilterShape> */
    use SdkModel;

    #[Required]
    public string $key;

    #[Required]
    public string $value;

    /**
     * `new MetadataFilter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MetadataFilter::with(key: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MetadataFilter)->withKey(...)->withValue(...)
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
    public static function with(string $key, string $value): self
    {
        $self = new self;

        $self['key'] = $key;
        $self['value'] = $value;

        return $self;
    }

    public function withKey(string $key): self
    {
        $self = clone $this;
        $self['key'] = $key;

        return $self;
    }

    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
