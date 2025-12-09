<?php

declare(strict_types=1);

namespace ModerationAPI\Authors\AuthorGetResponse;

use ModerationAPI\Core\Attributes\Optional;
use ModerationAPI\Core\Concerns\SdkModel;
use ModerationAPI\Core\Contracts\BaseModel;

/**
 * Risk assessment details, if available.
 *
 * @phpstan-type RiskEvaluationShape = array{risk_level?: float|null}
 */
final class RiskEvaluation implements BaseModel
{
    /** @use SdkModel<RiskEvaluationShape> */
    use SdkModel;

    /**
     * Calculated risk level based on more than 10 behavioral signals.
     */
    #[Optional(nullable: true)]
    public ?float $risk_level;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?float $risk_level = null): self
    {
        $obj = new self;

        null !== $risk_level && $obj['risk_level'] = $risk_level;

        return $obj;
    }

    /**
     * Calculated risk level based on more than 10 behavioral signals.
     */
    public function withRiskLevel(?float $riskLevel): self
    {
        $obj = clone $this;
        $obj['risk_level'] = $riskLevel;

        return $obj;
    }
}
