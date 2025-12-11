<?php

declare(strict_types=1);

namespace ModerationAPI\Wordlist;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkParams;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Update a wordlist.
 *
 * @see ModerationAPI\Services\WordlistService::update()
 *
 * @phpstan-type WordlistUpdateParamsShape = array{
 *   description?: string,
 *   key?: string,
 *   name?: string,
 *   strict?: bool,
 *   words?: list<string>,
 * }
 */
final class WordlistUpdateParams implements BaseModel
{
    /** @use SdkModel<WordlistUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * New description for the wordlist.
     */
    #[Optional]
    public ?string $description;

    /**
     * New key for the wordlist.
     */
    #[Optional]
    public ?string $key;

    /**
     * New name for the wordlist.
     */
    #[Optional]
    public ?string $name;

    /**
     * Deprecated. Now using threshold in project settings.
     */
    #[Optional]
    public ?bool $strict;

    /**
     * New words for the wordlist. Replace the existing words with these new ones. Duplicate words will be ignored.
     *
     * @var list<string>|null $words
     */
    #[Optional(list: 'string')]
    public ?array $words;

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
    public static function with(
        ?string $description = null,
        ?string $key = null,
        ?string $name = null,
        ?bool $strict = null,
        ?array $words = null,
    ): self {
        $self = new self;

        null !== $description && $self['description'] = $description;
        null !== $key && $self['key'] = $key;
        null !== $name && $self['name'] = $name;
        null !== $strict && $self['strict'] = $strict;
        null !== $words && $self['words'] = $words;

        return $self;
    }

    /**
     * New description for the wordlist.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * New key for the wordlist.
     */
    public function withKey(string $key): self
    {
        $self = clone $this;
        $self['key'] = $key;

        return $self;
    }

    /**
     * New name for the wordlist.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Deprecated. Now using threshold in project settings.
     */
    public function withStrict(bool $strict): self
    {
        $self = clone $this;
        $self['strict'] = $strict;

        return $self;
    }

    /**
     * New words for the wordlist. Replace the existing words with these new ones. Duplicate words will be ignored.
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
