<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\Items;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkResponse;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type ItemUnresolveResponseShape = array{
 *   status: string, success: bool, unresolvedAt: string
 * }
 */
final class ItemUnresolveResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ItemUnresolveResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * New status of the item.
     */
    #[Api]
    public string $status;

    #[Api]
    public bool $success;

    /**
     * Timestamp when the item was unresolved.
     */
    #[Api]
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
        $obj = new self;

        $obj->status = $status;
        $obj->success = $success;
        $obj->unresolvedAt = $unresolvedAt;

        return $obj;
    }

    /**
     * New status of the item.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    public function withSuccess(bool $success): self
    {
        $obj = clone $this;
        $obj->success = $success;

        return $obj;
    }

    /**
     * Timestamp when the item was unresolved.
     */
    public function withUnresolvedAt(string $unresolvedAt): self
    {
        $obj = clone $this;
        $obj->unresolvedAt = $unresolvedAt;

        return $obj;
    }
}
