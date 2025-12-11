<?php

declare(strict_types=1);

namespace ModerationAPI\Wordlist;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Embedding status details.
 *
 * @phpstan-type WordlistGetEmbeddingStatusResponseShape = array{
 *   progress: float, remainingWords: float, totalWords: float
 * }
 */
final class WordlistGetEmbeddingStatusResponse implements BaseModel
{
    /** @use SdkModel<WordlistGetEmbeddingStatusResponseShape> */
    use SdkModel;

    /**
     * Percentage of words that have been embedded (0-100).
     */
    #[Required]
    public float $progress;

    /**
     * Number of words still waiting to be embedded.
     */
    #[Required]
    public float $remainingWords;

    /**
     * Total number of words in the wordlist.
     */
    #[Required]
    public float $totalWords;

    /**
     * `new WordlistGetEmbeddingStatusResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WordlistGetEmbeddingStatusResponse::with(
     *   progress: ..., remainingWords: ..., totalWords: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WordlistGetEmbeddingStatusResponse)
     *   ->withProgress(...)
     *   ->withRemainingWords(...)
     *   ->withTotalWords(...)
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
        float $progress,
        float $remainingWords,
        float $totalWords
    ): self {
        $self = new self;

        $self['progress'] = $progress;
        $self['remainingWords'] = $remainingWords;
        $self['totalWords'] = $totalWords;

        return $self;
    }

    /**
     * Percentage of words that have been embedded (0-100).
     */
    public function withProgress(float $progress): self
    {
        $self = clone $this;
        $self['progress'] = $progress;

        return $self;
    }

    /**
     * Number of words still waiting to be embedded.
     */
    public function withRemainingWords(float $remainingWords): self
    {
        $self = clone $this;
        $self['remainingWords'] = $remainingWords;

        return $self;
    }

    /**
     * Total number of words in the wordlist.
     */
    public function withTotalWords(float $totalWords): self
    {
        $self = clone $this;
        $self['totalWords'] = $totalWords;

        return $self;
    }
}
