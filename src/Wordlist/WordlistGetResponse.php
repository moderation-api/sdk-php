<?php

declare(strict_types=1);

namespace ModerationAPI\Wordlist;

use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type WordlistGetResponseShape = array{
 *   id: string,
 *   createdAt: string,
 *   name: string|null,
 *   organizationId: string,
 *   strict: bool,
 *   userId: string|null,
 *   words: list<string>,
 * }
 */
final class WordlistGetResponse implements BaseModel
{
    /** @use SdkModel<WordlistGetResponseShape> */
    use SdkModel;

    /**
     * ID of the wordlist.
     */
    #[Api]
    public string $id;

    /**
     * Creation date of the wordlist.
     */
    #[Api]
    public string $createdAt;

    /**
     * Name of the wordlist.
     */
    #[Api]
    public ?string $name;

    /**
     * ID of the organization.
     */
    #[Api]
    public string $organizationId;

    /**
     * Strict mode.
     */
    #[Api]
    public bool $strict;

    /**
     * ID of the user.
     */
    #[Api]
    public ?string $userId;

    /**
     * Words in the wordlist.
     *
     * @var list<string> $words
     */
    #[Api(list: 'string')]
    public array $words;

    /**
     * `new WordlistGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WordlistGetResponse::with(
     *   id: ...,
     *   createdAt: ...,
     *   name: ...,
     *   organizationId: ...,
     *   strict: ...,
     *   userId: ...,
     *   words: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WordlistGetResponse)
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
        string $organizationId,
        bool $strict,
        ?string $userId,
        array $words,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['createdAt'] = $createdAt;
        $obj['name'] = $name;
        $obj['organizationId'] = $organizationId;
        $obj['strict'] = $strict;
        $obj['userId'] = $userId;
        $obj['words'] = $words;

        return $obj;
    }

    /**
     * ID of the wordlist.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Creation date of the wordlist.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * Name of the wordlist.
     */
    public function withName(?string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * ID of the organization.
     */
    public function withOrganizationID(string $organizationID): self
    {
        $obj = clone $this;
        $obj['organizationId'] = $organizationID;

        return $obj;
    }

    /**
     * Strict mode.
     */
    public function withStrict(bool $strict): self
    {
        $obj = clone $this;
        $obj['strict'] = $strict;

        return $obj;
    }

    /**
     * ID of the user.
     */
    public function withUserID(?string $userID): self
    {
        $obj = clone $this;
        $obj['userId'] = $userID;

        return $obj;
    }

    /**
     * Words in the wordlist.
     *
     * @param list<string> $words
     */
    public function withWords(array $words): self
    {
        $obj = clone $this;
        $obj['words'] = $words;

        return $obj;
    }
}
