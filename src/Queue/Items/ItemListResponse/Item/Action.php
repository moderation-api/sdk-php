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
        $self = new self;

        $self['id'] = $id;
        $self['name'] = $name;
        $self['timestamp'] = $timestamp;

        null !== $comment && $self['comment'] = $comment;
        null !== $reviewer && $self['reviewer'] = $reviewer;

        return $self;
    }

    /**
     * Action ID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Action name.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Unix timestamp of when the action was taken.
     */
    public function withTimestamp(float $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }

    /**
     * Action comment.
     */
    public function withComment(string $comment): self
    {
        $self = clone $this;
        $self['comment'] = $comment;

        return $self;
    }

    /**
     * Moderator userID.
     */
    public function withReviewer(string $reviewer): self
    {
        $self = clone $this;
        $self['reviewer'] = $reviewer;

        return $self;
    }
}
