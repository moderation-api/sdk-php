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
 *   userId: string|null,
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
    #[Required]
    public ?string $userId;

    /**
     * `new WordlistListResponseItem()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WordlistListResponseItem::with(
     *   id: ..., createdAt: ..., description: ..., name: ..., userId: ...
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
        ?string $userId,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['createdAt'] = $createdAt;
        $obj['description'] = $description;
        $obj['name'] = $name;
        $obj['userId'] = $userId;

        return $obj;
    }

    /**
     * Unique identifier of the wordlist.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * When the wordlist was created.
     */
    public function withCreatedAt(?string $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * Description of the wordlist.
     */
    public function withDescription(?string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

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
     * User who created the wordlist.
     */
    public function withUserID(?string $userID): self
    {
        $obj = clone $this;
        $obj['userId'] = $userID;

        return $obj;
    }
}
