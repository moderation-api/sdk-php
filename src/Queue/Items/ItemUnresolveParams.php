<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\Items;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkParams;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Mark a previously resolved queue item as unresolved/pending.
 *
 * @see ModerationAPI\Services\Queue\ItemsService::unresolve()
 *
 * @phpstan-type ItemUnresolveParamsShape = array{id: string, comment?: string}
 */
final class ItemUnresolveParams implements BaseModel
{
    /** @use SdkModel<ItemUnresolveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The queue ID.
     */
    #[Api]
    public string $id;

    /**
     * Optional reason for unresolving the item.
     */
    #[Api(optional: true)]
    public ?string $comment;

    /**
     * `new ItemUnresolveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ItemUnresolveParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ItemUnresolveParams)->withID(...)
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
    public static function with(string $id, ?string $comment = null): self
    {
        $obj = new self;

        $obj->id = $id;

        null !== $comment && $obj->comment = $comment;

        return $obj;
    }

    /**
     * The queue ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Optional reason for unresolving the item.
     */
    public function withComment(string $comment): self
    {
        $obj = clone $this;
        $obj->comment = $comment;

        return $obj;
    }
}
