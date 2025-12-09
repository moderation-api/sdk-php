<?php

declare(strict_types=1);

namespace ModerationAPI\Content\ContentSubmitResponse;

use ModerationAPI\Content\ContentSubmitResponse\Author\Block;
use ModerationAPI\Content\ContentSubmitResponse\Author\Status;
use ModerationAPI\Content\ContentSubmitResponse\Author\TrustLevel;
use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * The author of the content if your account has authors enabled. Requires you to send authorId when submitting content.
 *
 * @phpstan-type AuthorShape = array{
 *   id: string,
 *   block: Block|null,
 *   status: value-of<Status>,
 *   trustLevel: TrustLevel,
 *   externalID?: string|null,
 * }
 */
final class Author implements BaseModel
{
    /** @use SdkModel<AuthorShape> */
    use SdkModel;

    /**
     * Author ID in Moderation API.
     */
    #[Required]
    public string $id;

    /**
     * Block or suspension details, if applicable. Null if the author is enabled.
     */
    #[Required]
    public ?Block $block;

    /**
     * Current author status.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    #[Required('trust_level')]
    public TrustLevel $trustLevel;

    /**
     * The author's ID from your system.
     */
    #[Optional('external_id', nullable: true)]
    public ?string $externalID;

    /**
     * `new Author()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Author::with(id: ..., block: ..., status: ..., trustLevel: ...)
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
     * @param Block|array{reason?: string|null, until?: float|null}|null $block
     * @param Status|value-of<Status> $status
     * @param TrustLevel|array{level: float, manual: bool} $trustLevel
     */
    public static function with(
        string $id,
        Block|array|null $block,
        Status|string $status,
        TrustLevel|array $trustLevel,
        ?string $externalID = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['block'] = $block;
        $obj['status'] = $status;
        $obj['trustLevel'] = $trustLevel;

        null !== $externalID && $obj['externalID'] = $externalID;

        return $obj;
    }

    /**
     * Author ID in Moderation API.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Block or suspension details, if applicable. Null if the author is enabled.
     *
     * @param Block|array{reason?: string|null, until?: float|null}|null $block
     */
    public function withBlock(Block|array|null $block): self
    {
        $obj = clone $this;
        $obj['block'] = $block;

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

    /**
     * @param TrustLevel|array{level: float, manual: bool} $trustLevel
     */
    public function withTrustLevel(TrustLevel|array $trustLevel): self
    {
        $obj = clone $this;
        $obj['trustLevel'] = $trustLevel;

        return $obj;
    }

    /**
     * The author's ID from your system.
     */
    public function withExternalID(?string $externalID): self
    {
        $obj = clone $this;
        $obj['externalID'] = $externalID;

        return $obj;
    }
}
