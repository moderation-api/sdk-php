<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type SpamShape = array{id: 'spam', flag: bool}
 */
final class Spam implements BaseModel
{
    /** @use SdkModel<SpamShape> */
    use SdkModel;

    /** @var 'spam' $id */
    #[Api]
    public string $id = 'spam';

    #[Api]
    public bool $flag;

    /**
     * `new Spam()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Spam::with(flag: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Spam)->withFlag(...)
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

        $obj->flag = $flag;

        return $obj;
    }

    public function withFlag(bool $flag): self
    {
        $obj = clone $this;
        $obj->flag = $flag;

        return $obj;
    }
}
