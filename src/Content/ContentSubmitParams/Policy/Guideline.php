<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type GuidelineShape = array{
 *   id: 'guideline', flag: bool, guidelineKey: string, instructions: string
 * }
 */
final class Guideline implements BaseModel
{
    /** @use SdkModel<GuidelineShape> */
    use SdkModel;

    /** @var 'guideline' $id */
    #[Api]
    public string $id = 'guideline';

    #[Api]
    public bool $flag;

    #[Api]
    public string $guidelineKey;

    #[Api]
    public string $instructions;

    /**
     * `new Guideline()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Guideline::with(flag: ..., guidelineKey: ..., instructions: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Guideline)->withFlag(...)->withGuidelineKey(...)->withInstructions(...)
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
    public static function with(
        bool $flag,
        string $guidelineKey,
        string $instructions
    ): self {
        $obj = new self;

        $obj['flag'] = $flag;
        $obj['guidelineKey'] = $guidelineKey;
        $obj['instructions'] = $instructions;

        return $obj;
    }

    public function withFlag(bool $flag): self
    {
        $obj = clone $this;
        $obj['flag'] = $flag;

        return $obj;
    }

    public function withGuidelineKey(string $guidelineKey): self
    {
        $obj = clone $this;
        $obj['guidelineKey'] = $guidelineKey;

        return $obj;
    }

    public function withInstructions(string $instructions): self
    {
        $obj = clone $this;
        $obj['instructions'] = $instructions;

        return $obj;
    }
}
