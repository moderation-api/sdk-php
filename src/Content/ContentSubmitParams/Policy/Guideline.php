<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy;

use ModerationAPI\Core\Attributes\Required;
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
    #[Required]
    public string $id = 'guideline';

    #[Required]
    public bool $flag;

    #[Required]
    public string $guidelineKey;

    #[Required]
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
        $self = new self;

        $self['flag'] = $flag;
        $self['guidelineKey'] = $guidelineKey;
        $self['instructions'] = $instructions;

        return $self;
    }

    public function withFlag(bool $flag): self
    {
        $self = clone $this;
        $self['flag'] = $flag;

        return $self;
    }

    public function withGuidelineKey(string $guidelineKey): self
    {
        $self = clone $this;
        $self['guidelineKey'] = $guidelineKey;

        return $self;
    }

    public function withInstructions(string $instructions): self
    {
        $self = clone $this;
        $self['instructions'] = $instructions;

        return $self;
    }
}
