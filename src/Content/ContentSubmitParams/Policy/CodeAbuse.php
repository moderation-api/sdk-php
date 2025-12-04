<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type CodeAbuseShape = array{id: 'code_abuse', flag: bool}
 */
final class CodeAbuse implements BaseModel
{
    /** @use SdkModel<CodeAbuseShape> */
    use SdkModel;

    /** @var 'code_abuse' $id */
    #[Api]
    public string $id = 'code_abuse';

    #[Api]
    public bool $flag;

    /**
     * `new CodeAbuse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CodeAbuse::with(flag: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CodeAbuse)->withFlag(...)
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
