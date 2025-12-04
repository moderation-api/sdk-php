<?php

declare(strict_types=1);

namespace ModerationAPI\Authors;

use ModerationAPI\Authors\AuthorUpdateResponse\Block;
use ModerationAPI\Authors\AuthorUpdateResponse\Metadata;
use ModerationAPI\Authors\AuthorUpdateResponse\Metrics;
use ModerationAPI\Authors\AuthorUpdateResponse\RiskEvaluation;
use ModerationAPI\Authors\AuthorUpdateResponse\Status;
use ModerationAPI\Authors\AuthorUpdateResponse\TrustLevel;
use ModerationAPI\Core\Attributes\Api;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Concerns\SdkResponse;
use ModerationAPI\Core\Contracts\BaseModel;
use ModerationAPI\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type AuthorUpdateResponseShape = array{
 *   id: string,
 *   block: Block|null,
 *   first_seen: float,
 *   last_seen: float,
 *   metadata: Metadata,
 *   metrics: Metrics,
 *   risk_evaluation: RiskEvaluation|null,
 *   status: value-of<Status>,
 *   trust_level: TrustLevel,
 *   email?: string|null,
 *   external_id?: string|null,
 *   external_link?: string|null,
 *   last_incident?: float|null,
 *   name?: string|null,
 *   profile_picture?: string|null,
 * }
 */
final class AuthorUpdateResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<AuthorUpdateResponseShape> */
    use SdkModel;

    use SdkResponse;

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
     * Timestamp when author first appeared.
     */
    #[Api]
    public float $first_seen;

    /**
     * Timestamp of last activity.
     */
    #[Api]
    public float $last_seen;

    /**
     * Additional metadata provided by your system. We recommend including any relevant information that may assist in the moderation process.
     */
    #[Api]
    public Metadata $metadata;

    #[Api]
    public Metrics $metrics;

    /**
     * Risk assessment details, if available.
     */
    #[Api]
    public ?RiskEvaluation $risk_evaluation;

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
     * Author email address.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $email;

    /**
     * The author's ID from your system.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $external_id;

    /**
     * URL of the author's external profile.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $external_link;

    /**
     * Timestamp of last incident.
     */
    #[Api(nullable: true, optional: true)]
    public ?float $last_incident;

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

    /**
     * `new AuthorUpdateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AuthorUpdateResponse::with(
     *   id: ...,
     *   block: ...,
     *   first_seen: ...,
     *   last_seen: ...,
     *   metadata: ...,
     *   metrics: ...,
     *   risk_evaluation: ...,
     *   status: ...,
     *   trust_level: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AuthorUpdateResponse)
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
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $id,
        ?Block $block,
        float $first_seen,
        float $last_seen,
        Metadata $metadata,
        Metrics $metrics,
        ?RiskEvaluation $risk_evaluation,
        Status|string $status,
        TrustLevel $trust_level,
        ?string $email = null,
        ?string $external_id = null,
        ?string $external_link = null,
        ?float $last_incident = null,
        ?string $name = null,
        ?string $profile_picture = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->block = $block;
        $obj->first_seen = $first_seen;
        $obj->last_seen = $last_seen;
        $obj->metadata = $metadata;
        $obj->metrics = $metrics;
        $obj->risk_evaluation = $risk_evaluation;
        $obj['status'] = $status;
        $obj->trust_level = $trust_level;

        null !== $email && $obj->email = $email;
        null !== $external_id && $obj->external_id = $external_id;
        null !== $external_link && $obj->external_link = $external_link;
        null !== $last_incident && $obj->last_incident = $last_incident;
        null !== $name && $obj->name = $name;
        null !== $profile_picture && $obj->profile_picture = $profile_picture;

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
     * Timestamp when author first appeared.
     */
    public function withFirstSeen(float $firstSeen): self
    {
        $obj = clone $this;
        $obj->first_seen = $firstSeen;

        return $obj;
    }

    /**
     * Timestamp of last activity.
     */
    public function withLastSeen(float $lastSeen): self
    {
        $obj = clone $this;
        $obj->last_seen = $lastSeen;

        return $obj;
    }

    /**
     * Additional metadata provided by your system. We recommend including any relevant information that may assist in the moderation process.
     */
    public function withMetadata(Metadata $metadata): self
    {
        $obj = clone $this;
        $obj->metadata = $metadata;

        return $obj;
    }

    public function withMetrics(Metrics $metrics): self
    {
        $obj = clone $this;
        $obj->metrics = $metrics;

        return $obj;
    }

    /**
     * Risk assessment details, if available.
     */
    public function withRiskEvaluation(?RiskEvaluation $riskEvaluation): self
    {
        $obj = clone $this;
        $obj->risk_evaluation = $riskEvaluation;

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
     * Author email address.
     */
    public function withEmail(?string $email): self
    {
        $obj = clone $this;
        $obj->email = $email;

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

    /**
     * URL of the author's external profile.
     */
    public function withExternalLink(?string $externalLink): self
    {
        $obj = clone $this;
        $obj->external_link = $externalLink;

        return $obj;
    }

    /**
     * Timestamp of last incident.
     */
    public function withLastIncident(?float $lastIncident): self
    {
        $obj = clone $this;
        $obj->last_incident = $lastIncident;

        return $obj;
    }

    /**
     * Author name or identifier.
     */
    public function withName(?string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * URL of the author's profile picture.
     */
    public function withProfilePicture(?string $profilePicture): self
    {
        $obj = clone $this;
        $obj->profile_picture = $profilePicture;

        return $obj;
    }
}
