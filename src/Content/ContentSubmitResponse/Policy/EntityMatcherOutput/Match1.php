<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse\Policy\EntityMatcherOutput;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type Match1Shape = array{
 *   match: string, probability: float, span: list<int>
 * }
 */
final class Match1 implements BaseModel
{
    /** @use SdkModel<Match1Shape> */
    use SdkModel;

    #[Api]
    public string $match;

    #[Api]
    public float $probability;

    /** @var list<int> $span */
    #[Api(list: 'int')]
    public array $span;

    /**
     * `new Match1()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Match1::with(match: ..., probability: ..., span: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Match1)->withMatch(...)->withProbability(...)->withSpan(...)
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
     * @param list<int> $span
     */
    public static function with(
        string $match,
        float $probability,
        array $span
    ): self {
        $obj = new self;

        $obj->match = $match;
        $obj->probability = $probability;
        $obj->span = $span;

        return $obj;
    }

    public function withMatch(string $match): self
    {
        $obj = clone $this;
        $obj->match = $match;

        return $obj;
    }

    public function withProbability(float $probability): self
    {
        $obj = clone $this;
        $obj->probability = $probability;

        return $obj;
    }

    /**
     * @param list<int> $span
     */
    public function withSpan(array $span): self
    {
        $obj = clone $this;
        $obj->span = $span;

        return $obj;
    }
}
