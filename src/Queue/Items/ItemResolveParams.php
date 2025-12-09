<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\Items;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkParams;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Mark a queue item as resolved with a specific moderation action.
 *
 * @see ModerationAPI\Services\Queue\ItemsService::resolve()
 *
 * @phpstan-type ItemResolveParamsShape = array{id: string, comment?: string}
 */
final class ItemResolveParams implements BaseModel
{
    /** @use SdkModel<ItemResolveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The queue ID.
     */
    #[Required]
    public string $id;

    /**
     * Optional comment.
     */
    #[Optional]
    public ?string $comment;

    /**
     * `new ItemResolveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ItemResolveParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ItemResolveParams)->withID(...)
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

        $obj['id'] = $id;

        null !== $comment && $obj['comment'] = $comment;

        return $obj;
    }

    /**
     * The queue ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

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
