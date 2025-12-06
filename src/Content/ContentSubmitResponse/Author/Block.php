<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse\Author;

use ModerationAPI\Core\Attributes\Api;
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
    #[Api(nullable: true, optional: true)]
    public ?string $reason;

    /**
     * The timestamp until which they are blocked if the author is suspended.
     */
    #[Api(nullable: true, optional: true)]
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
        $obj = new self;

        null !== $reason && $obj['reason'] = $reason;
        null !== $until && $obj['until'] = $until;

        return $obj;
    }

    /**
     * The moderators reason why the author was blocked or suspended.
     */
    public function withReason(?string $reason): self
    {
        $obj = clone $this;
        $obj['reason'] = $reason;

        return $obj;
    }

    /**
     * The timestamp until which they are blocked if the author is suspended.
     */
    public function withUntil(?float $until): self
    {
        $obj = clone $this;
        $obj['until'] = $until;

        return $obj;
    }
}
