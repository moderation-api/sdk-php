<?php

declare(strict_types=1);

namespace ModerationAPI\Wordlist\Words;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkParams;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Add words to an existing wordlist.
 *
 * @see ModerationAPI\Services\Wordlist\WordsService::add()
 *
 * @phpstan-type WordAddParamsShape = array{words: list<string>}
 */
final class WordAddParams implements BaseModel
{
    /** @use SdkModel<WordAddParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Array of words to add to the wordlist. Duplicate words will be ignored.
     *
     * @var list<string> $words
     */
    #[Required(list: 'string')]
    public array $words;

    /**
     * `new WordAddParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WordAddParams::with(words: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WordAddParams)->withWords(...)
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
     * @param list<string> $words
     */
    public static function with(array $words): self
    {
        $self = new self;

        $self['words'] = $words;

        return $self;
    }

    /**
     * Array of words to add to the wordlist. Duplicate words will be ignored.
     *
     * @param list<string> $words
     */
    public function withWords(array $words): self
    {
        $self = clone $this;
        $self['words'] = $words;

        return $self;
    }
}
