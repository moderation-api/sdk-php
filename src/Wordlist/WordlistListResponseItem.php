<?php

declare(strict_types=1);

namespace ModerationAPI\Wordlist;

use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type WordlistListResponseItemShape = array{
 *   id: string,
 *   createdAt: string|null,
 *   description: string|null,
 *   name: string|null,
 *   userID: string|null,
 * }
 */
final class WordlistListResponseItem implements BaseModel
{
    /** @use SdkModel<WordlistListResponseItemShape> */
    use SdkModel;

    /**
     * Unique identifier of the wordlist.
     */
    #[Required]
    public string $id;

    /**
     * When the wordlist was created.
     */
    #[Required]
    public ?string $createdAt;

    /**
     * Description of the wordlist.
     */
    #[Required]
    public ?string $description;

    /**
     * Name of the wordlist.
     */
    #[Required]
    public ?string $name;

    /**
     * User who created the wordlist.
     */
    #[Required('userId')]
    public ?string $userID;

    /**
     * `new WordlistListResponseItem()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WordlistListResponseItem::with(
     *   id: ..., createdAt: ..., description: ..., name: ..., userID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WordlistListResponseItem)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withDescription(...)
     *   ->withName(...)
     *   ->withUserID(...)
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
        string $id,
        ?string $createdAt,
        ?string $description,
        ?string $name,
        ?string $userID,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['description'] = $description;
        $self['name'] = $name;
        $self['userID'] = $userID;

        return $self;
    }

    /**
     * Unique identifier of the wordlist.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * When the wordlist was created.
     */
    public function withCreatedAt(?string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Description of the wordlist.
     */
    public function withDescription(?string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

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
     * User who created the wordlist.
     */
    public function withUserID(?string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }
}
