<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type IllicitDrugsShape = array{id?: 'illicit_drugs', flag: bool}
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
    public static function with(bool $flag): self
    {
        $self = new self;

        $self['flag'] = $flag;

        return $self;
    }

    public function withFlag(bool $flag): self
    {
        $self = clone $this;
        $self['flag'] = $flag;

        return $self;
    }
}
