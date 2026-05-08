<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\WebhookEvent\QueueItemCompletedEvent\Data\Object_\Item\Label\Match_\Signals;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type BrandImpersonationShape = array{brand: string, method: string}
 */
final class BrandImpersonation implements BaseModel
{
    /** @use SdkModel<BrandImpersonationShape> */
    use SdkModel;

    #[Required]
    public string $brand;

    #[Required]
    public string $method;

    /**
     * `new BrandImpersonation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BrandImpersonation::with(brand: ..., method: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BrandImpersonation)->withBrand(...)->withMethod(...)
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
    public static function with(string $brand, string $method): self
    {
        $self = new self;

        $self['brand'] = $brand;
        $self['method'] = $method;

        return $self;
    }

    public function withBrand(string $brand): self
    {
        $self = clone $this;
        $self['brand'] = $brand;

        return $self;
    }

    public function withMethod(string $method): self
    {
        $self = clone $this;
        $self['method'] = $method;

        return $self;
    }
}
