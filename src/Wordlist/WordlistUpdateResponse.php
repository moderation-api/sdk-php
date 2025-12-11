<?php

declare(strict_types=1);

namespace ModerationAPI\Wordlist;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type WordlistUpdateResponseShape = array{
 *   id: string,
 *   createdAt: string,
 *   name: string|null,
 *   organizationID: string,
 *   strict: bool,
 *   userID: string|null,
 *   words: list<string>,
 * }
 */
final class WordlistUpdateResponse implements BaseModel
{
    /** @use SdkModel<WordlistUpdateResponseShape> */
    use SdkModel;

    /**
     * ID of the wordlist.
     */
    #[Required]
    public string $id;

    /**
     * Creation date of the wordlist.
     */
    #[Required]
    public string $createdAt;

    /**
     * Name of the wordlist.
     */
    #[Required]
    public ?string $name;

    /**
     * ID of the organization.
     */
    #[Required('organizationId')]
    public string $organizationID;

    /**
     * Strict mode.
     */
    #[Required]
    public bool $strict;

    /**
     * ID of the user.
     */
    #[Required('userId')]
    public ?string $userID;

    /**
     * Words in the wordlist.
     *
     * @var list<string> $words
     */
    #[Required(list: 'string')]
    public array $words;

    /**
     * `new WordlistUpdateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WordlistUpdateResponse::with(
     *   id: ...,
     *   createdAt: ...,
     *   name: ...,
     *   organizationID: ...,
     *   strict: ...,
     *   userID: ...,
     *   words: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WordlistUpdateResponse)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withName(...)
     *   ->withOrganizationID(...)
     *   ->withStrict(...)
     *   ->withUserID(...)
     *   ->withWords(...)
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
    public static function with(
        string $id,
        string $createdAt,
        ?string $name,
        string $organizationID,
        bool $strict,
        ?string $userID,
        array $words,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['name'] = $name;
        $self['organizationID'] = $organizationID;
        $self['strict'] = $strict;
        $self['userID'] = $userID;
        $self['words'] = $words;

        return $self;
    }

    /**
     * ID of the wordlist.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Creation date of the wordlist.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Name of the wordlist.
     */
    public function withName(?string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * ID of the organization.
     */
    public function withOrganizationID(string $organizationID): self
    {
        $self = clone $this;
        $self['organizationID'] = $organizationID;

        return $self;
    }

    /**
     * Strict mode.
     */
    public function withStrict(bool $strict): self
    {
        $self = clone $this;
        $self['strict'] = $strict;

        return $self;
    }

    /**
     * ID of the user.
     */
    public function withUserID(?string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    /**
     * Words in the wordlist.
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
