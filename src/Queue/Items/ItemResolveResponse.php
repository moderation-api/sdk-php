<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\Items;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type ItemResolveResponseShape = array{
 *   resolvedAt: string, success: bool, comment?: string|null
 * }
 */
final class ItemResolveResponse implements BaseModel
{
    /** @use SdkModel<ItemResolveResponseShape> */
    use SdkModel;

    /**
     * Timestamp when the item was resolved.
     */
    #[Required]
    public string $resolvedAt;

    #[Required]
    public bool $success;

    /**
     * Optional comment.
     */
    #[Optional]
    public ?string $comment;

    /**
     * `new ItemResolveResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ItemResolveResponse::with(resolvedAt: ..., success: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ItemResolveResponse)->withResolvedAt(...)->withSuccess(...)
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
        string $resolvedAt,
        bool $success,
        ?string $comment = null
    ): self {
        $self = new self;

        $self['resolvedAt'] = $resolvedAt;
        $self['success'] = $success;

        null !== $comment && $self['comment'] = $comment;

        return $self;
    }

    /**
     * Timestamp when the item was resolved.
     */
    public function withResolvedAt(string $resolvedAt): self
    {
        $self = clone $this;
        $self['resolvedAt'] = $resolvedAt;

        return $self;
    }

    public function withSuccess(bool $success): self
    {
        $self = clone $this;
        $self['success'] = $success;

        return $self;
    }

    /**
     * Optional comment.
     */
    public function withComment(string $comment): self
    {
        $self = clone $this;
        $self['comment'] = $comment;

        return $self;
    }
}
