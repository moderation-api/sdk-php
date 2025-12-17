<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type SelfPromotionShape = array{id: 'self_promotion', flag: bool}
 */
final class SelfPromotion implements BaseModel
{
    /** @use SdkModel<SelfPromotionShape> */
    use SdkModel;

    /** @var 'self_promotion' $id */
    #[Required]
    public string $id = 'self_promotion';

    #[Required]
    public bool $flag;

    /**
     * `new SelfPromotion()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SelfPromotion::with(flag: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SelfPromotion)->withFlag(...)
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
