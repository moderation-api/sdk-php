<?php

declare(strict_types=1);

namespace ModerationAPI\Authors;

use ModerationAPI\Authors\AuthorGetResponse\Block;
use ModerationAPI\Authors\AuthorGetResponse\Metadata;
use ModerationAPI\Authors\AuthorGetResponse\Metrics;
use ModerationAPI\Authors\AuthorGetResponse\RiskEvaluation;
use ModerationAPI\Authors\AuthorGetResponse\Status;
use ModerationAPI\Authors\AuthorGetResponse\TrustLevel;
use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Attributes\Required;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type BlockShape from \ModerationAPI\Authors\AuthorGetResponse\Block
 * @phpstan-import-type MetadataShape from \ModerationAPI\Authors\AuthorGetResponse\Metadata
 * @phpstan-import-type MetricsShape from \ModerationAPI\Authors\AuthorGetResponse\Metrics
 * @phpstan-import-type RiskEvaluationShape from \ModerationAPI\Authors\AuthorGetResponse\RiskEvaluation
 * @phpstan-import-type TrustLevelShape from \ModerationAPI\Authors\AuthorGetResponse\TrustLevel
 *
 * @phpstan-type AuthorGetResponseShape = array{
 *   id: string,
 *   block: null|Block|BlockShape,
 *   firstSeen: float,
 *   lastSeen: float,
 *   metadata: Metadata|MetadataShape,
 *   metrics: Metrics|MetricsShape,
 *   riskEvaluation: null|RiskEvaluation|RiskEvaluationShape,
 *   status: Status|value-of<Status>,
 *   trustLevel: TrustLevel|TrustLevelShape,
 *   email?: string|null,
 *   externalID?: string|null,
 *   externalLink?: string|null,
 *   lastIncident?: float|null,
 *   name?: string|null,
 *   profilePicture?: string|null,
 * }
 */
final class AuthorGetResponse implements BaseModel
{
    /** @use SdkModel<AuthorGetResponseShape> */
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
     * `new AuthorGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AuthorGetResponse::with(
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
     * (new AuthorGetResponse)
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
     * @param Block|BlockShape|null $block
     * @param Metadata|MetadataShape $metadata
     * @param Metrics|MetricsShape $metrics
     * @param RiskEvaluation|RiskEvaluationShape|null $riskEvaluation
     * @param Status|value-of<Status> $status
     * @param TrustLevel|TrustLevelShape $trustLevel
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
        $self = new self;

        $self['id'] = $id;
        $self['block'] = $block;
        $self['firstSeen'] = $firstSeen;
        $self['lastSeen'] = $lastSeen;
        $self['metadata'] = $metadata;
        $self['metrics'] = $metrics;
        $self['riskEvaluation'] = $riskEvaluation;
        $self['status'] = $status;
        $self['trustLevel'] = $trustLevel;

        null !== $email && $self['email'] = $email;
        null !== $externalID && $self['externalID'] = $externalID;
        null !== $externalLink && $self['externalLink'] = $externalLink;
        null !== $lastIncident && $self['lastIncident'] = $lastIncident;
        null !== $name && $self['name'] = $name;
        null !== $profilePicture && $self['profilePicture'] = $profilePicture;

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

    /**
     * Additional metadata provided by your system. We recommend including any relevant information that may assist in the moderation process.
     *
     * @param Metadata|MetadataShape $metadata
     */
    public function withMetadata(Metadata|array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * @param Metrics|MetricsShape $metrics
     */
    public function withMetrics(Metrics|array $metrics): self
    {
        $self = clone $this;
        $self['metrics'] = $metrics;

        return $self;
    }

    /**
     * Risk assessment details, if available.
     *
     * @param RiskEvaluation|RiskEvaluationShape|null $riskEvaluation
     */
    public function withRiskEvaluation(
        RiskEvaluation|array|null $riskEvaluation
    ): self {
        $self = clone $this;
        $self['riskEvaluation'] = $riskEvaluation;

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
     * Author email address.
     */
    public function withEmail(?string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

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
     * Timestamp of last incident.
     */
    public function withLastIncident(?float $lastIncident): self
    {
        $self = clone $this;
        $self['lastIncident'] = $lastIncident;

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
