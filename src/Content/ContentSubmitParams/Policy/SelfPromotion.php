<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy;

use ModerationAPI\Core\Attributes\Api;
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
    #[Api]
    public string $id = 'self_promotion';

    #[Api]
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
        $obj = new self;

        $obj['flag'] = $flag;

        return $obj;
    }

    public function withFlag(bool $flag): self
    {
        $obj = clone $this;
        $obj['flag'] = $flag;

        return $obj;
    }
}
