<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse;

use ModerationAPI\Content\ContentSubmitResponse\Author\Block;
use ModerationAPI\Content\ContentSubmitResponse\Author\Status;
use ModerationAPI\Content\ContentSubmitResponse\Author\TrustLevel;
use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * The author of the content if your account has authors enabled. Requires you to send authorId when submitting content.
 *
 * @phpstan-type AuthorShape = array{
 *   id: string,
 *   block: Block|null,
 *   status: value-of<Status>,
 *   trust_level: TrustLevel,
 *   external_id?: string|null,
 * }
 */
final class Author implements BaseModel
{
    /** @use SdkModel<AuthorShape> */
    use SdkModel;

    /**
     * Author ID in Moderation API.
     */
    #[Api]
    public string $id;

    /**
     * Block or suspension details, if applicable. Null if the author is enabled.
     */
    #[Api]
    public ?Block $block;

    /**
     * Current author status.
     *
     * @var value-of<Status> $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    #[Api]
    public TrustLevel $trust_level;

    /**
     * The author's ID from your system.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $external_id;

    /**
     * `new Author()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Author::with(id: ..., block: ..., status: ..., trust_level: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Author)->withID(...)->withBlock(...)->withStatus(...)->withTrustLevel(...)
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
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $id,
        ?Block $block,
        Status|string $status,
        TrustLevel $trust_level,
        ?string $external_id = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->block = $block;
        $obj['status'] = $status;
        $obj->trust_level = $trust_level;

        null !== $external_id && $obj->external_id = $external_id;

        return $obj;
    }

    /**
     * Author ID in Moderation API.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Block or suspension details, if applicable. Null if the author is enabled.
     */
    public function withBlock(?Block $block): self
    {
        $obj = clone $this;
        $obj->block = $block;

        return $obj;
    }

    /**
     * Current author status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    public function withTrustLevel(TrustLevel $trustLevel): self
    {
        $obj = clone $this;
        $obj->trust_level = $trustLevel;

        return $obj;
    }

    /**
     * The author's ID from your system.
     */
    public function withExternalID(?string $externalID): self
    {
        $obj = clone $this;
        $obj->external_id = $externalID;

        return $obj;
    }
}
