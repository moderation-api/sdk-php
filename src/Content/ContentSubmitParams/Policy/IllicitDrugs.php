<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type IllicitDrugsShape = array{
 *   id: 'illicit_drugs', flag: bool, threshold?: float|null
 * }
 */
final class IllicitDrugs implements BaseModel
{
    /** @use SdkModel<IllicitDrugsShape> */
    use SdkModel;

    /** @var 'illicit_drugs' $id */
    #[Required]
    public string $id = 'illicit_drugs';

    #[Required]
    public bool $flag;

    #[Optional]
    public ?float $threshold;

    /**
     * `new IllicitDrugs()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IllicitDrugs::with(flag: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IllicitDrugs)->withFlag(...)
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
