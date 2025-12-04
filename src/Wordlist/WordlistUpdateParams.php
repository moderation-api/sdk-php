<?php

declare(strict_types=1);

namespace ModerationAPI\Wordlist;

use ModerationAPI\Core\Attributes\Api;
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
    #[Api(optional: true)]
    public ?string $description;

    /**
     * New key for the wordlist.
     */
    #[Api(optional: true)]
    public ?string $key;

    /**
     * New name for the wordlist.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Deprecated. Now using threshold in project settings.
     */
    #[Api(optional: true)]
    public ?bool $strict;

    /**
     * New words for the wordlist. Replace the existing words with these new ones. Duplicate words will be ignored.
     *
     * @var list<string>|null $words
     */
    #[Api(list: 'string', optional: true)]
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
        $obj = new self;

        null !== $description && $obj->description = $description;
        null !== $key && $obj->key = $key;
        null !== $name && $obj->name = $name;
        null !== $strict && $obj->strict = $strict;
        null !== $words && $obj->words = $words;

        return $obj;
    }

    /**
     * New description for the wordlist.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * New key for the wordlist.
     */
    public function withKey(string $key): self
    {
        $obj = clone $this;
        $obj->key = $key;

        return $obj;
    }

    /**
     * New name for the wordlist.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Deprecated. Now using threshold in project settings.
     */
    public function withStrict(bool $strict): self
    {
        $obj = clone $this;
        $obj->strict = $strict;

        return $obj;
    }

    /**
     * New words for the wordlist. Replace the existing words with these new ones. Duplicate words will be ignored.
     *
     * @param list<string> $words
     */
    public function withWords(array $words): self
    {
        $obj = clone $this;
        $obj->words = $words;

        return $obj;
    }
}
