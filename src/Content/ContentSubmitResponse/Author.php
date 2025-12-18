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
 * @phpstan-import-type BlockShape from \ModerationAPI\Content\ContentSubmitResponse\Author\Block
 * @phpstan-import-type TrustLevelShape from \ModerationAPI\Content\ContentSubmitResponse\Author\TrustLevel
 *
 * @phpstan-type AuthorShape = array{
 *   id: string,
 *   block: null|Block|BlockShape,
 *   status: Status|value-of<Status>,
 *   trustLevel: TrustLevel|TrustLevelShape,
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
     * @param Block|BlockShape|null $block
     * @param Status|value-of<Status> $status
     * @param TrustLevel|TrustLevelShape $trustLevel
     */
    public static function with(
        string $id,
        Block|array|null $block,
        Status|string $status,
        TrustLevel|array $trustLevel,
        ?string $externalID = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['block'] = $block;
        $self['status'] = $status;
        $self['trustLevel'] = $trustLevel;

        null !== $externalID && $self['externalID'] = $externalID;

        return $self;
    }

    /**
     * Author ID in Moderation API.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Block or suspension details, if applicable. Null if the author is enabled.
     *
     * @param Block|BlockShape|null $block
     */
    public function withBlock(Block|array|null $block): self
    {
        $self = clone $this;
        $self['block'] = $block;

        return $self;
    }

    /**
     * Current author status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * @param TrustLevel|TrustLevelShape $trustLevel
     */
    public function withTrustLevel(TrustLevel|array $trustLevel): self
    {
        $self = clone $this;
        $self['trustLevel'] = $trustLevel;

        return $self;
    }

    /**
     * The author's ID from your system.
     */
    public function withExternalID(?string $externalID): self
    {
        $self = clone $this;
        $self['externalID'] = $externalID;

        return $self;
    }
}
