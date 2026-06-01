<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type LowQualityContentShape = array{
 *   id: 'low_quality', flag: bool, minWords?: int|null, threshold?: float|null
 * }
 */
final class LowQualityContent implements BaseModel
{
    /** @use SdkModel<LowQualityContentShape> */
    use SdkModel;

    /** @var 'low_quality' $id */
    #[Required]
    public string $id = 'low_quality';

    #[Required]
    public bool $flag;

    /**
     * Flag content with fewer than this many words as low-effort. Defaults to 3. Set to disable by omitting.
     */
    #[Optional]
    public ?int $minWords;

    #[Optional]
    public ?float $threshold;

    /**
     * `new LowQualityContent()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LowQualityContent::with(flag: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LowQualityContent)->withFlag(...)
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
        bool $flag,
        ?int $minWords = null,
        ?float $threshold = null
    ): self {
        $self = new self;

        $self['flag'] = $flag;

        null !== $minWords && $self['minWords'] = $minWords;
        null !== $threshold && $self['threshold'] = $threshold;

        return $self;
    }

    /**
     * @param 'low_quality' $id
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withFlag(bool $flag): self
    {
        $self = clone $this;
        $self['flag'] = $flag;

        return $self;
    }

    /**
     * Flag content with fewer than this many words as low-effort. Defaults to 3. Set to disable by omitting.
     */
    public function withMinWords(int $minWords): self
    {
        $self = clone $this;
        $self['minWords'] = $minWords;

        return $self;
    }

    public function withThreshold(float $threshold): self
    {
        $self = clone $this;
        $self['threshold'] = $threshold;

        return $self;
    }
}
