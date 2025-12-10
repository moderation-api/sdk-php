<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse\Insight;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Language insight.
 *
 * @phpstan-type LanguageInsightShape = array{
 *   id?: 'language', probability: float, type?: 'insight', value: string|null
 * }
 */
final class LanguageInsight implements BaseModel
{
    /** @use SdkModel<LanguageInsightShape> */
    use SdkModel;

    /** @var 'language' $id */
    #[Required]
    public string $id = 'language';

    /** @var 'insight' $type */
    #[Required]
    public string $type = 'insight';

    #[Required]
    public float $probability;

    #[Required]
    public ?string $value;

    /**
     * `new LanguageInsight()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LanguageInsight::with(probability: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LanguageInsight)->withProbability(...)->withValue(...)
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
    public static function with(float $probability, ?string $value): self
    {
        $self = new self;

        $self['probability'] = $probability;
        $self['value'] = $value;

        return $self;
    }

    public function withProbability(float $probability): self
    {
        $self = clone $this;
        $self['probability'] = $probability;

        return $self;
    }

    public function withValue(?string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
