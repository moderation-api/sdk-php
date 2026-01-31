<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitParams\Policy;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type GuidelineShape = array{
 *   id: 'guideline',
 *   flag: bool,
 *   guidelineKey: string,
 *   instructions: string,
 *   threshold?: float|null,
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

    #[Optional]
    public ?float $threshold;

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
        string $instructions,
        ?float $threshold = null,
    ): self {
        $self = new self;

        $self['flag'] = $flag;
        $self['guidelineKey'] = $guidelineKey;
        $self['instructions'] = $instructions;

        null !== $threshold && $self['threshold'] = $threshold;

        return $self;
    }

    /**
     * @param 'guideline' $id
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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

    public function withThreshold(float $threshold): self
    {
        $self = clone $this;
        $self['threshold'] = $threshold;

        return $self;
    }
}
