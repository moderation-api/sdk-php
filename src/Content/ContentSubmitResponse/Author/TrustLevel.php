<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse\Author;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type TrustLevelShape = array{level: float, manual: bool}
 */
final class TrustLevel implements BaseModel
{
    /** @use SdkModel<TrustLevelShape> */
    use SdkModel;

    /**
     * Author trust level (-1, 0, 1, 2, 3, or 4).
     */
    #[Api]
    public float $level;

    /**
     * True if the trust level was set manually by a moderator.
     */
    #[Api]
    public bool $manual;

    /**
     * `new TrustLevel()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TrustLevel::with(level: ..., manual: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TrustLevel)->withLevel(...)->withManual(...)
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
    public static function with(float $level, bool $manual): self
    {
        $obj = new self;

        $obj->level = $level;
        $obj->manual = $manual;

        return $obj;
    }

    /**
     * Author trust level (-1, 0, 1, 2, 3, or 4).
     */
    public function withLevel(float $level): self
    {
        $obj = clone $this;
        $obj->level = $level;

        return $obj;
    }

    /**
     * True if the trust level was set manually by a moderator.
     */
    public function withManual(bool $manual): self
    {
        $obj = clone $this;
        $obj->manual = $manual;

        return $obj;
    }
}
