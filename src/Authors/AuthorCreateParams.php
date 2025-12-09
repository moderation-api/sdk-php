<?php

declare(strict_types=1);

namespace ModerationAPI\Authors;

use ModerationAPI\Authors\AuthorCreateParams\Metadata;
use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkParams;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Create a new author. Typically not needed as authors are created automatically when content is moderated.
 *
 * @see ModerationAPI\Services\AuthorsService::create()
 *
 * @phpstan-type AuthorCreateParamsShape = array{
 *   external_id: string,
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
final class AuthorCreateParams implements BaseModel
{
    /** @use SdkModel<AuthorCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * External ID of the user, typically the ID of the author in your database.
     */
    #[Required]
    public string $external_id;

    /**
     * Author email address.
     */
    #[Optional(nullable: true)]
    public ?string $email;

    /**
     * URL of the author's external profile.
     */
    #[Optional(nullable: true)]
    public ?string $external_link;

    /**
     * Timestamp when author first appeared.
     */
    #[Optional]
    public ?float $first_seen;

    /**
     * Timestamp of last activity.
     */
    #[Optional]
    public ?float $last_seen;

    #[Optional(nullable: true)]
    public ?float $manual_trust_level;

    /**
     * Additional metadata provided by your system. We recommend including any relevant information that may assist in the moderation process.
     */
    #[Optional]
    public ?Metadata $metadata;

    /**
     * Author name or identifier.
     */
    #[Optional(nullable: true)]
    public ?string $name;

    /**
     * URL of the author's profile picture.
     */
    #[Optional(nullable: true)]
    public ?string $profile_picture;

    /**
     * `new AuthorCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AuthorCreateParams::with(external_id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AuthorCreateParams)->withExternalID(...)
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
     * @param Metadata|array{
     *   email_verified?: bool|null,
     *   identity_verified?: bool|null,
     *   is_paying_customer?: bool|null,
     *   phone_verified?: bool|null,
     * } $metadata
     */
    public static function with(
        string $external_id,
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

        $obj['external_id'] = $external_id;

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
     * External ID of the user, typically the ID of the author in your database.
     */
    public function withExternalID(string $externalID): self
    {
        $obj = clone $this;
        $obj['external_id'] = $externalID;

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
