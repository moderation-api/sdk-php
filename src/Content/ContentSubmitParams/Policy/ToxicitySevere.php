<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type ToxicitySevereShape = array{id: 'toxicity_severe', flag: bool}
 */
final class ToxicitySevere implements BaseModel
{
    /** @use SdkModel<ToxicitySevereShape> */
    use SdkModel;

    /** @var 'toxicity_severe' $id */
    #[Api]
    public string $id = 'toxicity_severe';

    #[Api]
    public bool $flag;

    /**
     * `new ToxicitySevere()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ToxicitySevere::with(flag: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ToxicitySevere)->withFlag(...)
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
