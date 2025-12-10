<?php

declare(strict_types=1);

namespace ModerationAPI\Authors\AuthorNewResponse;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Risk assessment details, if available.
 *
 * @phpstan-type RiskEvaluationShape = array{riskLevel?: float|null}
 */
final class RiskEvaluation implements BaseModel
{
    /** @use SdkModel<RiskEvaluationShape> */
    use SdkModel;

    /**
     * Calculated risk level based on more than 10 behavioral signals.
     */
    #[Optional('risk_level', nullable: true)]
    public ?float $riskLevel;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?float $riskLevel = null): self
    {
        $self = new self;

        null !== $riskLevel && $self['riskLevel'] = $riskLevel;

        return $self;
    }

    /**
     * Calculated risk level based on more than 10 behavioral signals.
     */
    public function withRiskLevel(?float $riskLevel): self
    {
        $self = clone $this;
        $self['riskLevel'] = $riskLevel;

        return $self;
    }
}
