<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse\Insight;

use ModerationAPI\Content\ContentSubmitResponse\Insight\SentimentInsight\Value;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Sentiment insight.
 *
 * @phpstan-type SentimentInsightShape = array{
 *   id: 'sentiment',
 *   probability: float,
 *   type: 'insight',
 *   value: null|Value|value-of<Value>,
 * }
 */
final class SentimentInsight implements BaseModel
{
    /** @use SdkModel<SentimentInsightShape> */
    use SdkModel;

    /** @var 'sentiment' $id */
    #[Required]
    public string $id = 'sentiment';

    /** @var 'insight' $type */
    #[Required]
    public string $type = 'insight';

    #[Required]
    public float $probability;

    /** @var value-of<Value>|null $value */
    #[Required(enum: Value::class)]
    public ?string $value;

    /**
     * `new SentimentInsight()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SentimentInsight::with(probability: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SentimentInsight)->withProbability(...)->withValue(...)
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
     *
     * @param Value|value-of<Value>|null $value
     */
    public static function with(
        float $probability,
        Value|string|null $value
    ): self {
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

    /**
     * @param Value|value-of<Value>|null $value
     */
    public function withValue(Value|string|null $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
