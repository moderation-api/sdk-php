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
 * @phpstan-import-type MetadataShape from \ModerationAPI\Authors\AuthorCreateParams\Metadata
 *
 * @phpstan-type AuthorCreateParamsShape = array{
 *   externalID: string,
 *   email?: string|null,
 *   externalLink?: string|null,
 *   firstSeen?: float|null,
 *   lastSeen?: float|null,
 *   manualTrustLevel?: float|null,
 *   metadata?: MetadataShape|null,
 *   name?: string|null,
 *   profilePicture?: string|null,
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
    #[Required('external_id')]
    public string $externalID;

    /**
     * Author email address.
     */
    #[Optional(nullable: true)]
    public ?string $email;

    /**
     * URL of the author's external profile.
     */
    #[Optional('external_link', nullable: true)]
    public ?string $externalLink;

    /**
     * Timestamp when author first appeared.
     */
    #[Optional('first_seen')]
    public ?float $firstSeen;

    /**
     * Timestamp of last activity.
     */
    #[Optional('last_seen')]
    public ?float $lastSeen;

    #[Optional('manual_trust_level', nullable: true)]
    public ?float $manualTrustLevel;

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
    #[Optional('profile_picture', nullable: true)]
    public ?string $profilePicture;

    /**
     * `new AuthorCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AuthorCreateParams::with(externalID: ...)
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
     * @param MetadataShape $metadata
     */
    public static function with(
        string $externalID,
        ?string $email = null,
        ?string $externalLink = null,
        ?float $firstSeen = null,
        ?float $lastSeen = null,
        ?float $manualTrustLevel = null,
        Metadata|array|null $metadata = null,
        ?string $name = null,
        ?string $profilePicture = null,
    ): self {
        $self = new self;

        $self['externalID'] = $externalID;

        null !== $email && $self['email'] = $email;
        null !== $externalLink && $self['externalLink'] = $externalLink;
        null !== $firstSeen && $self['firstSeen'] = $firstSeen;
        null !== $lastSeen && $self['lastSeen'] = $lastSeen;
        null !== $manualTrustLevel && $self['manualTrustLevel'] = $manualTrustLevel;
        null !== $metadata && $self['metadata'] = $metadata;
        null !== $name && $self['name'] = $name;
        null !== $profilePicture && $self['profilePicture'] = $profilePicture;

        return $self;
    }

    /**
     * External ID of the user, typically the ID of the author in your database.
     */
    public function withExternalID(string $externalID): self
    {
        $self = clone $this;
        $self['externalID'] = $externalID;

        return $self;
    }

    /**
     * Author email address.
     */
    public function withEmail(?string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * URL of the author's external profile.
     */
    public function withExternalLink(?string $externalLink): self
    {
        $self = clone $this;
        $self['externalLink'] = $externalLink;

        return $self;
    }

    /**
     * Timestamp when author first appeared.
     */
    public function withFirstSeen(float $firstSeen): self
    {
        $self = clone $this;
        $self['firstSeen'] = $firstSeen;

        return $self;
    }

    /**
     * Timestamp of last activity.
     */
    public function withLastSeen(float $lastSeen): self
    {
        $self = clone $this;
        $self['lastSeen'] = $lastSeen;

        return $self;
    }

    public function withManualTrustLevel(?float $manualTrustLevel): self
    {
        $self = clone $this;
        $self['manualTrustLevel'] = $manualTrustLevel;

        return $self;
    }

    /**
     * Additional metadata provided by your system. We recommend including any relevant information that may assist in the moderation process.
     *
     * @param MetadataShape $metadata
     */
    public function withMetadata(Metadata|array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * Author name or identifier.
     */
    public function withName(?string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * URL of the author's profile picture.
     */
    public function withProfilePicture(?string $profilePicture): self
    {
        $self = clone $this;
        $self['profilePicture'] = $profilePicture;

        return $self;
    }
}
