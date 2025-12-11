<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\Items;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type ItemUnresolveResponseShape = array{
 *   status: string, success: bool, unresolvedAt: string
 * }
 */
final class ItemUnresolveResponse implements BaseModel
{
    /** @use SdkModel<ItemUnresolveResponseShape> */
    use SdkModel;

    /**
     * New status of the item.
     */
    #[Required]
    public string $status;

    #[Required]
    public bool $success;

    /**
     * Timestamp when the item was unresolved.
     */
    #[Required]
    public string $unresolvedAt;

    /**
     * `new ItemUnresolveResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ItemUnresolveResponse::with(status: ..., success: ..., unresolvedAt: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ItemUnresolveResponse)
     *   ->withStatus(...)
     *   ->withSuccess(...)
     *   ->withUnresolvedAt(...)
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
        string $status,
        bool $success,
        string $unresolvedAt
    ): self {
        $self = new self;

        $self['status'] = $status;
        $self['success'] = $success;
        $self['unresolvedAt'] = $unresolvedAt;

        return $self;
    }

    /**
     * New status of the item.
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withSuccess(bool $success): self
    {
        $self = clone $this;
        $self['success'] = $success;

        return $self;
    }

    /**
     * Timestamp when the item was unresolved.
     */
    public function withUnresolvedAt(string $unresolvedAt): self
    {
        $self = clone $this;
        $self['unresolvedAt'] = $unresolvedAt;

        return $self;
    }
}
