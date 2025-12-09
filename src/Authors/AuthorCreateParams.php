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
 *   externalID: string,
 *   email?: string|null,
 *   externalLink?: string|null,
 *   firstSeen?: float,
 *   lastSeen?: float,
 *   manualTrustLevel?: float|null,
 *   metadata?: Metadata|array{
 *     emailVerified?: bool|null,
 *     identityVerified?: bool|null,
 *     isPayingCustomer?: bool|null,
 *     phoneVerified?: bool|null,
 *   },
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
     * @param Metadata|array{
     *   emailVerified?: bool|null,
     *   identityVerified?: bool|null,
     *   isPayingCustomer?: bool|null,
     *   phoneVerified?: bool|null,
     * } $metadata
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
        $obj = new self;

        $obj['externalID'] = $externalID;

        null !== $email && $obj['email'] = $email;
        null !== $externalLink && $obj['externalLink'] = $externalLink;
        null !== $firstSeen && $obj['firstSeen'] = $firstSeen;
        null !== $lastSeen && $obj['lastSeen'] = $lastSeen;
        null !== $manualTrustLevel && $obj['manualTrustLevel'] = $manualTrustLevel;
        null !== $metadata && $obj['metadata'] = $metadata;
        null !== $name && $obj['name'] = $name;
        null !== $profilePicture && $obj['profilePicture'] = $profilePicture;

        return $obj;
    }

    /**
     * External ID of the user, typically the ID of the author in your database.
     */
    public function withExternalID(string $externalID): self
    {
        $obj = clone $this;
        $obj['externalID'] = $externalID;

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
        $obj['externalLink'] = $externalLink;

        return $obj;
    }

    /**
     * Timestamp when author first appeared.
     */
    public function withFirstSeen(float $firstSeen): self
    {
        $obj = clone $this;
        $obj['firstSeen'] = $firstSeen;

        return $obj;
    }

    /**
     * Timestamp of last activity.
     */
    public function withLastSeen(float $lastSeen): self
    {
        $obj = clone $this;
        $obj['lastSeen'] = $lastSeen;

        return $obj;
    }

    public function withManualTrustLevel(?float $manualTrustLevel): self
    {
        $obj = clone $this;
        $obj['manualTrustLevel'] = $manualTrustLevel;

        return $obj;
    }

    /**
     * Additional metadata provided by your system. We recommend including any relevant information that may assist in the moderation process.
     *
     * @param Metadata|array{
     *   emailVerified?: bool|null,
     *   identityVerified?: bool|null,
     *   isPayingCustomer?: bool|null,
     *   phoneVerified?: bool|null,
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
        $obj['profilePicture'] = $profilePicture;

        return $obj;
    }
}
