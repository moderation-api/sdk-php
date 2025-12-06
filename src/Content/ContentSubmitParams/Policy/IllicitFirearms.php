<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type IllicitFirearmsShape = array{id: 'illicit_firearms', flag: bool}
 */
final class IllicitFirearms implements BaseModel
{
    /** @use SdkModel<IllicitFirearmsShape> */
    use SdkModel;

    /** @var 'illicit_firearms' $id */
    #[Api]
    public string $id = 'illicit_firearms';

    #[Api]
    public bool $flag;

    /**
     * `new IllicitFirearms()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IllicitFirearms::with(flag: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IllicitFirearms)->withFlag(...)
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
