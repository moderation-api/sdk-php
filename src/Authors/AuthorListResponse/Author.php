<?php

declare(strict_types=1);

namespace ModerationAPI\Authors\AuthorListResponse;

use ModerationAPI\Authors\AuthorListResponse\Author\Block;
use ModerationAPI\Authors\AuthorListResponse\Author\Metadata;
use ModerationAPI\Authors\AuthorListResponse\Author\Metrics;
use ModerationAPI\Authors\AuthorListResponse\Author\RiskEvaluation;
use ModerationAPI\Authors\AuthorListResponse\Author\Status;
use ModerationAPI\Authors\AuthorListResponse\Author\TrustLevel;
use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type AuthorShape = array{
 *   id: string,
 *   block: Block|null,
 *   firstSeen: float,
 *   lastSeen: float,
 *   metadata: Metadata,
 *   metrics: Metrics,
 *   riskEvaluation: RiskEvaluation|null,
 *   status: value-of<Status>,
 *   trustLevel: TrustLevel,
 *   email?: string|null,
 *   externalID?: string|null,
 *   externalLink?: string|null,
 *   lastIncident?: float|null,
 *   name?: string|null,
 *   profilePicture?: string|null,
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
     * Timestamp when author first appeared.
     */
    #[Required('first_seen')]
    public float $firstSeen;

    /**
     * Timestamp of last activity.
     */
    #[Required('last_seen')]
    public float $lastSeen;

    /**
     * Additional metadata provided by your system. We recommend including any relevant information that may assist in the moderation process.
     */
    #[Required]
    public Metadata $metadata;

    #[Required]
    public Metrics $metrics;

    /**
     * Risk assessment details, if available.
     */
    #[Required('risk_evaluation')]
    public ?RiskEvaluation $riskEvaluation;

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
     * Author email address.
     */
    #[Optional(nullable: true)]
    public ?string $email;

    /**
     * The author's ID from your system.
     */
    #[Optional('external_id', nullable: true)]
    public ?string $externalID;

    /**
     * URL of the author's external profile.
     */
    #[Optional('external_link', nullable: true)]
    public ?string $externalLink;

    /**
     * Timestamp of last incident.
     */
    #[Optional('last_incident', nullable: true)]
    public ?float $lastIncident;

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
     * `new Author()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Author::with(
     *   id: ...,
     *   block: ...,
     *   firstSeen: ...,
     *   lastSeen: ...,
     *   metadata: ...,
     *   metrics: ...,
     *   riskEvaluation: ...,
     *   status: ...,
     *   trustLevel: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Author)
     *   ->withID(...)
     *   ->withBlock(...)
     *   ->withFirstSeen(...)
     *   ->withLastSeen(...)
     *   ->withMetadata(...)
     *   ->withMetrics(...)
     *   ->withRiskEvaluation(...)
     *   ->withStatus(...)
     *   ->withTrustLevel(...)
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
     * @param Metadata|array{
     *   emailVerified?: bool|null,
     *   identityVerified?: bool|null,
     *   isPayingCustomer?: bool|null,
     *   phoneVerified?: bool|null,
     * } $metadata
     * @param Metrics|array{
     *   flaggedContent: float, totalContent: float, averageSentiment?: float|null
     * } $metrics
     * @param RiskEvaluation|array{riskLevel?: float|null}|null $riskEvaluation
     * @param Status|value-of<Status> $status
     * @param TrustLevel|array{level: float, manual: bool} $trustLevel
     */
    public static function with(
        string $id,
        Block|array|null $block,
        float $firstSeen,
        float $lastSeen,
        Metadata|array $metadata,
        Metrics|array $metrics,
        RiskEvaluation|array|null $riskEvaluation,
        Status|string $status,
        TrustLevel|array $trustLevel,
        ?string $email = null,
        ?string $externalID = null,
        ?string $externalLink = null,
        ?float $lastIncident = null,
        ?string $name = null,
        ?string $profilePicture = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['block'] = $block;
        $obj['firstSeen'] = $firstSeen;
        $obj['lastSeen'] = $lastSeen;
        $obj['metadata'] = $metadata;
        $obj['metrics'] = $metrics;
        $obj['riskEvaluation'] = $riskEvaluation;
        $obj['status'] = $status;
        $obj['trustLevel'] = $trustLevel;

        null !== $email && $obj['email'] = $email;
        null !== $externalID && $obj['externalID'] = $externalID;
        null !== $externalLink && $obj['externalLink'] = $externalLink;
        null !== $lastIncident && $obj['lastIncident'] = $lastIncident;
        null !== $name && $obj['name'] = $name;
        null !== $profilePicture && $obj['profilePicture'] = $profilePicture;

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
     * @param Metrics|array{
     *   flaggedContent: float, totalContent: float, averageSentiment?: float|null
     * } $metrics
     */
    public function withMetrics(Metrics|array $metrics): self
    {
        $obj = clone $this;
        $obj['metrics'] = $metrics;

        return $obj;
    }

    /**
     * Risk assessment details, if available.
     *
     * @param RiskEvaluation|array{riskLevel?: float|null}|null $riskEvaluation
     */
    public function withRiskEvaluation(
        RiskEvaluation|array|null $riskEvaluation
    ): self {
        $obj = clone $this;
        $obj['riskEvaluation'] = $riskEvaluation;

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
     * Author email address.
     */
    public function withEmail(?string $email): self
    {
        $obj = clone $this;
        $obj['email'] = $email;

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
     * Timestamp of last incident.
     */
    public function withLastIncident(?float $lastIncident): self
    {
        $obj = clone $this;
        $obj['lastIncident'] = $lastIncident;

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
