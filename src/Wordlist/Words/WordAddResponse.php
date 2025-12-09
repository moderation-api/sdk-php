<?php

declare(strict_types=1);

namespace ModerationAPI\Wordlist\Words;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type WordAddResponseShape = array{
 *   addedCount: float, addedWords: list<string>, totalCount: float
 * }
 */
final class WordAddResponse implements BaseModel
{
    /** @use SdkModel<WordAddResponseShape> */
    use SdkModel;

    /**
     * Number of words added.
     */
    #[Required]
    public float $addedCount;

    /**
     * List of words that were added.
     *
     * @var list<string> $addedWords
     */
    #[Required(list: 'string')]
    public array $addedWords;

    /**
     * Total number of words in wordlist.
     */
    #[Required]
    public float $totalCount;

    /**
     * `new WordAddResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WordAddResponse::with(addedCount: ..., addedWords: ..., totalCount: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WordAddResponse)
     *   ->withAddedCount(...)
     *   ->withAddedWords(...)
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
     * @param list<string> $addedWords
     */
    public static function with(
        float $addedCount,
        array $addedWords,
        float $totalCount
    ): self {
        $obj = new self;

        $obj['addedCount'] = $addedCount;
        $obj['addedWords'] = $addedWords;
        $obj['totalCount'] = $totalCount;

        return $obj;
    }

    /**
     * Number of words added.
     */
    public function withAddedCount(float $addedCount): self
    {
        $obj = clone $this;
        $obj['addedCount'] = $addedCount;

        return $obj;
    }

    /**
     * List of words that were added.
     *
     * @param list<string> $addedWords
     */
    public function withAddedWords(array $addedWords): self
    {
        $obj = clone $this;
        $obj['addedWords'] = $addedWords;

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
