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
        $obj = new self;

        $obj['progress'] = $progress;
        $obj['remainingWords'] = $remainingWords;
        $obj['totalWords'] = $totalWords;

        return $obj;
    }

    /**
     * Percentage of words that have been embedded (0-100).
     */
    public function withProgress(float $progress): self
    {
        $obj = clone $this;
        $obj['progress'] = $progress;

        return $obj;
    }

    /**
     * Number of words still waiting to be embedded.
     */
    public function withRemainingWords(float $remainingWords): self
    {
        $obj = clone $this;
        $obj['remainingWords'] = $remainingWords;

        return $obj;
    }

    /**
     * Total number of words in the wordlist.
     */
    public function withTotalWords(float $totalWords): self
    {
        $obj = clone $this;
        $obj['totalWords'] = $totalWords;

        return $obj;
    }
}
