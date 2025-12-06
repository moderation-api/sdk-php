<?php

declare(strict_types=1);

namespace ModerationAPI\Wordlist\Words;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkResponse;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type WordRemoveResponseShape = array{
 *   removedCount: float, removedWords: list<string>, totalCount: float
 * }
 */
final class WordRemoveResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<WordRemoveResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * Number of words removed.
     */
    #[Api]
    public float $removedCount;

    /**
     * List of words removed.
     *
     * @var list<string> $removedWords
     */
    #[Api(list: 'string')]
    public array $removedWords;

    /**
     * Total number of words in wordlist.
     */
    #[Api]
    public float $totalCount;

    /**
     * `new WordRemoveResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WordRemoveResponse::with(removedCount: ..., removedWords: ..., totalCount: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WordRemoveResponse)
     *   ->withRemovedCount(...)
     *   ->withRemovedWords(...)
     *   ->withTotalCount(...)
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
     * @param list<string> $removedWords
     */
    public static function with(
        float $removedCount,
        array $removedWords,
        float $totalCount
    ): self {
        $obj = new self;

        $obj['removedCount'] = $removedCount;
        $obj['removedWords'] = $removedWords;
        $obj['totalCount'] = $totalCount;

        return $obj;
    }

    /**
     * Number of words removed.
     */
    public function withRemovedCount(float $removedCount): self
    {
        $obj = clone $this;
        $obj['removedCount'] = $removedCount;

        return $obj;
    }

    /**
     * List of words removed.
     *
     * @param list<string> $removedWords
     */
    public function withRemovedWords(array $removedWords): self
    {
        $obj = clone $this;
        $obj['removedWords'] = $removedWords;

        return $obj;
    }

    /**
     * Total number of words in wordlist.
     */
    public function withTotalCount(float $totalCount): self
    {
        $obj = clone $this;
        $obj['totalCount'] = $totalCount;

        return $obj;
    }
}
