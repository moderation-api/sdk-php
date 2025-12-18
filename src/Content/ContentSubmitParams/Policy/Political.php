<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type PoliticalShape = array{
 *   id: 'political', flag: bool, threshold?: float|null
 * }
 */
final class Political implements BaseModel
{
    /** @use SdkModel<PoliticalShape> */
    use SdkModel;

    /** @var 'political' $id */
    #[Required]
    public string $id = 'political';

    #[Required]
    public bool $flag;

    #[Optional]
    public ?float $threshold;

    /**
     * `new Political()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Political::with(flag: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Political)->withFlag(...)
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
    public static function with(bool $flag, ?float $threshold = null): self
    {
        $self = new self;

        $self['flag'] = $flag;

        null !== $threshold && $self['threshold'] = $threshold;

        return $self;
    }

    public function withFlag(bool $flag): self
    {
        $self = clone $this;
        $self['flag'] = $flag;

        return $self;
    }

    public function withThreshold(float $threshold): self
    {
        $self = clone $this;
        $self['threshold'] = $threshold;

        return $self;
    }
}
