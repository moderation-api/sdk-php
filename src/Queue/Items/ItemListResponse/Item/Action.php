<?php

declare(strict_types=1);

namespace ModerationAPI\Queue\Items\ItemListResponse\Item;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type ActionShape = array{
 *   id: string,
 *   name: string,
 *   timestamp: float,
 *   comment?: string|null,
 *   reviewer?: string|null,
 * }
 */
final class Action implements BaseModel
{
    /** @use SdkModel<ActionShape> */
    use SdkModel;

    /**
     * Action ID.
     */
    #[Required]
    public string $id;

    /**
     * Action name.
     */
    #[Required]
    public string $name;

    /**
     * Unix timestamp of when the action was taken.
     */
    #[Required]
    public float $timestamp;

    /**
     * Action comment.
     */
    #[Optional]
    public ?string $comment;

    /**
     * Moderator userID.
     */
    #[Optional]
    public ?string $reviewer;

    /**
     * `new Action()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Action::with(id: ..., name: ..., timestamp: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Action)->withID(...)->withName(...)->withTimestamp(...)
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
        string $id,
        string $name,
        float $timestamp,
        ?string $comment = null,
        ?string $reviewer = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['name'] = $name;
        $obj['timestamp'] = $timestamp;

        null !== $comment && $obj['comment'] = $comment;
        null !== $reviewer && $obj['reviewer'] = $reviewer;

        return $obj;
    }

    /**
     * Action ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Action name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Unix timestamp of when the action was taken.
     */
    public function withTimestamp(float $timestamp): self
    {
        $obj = clone $this;
        $obj['timestamp'] = $timestamp;

        return $obj;
    }

    /**
     * Action comment.
     */
    public function withComment(string $comment): self
    {
        $obj = clone $this;
        $obj['comment'] = $comment;

        return $obj;
    }

    /**
     * Moderator userID.
     */
    public function withReviewer(string $reviewer): self
    {
        $obj = clone $this;
        $obj['reviewer'] = $reviewer;

        return $obj;
    }
}
