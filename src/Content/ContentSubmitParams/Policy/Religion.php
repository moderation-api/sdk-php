<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type ReligionShape = array{id: 'religion', flag: bool}
 */
final class Religion implements BaseModel
{
    /** @use SdkModel<ReligionShape> */
    use SdkModel;

    /** @var 'religion' $id */
    #[Api]
    public string $id = 'religion';

    #[Api]
    public bool $flag;

    /**
     * `new Religion()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Religion::with(flag: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Religion)->withFlag(...)
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
