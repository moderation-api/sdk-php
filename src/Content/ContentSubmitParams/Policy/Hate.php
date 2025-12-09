<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type HateShape = array{id: 'hate', flag: bool}
 */
final class Hate implements BaseModel
{
    /** @use SdkModel<HateShape> */
    use SdkModel;

    /** @var 'hate' $id */
    #[Required]
    public string $id = 'hate';

    #[Required]
    public bool $flag;

    /**
     * `new Hate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Hate::with(flag: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Hate)->withFlag(...)
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
