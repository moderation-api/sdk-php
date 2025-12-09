<?php

declare(strict_types=1);

namespace ModerationAPI\Wordlist\Words;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type WordRemoveResponseShape = array{
 *   removedCount: float, removedWords: list<string>, totalCount: float
 * }
 */
final class WordRemoveResponse implements BaseModel
{
    /** @use SdkModel<WordRemoveResponseShape> */
    use SdkModel;

    /**
     * Number of words removed.
     */
    #[Required]
    public float $removedCount;

    /**
     * List of words removed.
     *
     * @var list<string> $removedWords
     */
    #[Required(list: 'string')]
    public array $removedWords;

    /**
     * Total number of words in wordlist.
     */
    #[Required]
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
