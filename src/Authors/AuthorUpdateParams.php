<?php

declare(strict_types=1);

namespace ModerationAPI\Authors;

use ModerationAPI\Authors\AuthorUpdateParams\Metadata;
use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkParams;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Update the details of a specific author.
 *
 * @see ModerationAPI\Services\AuthorsService::update()
 *
 * @phpstan-type AuthorUpdateParamsShape = array{
 *   email?: string|null,
 *   external_link?: string|null,
 *   first_seen?: float,
 *   last_seen?: float,
 *   manual_trust_level?: float|null,
 *   metadata?: Metadata|array{
 *     email_verified?: bool|null,
 *     identity_verified?: bool|null,
 *     is_paying_customer?: bool|null,
 *     phone_verified?: bool|null,
 *   },
 *   name?: string|null,
 *   profile_picture?: string|null,
 * }
 */
final class AuthorUpdateParams implements BaseModel
{
    /** @use SdkModel<AuthorUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Author email address.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $email;

    /**
     * URL of the author's external profile.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $external_link;

    /**
     * Timestamp when author first appeared.
     */
    #[Api(optional: true)]
    public ?float $first_seen;

    /**
     * Timestamp of last activity.
     */
    #[Api(optional: true)]
    public ?float $last_seen;

    #[Api(nullable: true, optional: true)]
    public ?float $manual_trust_level;

    /**
     * Additional metadata provided by your system. We recommend including any relevant information that may assist in the moderation process.
     */
    #[Api(optional: true)]
    public ?Metadata $metadata;

    /**
     * Author name or identifier.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $name;

    /**
     * URL of the author's profile picture.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $profile_picture;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Metadata|array{
     *   email_verified?: bool|null,
     *   identity_verified?: bool|null,
     *   is_paying_customer?: bool|null,
     *   phone_verified?: bool|null,
     * } $metadata
     */
    public static function with(
        ?string $email = null,
        ?string $external_link = null,
        ?float $first_seen = null,
        ?float $last_seen = null,
        ?float $manual_trust_level = null,
        Metadata|array|null $metadata = null,
        ?string $name = null,
        ?string $profile_picture = null,
    ): self {
        $obj = new self;

        null !== $email && $obj['email'] = $email;
        null !== $external_link && $obj['external_link'] = $external_link;
        null !== $first_seen && $obj['first_seen'] = $first_seen;
        null !== $last_seen && $obj['last_seen'] = $last_seen;
        null !== $manual_trust_level && $obj['manual_trust_level'] = $manual_trust_level;
        null !== $metadata && $obj['metadata'] = $metadata;
        null !== $name && $obj['name'] = $name;
        null !== $profile_picture && $obj['profile_picture'] = $profile_picture;

        return $obj;
    }

    /**
     * Author email address.
     */
    public function withEmail(?string $email): self
    {
        $obj = clone $this;
        $obj['email'] = $email;

        return $obj;
    }

    /**
     * URL of the author's external profile.
     */
    public function withExternalLink(?string $externalLink): self
    {
        $obj = clone $this;
        $obj['external_link'] = $externalLink;

        return $obj;
    }

    /**
     * Timestamp when author first appeared.
     */
    public function withFirstSeen(float $firstSeen): self
    {
        $obj = clone $this;
        $obj['first_seen'] = $firstSeen;

        return $obj;
    }

    /**
     * Timestamp of last activity.
     */
    public function withLastSeen(float $lastSeen): self
    {
        $obj = clone $this;
        $obj['last_seen'] = $lastSeen;

        return $obj;
    }

    public function withManualTrustLevel(?float $manualTrustLevel): self
    {
        $obj = clone $this;
        $obj['manual_trust_level'] = $manualTrustLevel;

        return $obj;
    }

    /**
     * Additional metadata provided by your system. We recommend including any relevant information that may assist in the moderation process.
     *
     * @param Metadata|array{
     *   email_verified?: bool|null,
     *   identity_verified?: bool|null,
     *   is_paying_customer?: bool|null,
     *   phone_verified?: bool|null,
     * } $metadata
     */
    public function withMetadata(Metadata|array $metadata): self
    {
        $obj = clone $this;
        $obj['metadata'] = $metadata;

        return $obj;
    }

    /**
     * Author name or identifier.
     */
    public function withName(?string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * URL of the author's profile picture.
     */
    public function withProfilePicture(?string $profilePicture): self
    {
        $obj = clone $this;
        $obj['profile_picture'] = $profilePicture;

        return $obj;
    }
}
