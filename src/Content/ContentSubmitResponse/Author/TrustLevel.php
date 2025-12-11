<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse\Author;

use ModerationAPI\Core\Attributes\Required;
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
    #[Required]
    public float $level;

    /**
     * True if the trust level was set manually by a moderator.
     */
    #[Required]
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
        $self = new self;

        $self['level'] = $level;
        $self['manual'] = $manual;

        return $self;
    }

    /**
     * Author trust level (-1, 0, 1, 2, 3, or 4).
     */
    public function withLevel(float $level): self
    {
        $self = clone $this;
        $self['level'] = $level;

        return $self;
    }

    /**
     * True if the trust level was set manually by a moderator.
     */
    public function withManual(bool $manual): self
    {
        $self = clone $this;
        $self['manual'] = $manual;

        return $self;
    }
}
