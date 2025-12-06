<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\Items;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkResponse;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type ItemResolveResponseShape = array{
 *   resolvedAt: string, success: bool, comment?: string|null
 * }
 */
final class ItemResolveResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ItemResolveResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * Timestamp when the item was resolved.
     */
    #[Api]
    public string $resolvedAt;

    #[Api]
    public bool $success;

    /**
     * Optional comment.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        $obj['resolvedAt'] = $resolvedAt;
        $obj['success'] = $success;

        null !== $comment && $obj['comment'] = $comment;

        return $obj;
    }

    /**
     * Timestamp when the item was resolved.
     */
    public function withResolvedAt(string $resolvedAt): self
    {
        $obj = clone $this;
        $obj['resolvedAt'] = $resolvedAt;

        return $obj;
    }

    public function withSuccess(bool $success): self
    {
        $obj = clone $this;
        $obj['success'] = $success;

        return $obj;
    }

    /**
     * Optional comment.
     */
    public function withComment(string $comment): self
    {
        $obj = clone $this;
        $obj['comment'] = $comment;

        return $obj;
    }
}
