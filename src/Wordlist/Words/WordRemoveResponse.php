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
        $self = new self;

        $self['removedCount'] = $removedCount;
        $self['removedWords'] = $removedWords;
        $self['totalCount'] = $totalCount;

        return $self;
    }

    /**
     * Number of words removed.
     */
    public function withRemovedCount(float $removedCount): self
    {
        $self = clone $this;
        $self['removedCount'] = $removedCount;

        return $self;
    }

    /**
     * List of words removed.
     *
     * @param list<string> $removedWords
     */
    public function withRemovedWords(array $removedWords): self
    {
        $self = clone $this;
        $self['removedWords'] = $removedWords;

        return $self;
    }

    /**
     * Total number of words in wordlist.
     */
    public function withTotalCount(float $totalCount): self
    {
        $self = clone $this;
        $self['totalCount'] = $totalCount;

        return $self;
    }
}
