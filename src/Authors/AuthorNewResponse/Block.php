<?php

declare(strict_types=1);

namespace ModerationAPI\Authors\AuthorNewResponse;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Block or suspension details, if applicable. Null if the author is enabled.
 *
 * @phpstan-type BlockShape = array{reason?: string|null, until?: float|null}
 */
final class Block implements BaseModel
{
    /** @use SdkModel<BlockShape> */
    use SdkModel;

    /**
     * The moderators reason why the author was blocked or suspended.
     */
    #[Optional(nullable: true)]
    public ?string $reason;

    /**
     * The timestamp until which they are blocked if the author is suspended.
     */
    #[Optional(nullable: true)]
    public ?float $until;

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
        ?string $reason = null,
        ?float $until = null
    ): self {
        $self = new self;

        null !== $reason && $self['reason'] = $reason;
        null !== $until && $self['until'] = $until;

        return $self;
    }

    /**
     * The moderators reason why the author was blocked or suspended.
     */
    public function withReason(?string $reason): self
    {
        $self = clone $this;
        $self['reason'] = $reason;

        return $self;
    }

    /**
     * The timestamp until which they are blocked if the author is suspended.
     */
    public function withUntil(?float $until): self
    {
        $self = clone $this;
        $self['until'] = $until;

        return $self;
    }
}
