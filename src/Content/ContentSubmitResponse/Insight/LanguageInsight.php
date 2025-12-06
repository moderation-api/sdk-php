<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse\Insight;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Language insight.
 *
 * @phpstan-type LanguageInsightShape = array{
 *   id: 'language', probability: float, type: 'insight', value: string|null
 * }
 */
final class LanguageInsight implements BaseModel
{
    /** @use SdkModel<LanguageInsightShape> */
    use SdkModel;

    /** @var 'language' $id */
    #[Api]
    public string $id = 'language';

    /** @var 'insight' $type */
    #[Api]
    public string $type = 'insight';

    #[Api]
    public float $probability;

    #[Api]
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
        $obj = new self;

        $obj['probability'] = $probability;
        $obj['value'] = $value;

        return $obj;
    }

    public function withProbability(float $probability): self
    {
        $obj = clone $this;
        $obj['probability'] = $probability;

        return $obj;
    }

    public function withValue(?string $value): self
    {
        $obj = clone $this;
        $obj['value'] = $value;

        return $obj;
    }
}
